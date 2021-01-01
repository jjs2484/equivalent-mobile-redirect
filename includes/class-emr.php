<?php
/**
 * Redirect class
 */
class EMR {

	/**
	 * Plugin version number.
	 *
	 * @const string
	 */
	const VERSION = '4.5';

	/**
	 * List of post types for which to enable this plugin.
	 * Note: can be filtered via "ndg_spr_post_types".
	 *
	 * @var array
	 */
	public $post_types;

	/**
	 * Redirection data from the postmeta table, structured by blog_id and post_id.
	 *
	 * @var array
	 */
	public $data;

	/**
	 * Constructor.
	 */
	public function __construct() {
		// Run update routine if needed, also upon activation.
		if ( version_compare( self::VERSION, get_option( 'ndg_spr_version', 0 ), '>' ) ) {
			$this->update();
		}

		// This init action should happen after register_post_type calls: priority > 10.
		add_action( 'init', [ $this, 'init' ], 20 );

		add_action( 'plugins_loaded', [ $this, 'activate' ] );

		// Desktop link rel="alternate" annotations.
		add_action( 'wp_head', [ $this, 'emr_desktop_alt_tag' ] );
	}

	/**
	 * Remap old data
	 *
	 * @brief During activation, update the settings.
	 *
	 * @since 2018-11-08 20:01:16
	 */
	public function activate() {
		$options = get_option( 'rooter2484_theme_options' );
		if ( ! $options )
			return;
		$new_options = [
			'emr_tablets'         => ( $options[ 'emrlego' ] == 'plumbers' ? 'yes' : 'no' ),
			'emr_all_select'      => ( $options[ 'emrall' ] == 'rediryes' ? 'yes' : 'no' ),
			'emr_redir_all_url'   => $options[ 'redirallurl' ],
			'emr_front_page'      => ( $options[ 'emrfrontpage' ] == 'frontyes' ? 'yes' : 'no' ),
			'emr_redir_front_url' => $options[ 'frontpageurl' ],
		];
		update_option( 'emr_settings', $new_options );
		delete_option( 'rooter2484_theme_options' );
	}

	/**
	 * Update the plugin to a newer version.
	 */
	public function update() {
		// Store version of the installed plugin for future updates.
		update_option( 'ndg_spr_version', self::VERSION );
	}

	/**
	 * Initialize the plugin.
	 */
	public function init() {

		// Automatically include all public custom post types.
		$this->post_types = array_merge(
			array( 'page' => 'page', 'post' => 'post' ),
			get_post_types( array( '_builtin' => false ) )
		);

		// Allow user to modify the post types.
		$this->post_types = apply_filters( 'ndg_spr_post_types', $this->post_types );

		// Avoid needless work.
		if ( empty( $this->post_types ) )
			return;

		// Mirror the post types array so we can do fast isset() checks on the keys.
		$this->post_types = array_combine( $this->post_types, $this->post_types );

		// Add the link actions only for the applicable post types: pages, posts and/or custom post types.
		if ( isset( $this->post_types['page'] ) ) {
			add_action( 'page_link', array( $this, 'link' ), 20, 2 );
		}
		if ( isset( $this->post_types['post'] ) ) {
			add_action( 'post_link', array( $this, 'link' ), 20, 2 );
		}
		if ( array_diff( $this->post_types, array( 'page', 'post' ) ) ) {
			add_action( 'post_type_link', array( $this, 'link' ), 20, 2 );
		}

		// Action for the actual redirect.
		add_action( 'template_redirect', array( $this, 'template_redirect' ), 1 );

		// Stuff that's only required in the admin area.
		if ( is_admin() ) {
			// Meta box setup.
			add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
			add_action( 'save_post', array( $this, 'save_post' ) );
		}
	}

	/**
	 * Add meta boxes for page redirection to all applicable post types.
	 */
	public function add_meta_boxes() {
		// Add meta box for each post type.
		foreach ( $this->post_types as $post_type ) {
			add_meta_box( 'ndg_page_redirect', __( 'Mobile Redirect', 'emr-redirect' ), array( $this, 'meta_box_show' ), $post_type );
		}
	}

	/**
	 * Output the form for the page redirection meta box.
	 *
	 * @param object $post post object.
	 */
	public function meta_box_show( $post ) {
		// Default data entered in the form.
		$default = array(
			'url_raw' => '', // Don't prefill the field with "http://" because such an incomplete URL triggers an HTML5 error for the "url" input type.
			'status'  => 302,
		);

		// Load existing redirection data for this post if any.
		$data = (array) $this->get_post_data( $post->ID );

		// Overwrite default values with existing ones.
		$values = array_merge( $default, $data );

		// Add a hidden nonce field for security.
		wp_nonce_field( 'ndg_spr_' . $post->ID, 'ndg_spr_nonce', false );

		// Output the URL field.
		echo '<p>';
		echo '<label for="ndg_spr_url">' . esc_html__( 'Mobile URL:', 'emr-redirect' ) . '</label> ';
		echo '<input id="ndg_spr_url" name="ndg_spr_url" type="url" value="' . esc_url( $values['url_raw'] ) . '" size="50" style="width:80%" placeholder="https://google.com">';
		echo '</p>';
	}

