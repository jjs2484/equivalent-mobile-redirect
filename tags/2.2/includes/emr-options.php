<?php

add_action( 'admin_init', 'emr_options_init' );
add_action( 'admin_menu', 'emr_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function emr_options_init(){
	register_setting( 'root2484_options', 'rooter2484_theme_options', 'emr_options_validate' );
}

/**
 * Load up the menu page
 */
function emr_options_add_page() {
	add_options_page( __( 'EMR Settings', 'emrrootman' ), __( 'EMR Settings', 'emrrootman' ), 'manage_options', 'emr_plugin_page', 'emr_options_do_page' );
}

/**
 * Create arrays for our select
 */
$select_options = array(
	'0' => array(
		'value' =>	'plumbers',
		'label' => __( 'Yes', 'emrrootman' )
	),
	'1' => array(
		'value' =>	'tv',
		'label' => __( 'No', 'emrrootman' )
	)
);

/**
 * Create the options page
 */
function emr_options_do_page() {
	global $select_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<h2>Equivalent Mobile Redirect Settings</h2>

		<form method="post" action="options.php">
			<?php settings_fields( 'root2484_options' ); ?>
			<?php $options = get_option( 'rooter2484_theme_options' ); ?>

			<table class="form-table">
				
				<tr valign="top"><th scope="row"><?php _e( 'Want Tablets Redirected?', 'emrrootman' ); ?></th>
					<td>
						<select name="rooter2484_theme_options[emrlego]">
							<?php
								$selected = $options['emrlego'];
								$p = '';
								$r = '';

								foreach ( $select_options as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
						</select>
					</td>
				</tr>

			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'emrrootman' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function emr_options_validate( $input ) {
	global $select_options;

	// Our select option must actually be in our array of select options
	if ( ! array_key_exists( $input['selectinput'], $select_options ) )
		$input['selectinput'] = null;

	return $input;
}
