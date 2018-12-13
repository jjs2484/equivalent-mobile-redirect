<?php

add_action( 'admin_init', 'emr_options_init' );
add_action( 'admin_menu', 'emr_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function emr_options_init(){
	register_setting( 'equivalent_mobile_redirect', 'emr_settings' );
}

/**
 * Load up the menu page
 */
function emr_options_add_page() {
	add_options_page(
		__( 'EMR Settings', 'emr-redirect' ), 
		__( 'EMR Settings', 'emr-redirect' ), 
		'manage_options', 
		'emr_plugin_page', 
		'emr_options_do_page' 
	);
}

/**
 * Create arrays for our select
 */
$emr_active = array(
	'0' => array(
		'value' =>	'on',
		'label' => __( 'On', 'emr-redirect' )
	),
	'1' => array(
		'value' =>	'off',
		'label' => __( 'Off', 'emr-redirect' )
	)
);

$emr_redir_tablets = array(
	'0' => array(
		'value' =>	'yes',
		'label' => __( 'Yes', 'emr-redirect' )
	),
	'1' => array(
		'value' =>	'no',
		'label' => __( 'No', 'emr-redirect' )
	)
);

$emr_redir_front_page = array(
	'0' => array(
		'value' =>	'no',
		'label' => __( 'No', 'emr-redirect' )
	),
	'1' => array(
		'value' =>	'yes',
		'label' => __( 'Yes', 'emr-redirect' )
	)
);

$emr_redir_all_select = array(
	'0' => array(
		'value' =>	'no',
		'label' => __( 'No', 'emr-redirect' )
	),
	'1' => array(
		'value' =>	'yes',
		'label' => __( 'Yes', 'emr-redirect' )
	)
);

/**
 * Create the options page
 */
function emr_options_do_page() {
	global $emr_active;
	global $emr_redir_tablets;
	global $emr_redir_all_select;
	global $emr_redir_front_page;
	
	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	
	<div class="wrap">
		<h2>Equivalent Mobile Redirect Settings</h2>

		<form method="post" action="options.php">
			<?php settings_fields( 'equivalent_mobile_redirect' ); ?>
			<?php $options = get_option( 'emr_settings' ); ?>

			<table class="form-table">
			
				<tr valign="top"><th scope="row"><?php _e( 'Equivalent Mobile Redirect', 'emr-redirect' ); ?></th>
					<td>
						<select name="emr_settings[emr_on_off]">
							<?php
								$selected = $options['emr_on_off'];
								$p = '';
								$r = '';

								foreach ( $emr_active as $option ) {
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
				
				<tr valign="top"><th scope="row"><?php _e( 'Want Tablets Redirected?', 'emr-redirect' ); ?></th>
					<td>
						<select name="emr_settings[emr_tablets]">
							<?php
								$selected = $options['emr_tablets'];
								$p = '';
								$r = '';

								foreach ( $emr_redir_tablets as $option ) {
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
				
				<tr valign="top"><th scope="row"><?php _e( 'Redirect Mobile to One URL?', 'emr-redirect' ); ?></th>
					<td>
						<select name="emr_settings[emr_all_select]">
							<?php
								$selected = $options['emr_all_select'];
								$p = '';
								$r = '';

								foreach ( $emr_redir_all_select as $option ) {
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
				
				<tr valign="top"><th scope="row"><?php _e( 'Redirect All Mobile to URL', 'emr-redirect' ); ?></th>
					<td>
						<input id="emr_settings[emr_redir_all_url]" class="regular-text" type="text" name="emr_settings[emr_redir_all_url]" value="<?php esc_attr_e( $options['emr_redir_all_url'] ); ?>" placeholder="https://google.com" />
						<br><label class="description" for="emr_settings[emr_redir_all_url]"><?php _e( 'Enter URL to redirect all mobile to ex. http://google.com', 'emr-redirect' ); ?></label>
					</td>
				</tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'If homepage is set to display latest posts and not a static page redirect it?', 'emr-redirect' ); ?></th>
					<td>
						<select name="emr_settings[emr_front_page]">
							<?php
								$selected = $options['emr_front_page'];
								$p = '';
								$r = '';

								foreach ( $emr_redir_front_page as $option ) {
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
				
				<tr valign="top"><th scope="row"><?php _e( 'Redirect non-static homepage to what URL', 'emr-redirect' ); ?></th>
					<td>
						<input id="emr_settings[emr_redir_front_url]" class="regular-text" type="text" name="emr_settings[emr_redir_front_url]" value="<?php esc_attr_e( $options['emr_redir_front_url'] ); ?>" placeholder="https://google.com" />
						<br><label class="description" for="emr_settings[emr_redir_front_url]"><?php _e( 'Enter URL to redirect the non-static homepage to ex. http://google.com', 'emr-redirect' ); ?></label>
					</td>
				</tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'Back to full website link', 'emr-redirect' ); ?></th>
					<td>
						<?php 
							$btfs_url = home_url( '/?view_full_site=true' );
						?>				
						<input type="text" readonly="readonly" value="<?php echo $btfs_url; ?>" id="emr-btfs" class="regular-text">
					</td>
				</tr>

			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'emr-redirect' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}