	/**
	 * Update post redirection data in database.
	 *
	 * @param integer $post_id post ID.
	 * @return void
	 */
	public function save_post( $post_id ) {
		// Validate nonce.
		if ( ! isset( $_POST['ndg_spr_nonce'] ) || ! wp_verify_nonce( $_POST['ndg_spr_nonce'], 'ndg_spr_' . $post_id ) )
			return;

		// Basic clean of the entered URL if any.
		$url = ( isset( $_POST['ndg_spr_url'] ) ) ? trim( (string) $_POST['ndg_spr_url'] ) : '';

		// A URL was entered (standalone protocols like "http://" are considered emtpy).
		if ( '' !== $url && ! preg_match( '~^[-a-z0-9+.]++://$~i', $url ) ) {
			// Prepare data array to store in the database.
			$data['url'] = esc_url_raw( $url );

			// Save the data in the postmeta table.
			update_post_meta( $post_id, '_ndg_Speedy_Page_Redirect', $data );
		} else { // No URL entered.
			// Delete any possible previous data stored for this post.
			delete_post_meta( $post_id, '_ndg_speedy_page_redirect' );
		}
	}

	/**
	 * Return the new destination URL of a post in case of a permanent redirect.
	 *
	 * @param string         $url URL of the post.
	 * @param integer|object $post post ID or post object.
	 */
	public function link( $url, $post ) {
		// Only continue if page redirection is enabled for this post type.
		if ( ! isset( $this->post_types[ (string) get_post_type( $post ) ] ) )
			return $url;

		// page_link action returns ID, post_link action returns object.
		$post_id = ( isset( $post->ID ) ) ? $post->ID : $post;

		// No redirection data found.
		if ( ! $data = $this->get_post_data( $post_id ) )
			return $url;

		// Return the destination URL.
		return $url;
	}

	/**
	 * Perform the actual redirect if needed.
	 */
	public function template_redirect() {
		global $post;

		// Let's see if we should set the full site cookie.
		if ( isset( $_GET['view_full_site'] ) ) {
			$get_cookie_check = $_GET['view_full_site'];
		}
		if ( isset( $get_cookie_check ) ) {
			// Strip the http://www from the domain.
			$site_url = site_url();
			$domain   = parse_url( $site_url, PHP_URL_HOST );

			if ( $get_cookie_check == 'true' ) {
				// Set the cookie.
				setcookie( 'emr_full_site', 1, time() + 86400, '/', $domain );
				$_COOKIE['emr_full_site'] = 1;
			}
			if ( $get_cookie_check == 'false' ) {
				// Set the cookie.
				setcookie( 'emr_full_site', 0, time() - 3600, '/', $domain );
				$_COOKIE['emr_full_site'] = 0;
			}
		}
		// Cookie variable.
		if ( isset( $_COOKIE['emr_full_site'] ) ) {
			$full_site_cookie = $_COOKIE['emr_full_site'];
		}
		// Cookie empty then include.
		if ( empty( $full_site_cookie ) ) {
			if ( ! class_exists( 'Mobile_Detect' ) ) {
				require_once plugin_dir_path( __FILE__ ) . 'Mobile_Detect.php';
			}
			$detect = new Mobile_Detect();
			// EMR option page settings.
			$options = get_option( 'emr_settings' );

			$emr_enabled = isset( $options['emr_on_off'] ) ? $options['emr_on_off'] : 'on';
			if ( $emr_enabled == 'off' ) {
				return;
			}

			$tablets_redirect            = isset( $options['emr_tablets'] ) ? $options['emr_tablets'] : 'yes';
			$mobile_to_one_url           = isset( $options['emr_all_select'] ) ? $options['emr_all_select'] : 'no';
			$mobile_all_url              = isset( $options['emr_redir_all_url'] ) ? $options['emr_redir_all_url'] : '';
			$nonstatic_homepage_redirect = isset( $options['emr_front_page'] ) ? $options['emr_front_page'] : 'no';
			$nonstatic_redirect_url      = isset( $options['emr_redir_front_url'] ) ? $options['emr_redir_front_url'] : '';

			if ( $detect->isMobile() && $mobile_to_one_url == 'yes' ) {
				if ( $detect->isTablet() && $tablets_redirect == 'no' ) {
					$detect = 'false';
				} elseif ( ! empty( $mobile_all_url ) ) {
					// Redirect all and quit.
					wp_redirect( $mobile_all_url, 302 );
					exit;
				}
			} elseif ( $detect->isMobile() && $nonstatic_homepage_redirect == 'yes' && is_home() ) {
				if ( $detect->isTablet() && $tablets_redirect == 'no' ) {
					$detect = 'false';
				} elseif ( ! empty( $nonstatic_redirect_url ) ) {
					wp_redirect( $nonstatic_redirect_url, 302 );
					exit;
				}
			} elseif ( $detect->isMobile() ) {
				if ( $detect->isTablet() && $tablets_redirect == 'no' ) {
					$detect = 'false';
				} else {
					// Finally do the regular mobile redirect and quit.
					// Redirects only apply to pages or single posts.
					if ( ! is_page() && ! is_single() && ! is_front_page() )
						return;
					// Only continue if page redirection is enabled for this post type.
					if ( ! isset( $this->post_types[ (string) get_post_type( $post ) ] ) )
						return;
					// No redirection data found for this post.
					if ( ! $data = $this->get_post_data( $post->ID ) )
						return;
					else {
						wp_redirect( $data['url'], 302 );
						exit;
					}
				}
			}
		}
	}

	/**
	 * Add Annotations for desktop.
	 */
	public function emr_desktop_alt_tag() {
		global $post;

		// Get options.
		$options                     = get_option( 'emr_settings' );
		$tablets_redirect            = isset( $options['emr_tablets'] ) ? $options['emr_tablets'] : 'yes';
		$mobile_to_one_url           = isset( $options['emr_all_select'] ) ? $options['emr_all_select'] : 'no';
		$mobile_all_url              = isset( $options['emr_redir_all_url'] ) ? $options['emr_redir_all_url'] : '';
		$nonstatic_homepage_redirect = isset( $options['emr_front_page'] ) ? $options['emr_front_page'] : 'no';
		$nonstatic_redirect_url      = isset( $options['emr_redir_front_url'] ) ? $options['emr_redir_front_url'] : '';

		// Check mobile redirects are enabled.
		$emr_enabled = isset( $options['emr_on_off'] ) ? $options['emr_on_off'] : 'on';
		if ( $emr_enabled == 'off' ) {
			return;
		}

		// Assign the link rel alternate tag based on user options.
		if ( $mobile_to_one_url == 'yes' ) {
			$mobile_rel_link = $mobile_all_url;
		} elseif ( $nonstatic_homepage_redirect == 'yes' && is_home() ) {
			$mobile_rel_link = $nonstatic_redirect_url;
		} elseif ( ( is_page() || is_single() || is_front_page() ) && ( isset( $this->post_types[ (string) get_post_type( $post ) ] ) ) ) {
			$data            = $this->get_post_data( $post->ID );
			$mobile_rel_link = isset( $data['url'] ) ? $data['url'] : '';
		}

		// Check to make sure mobile link isn't blank before continuing.
		if ( empty( $mobile_rel_link ) )
			return;

		// Add link rel alternate tag HTML.
		if ( $tablets_redirect == 'yes' ) {
			echo '<link rel="alternate" media="only screen and (max-width: 1024px)" href="' . esc_url( $mobile_rel_link ) . '">';
		} else {
			echo '<link rel="alternate" media="only screen and (max-width: 640px)" href="' . esc_url( $mobile_rel_link ) . '">';
		}
	}

	/**
	 * Get redirection data for a post.
	 *
	 * @param integer|object $post post ID or post object.
	 * @param integer|object $blog blog ID or blog object.
	 * @return array|null post redirection data for the post
	 */
	public function get_post_data( $post, $blog = null ) {
		// Clean post ID.
		$post_id = (int) ( ( isset( $post->ID ) ) ? $post->ID : $post );

		// Clean blog ID.
		if ( ! $blog_id = (int) ( ( isset( $blog->blog_id ) ) ? $blog->blog_id : $blog ) ) {
			// Use current blog ID by default.
			global $blog_id;
		}

		// Load redirection data for this blog from the database.
		if ( ! isset( $this->data[ $blog_id ] ) ) {
			// Load redirection data for all posts of this blog.
			global $wpdb;
			$rows = $wpdb->get_results( 'SELECT post_id, meta_value FROM ' . $wpdb->postmeta . ' WHERE meta_key = "_ndg_speedy_page_redirect"' );

			// Initialize redirect data for the blog.
			$this->data[ $blog_id ] = array();

			foreach ( $rows as $row ) {
				// Unserialize data.
				$data = unserialize( $row->meta_value );

				// Store the originally saved URL as raw_url.
				$data['url_raw'] = $data['url'];

				// Generate the full URL in case a relative URL is stored in the database.
				if ( '/' === substr( $data['url'], 0, 1 ) ) {
					$data['url'] = trailingslashit( get_bloginfo( 'url' ) ) . ltrim( $data['url'], '/' );
				}

				// Cache redirection data in object property.
				$this->data[ $blog_id ][ (int) $row->post_id ] = $data;
			}
		}

		// Return redirection data for post if any.
		return ( isset( $this->data[ $blog_id ][ $post_id ] ) ) ? $this->data[ $blog_id ][ $post_id ] : null;
	}

}
new EMR();
