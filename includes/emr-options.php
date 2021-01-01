<?php

add_action( 'admin_init', 'emr_options_init' );
add_action( 'admin_menu', 'emr_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function emr_options_init() {
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
		'value' => 'on',
		'label' => __( 'On', 'emr-redirect' ),
	),
	'1' => array(
		'value' => 'off',
		'label' => __( 'Off', 'emr-redirect' ),
	),
);

$emr_redir_tablets = array(
	'0' => array(
		'value' => 'yes',
		'label' => __( 'Yes', 'emr-redirect' ),
	),
	'1' => array(
		'value' => 'no',
		'label' => __( 'No', 'emr-redirect' ),
	),
);

$emr_redir_front_page = array(
	'0' => array(
		'value' => 'no',
		'label' => __( 'No', 'emr-redirect' ),
	),
	'1' => array(
		'value' => 'yes',
		'label' => __( 'Yes', 'emr-redirect' ),
	),
);

$emr_redir_all_select = array(
	'0' => array(
		'value' => 'no',
		'label' => __( 'No', 'emr-redirect' ),
	),
	'1' => array(
		'value' => 'yes',
		'label' => __( 'Yes', 'emr-redirect' ),
	),
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

				<tr valign="top"><th scope="row"><?php esc_html_e( 'Equivalent Mobile Redirect', 'emr-redirect' ); ?></th>
					<td>
						<select name="emr_settings[emr_on_off]">
							<?php
							$selected = isset( $options['emr_on_off'] ) ? $options['emr_on_off'] : 'on';
							$a        = '';
							$b        = '';

							foreach ( $emr_active as $option ) {
								$label = $option['label'];
								if ( $selected == $option['value'] ) {
									$a = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								} else {
									$b .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
							}
							echo $a . $b; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped earlier
							?>
						</select>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php esc_html_e( 'Want Tablets Redirected?', 'emr-redirect' ); ?></th>
					<td>
						<select name="emr_settings[emr_tablets]">
							<?php
							$selected = isset( $options['emr_tablets'] ) ? $options['emr_tablets'] : 'yes';
							$c        = '';
							$d        = '';

							foreach ( $emr_redir_tablets as $option ) {
								$label = $option['label'];
								if ( $selected == $option['value'] ) {
									$c = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								} else {
									$d .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
							}
							echo $c . $d; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped earlier
							?>
						</select>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php esc_html_e( 'Redirect Mobile to One URL?', 'emr-redirect' ); ?></th>
					<td>
						<select name="emr_settings[emr_all_select]">
							<?php
							$selected = isset( $options['emr_all_select'] ) ? $options['emr_all_select'] : 'no';
							$e        = '';
							$f        = '';

							foreach ( $emr_redir_all_select as $option ) {
								$label = $option['label'];
								if ( $selected == $option['value'] ) {
									$e = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								} else {
									$f .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
							}
							echo $e . $f; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped earlier
							?>
						</select>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php esc_html_e( 'Redirect All Mobile to URL', 'emr-redirect' ); ?></th>
					<td>
						<input id="emr_settings[emr_redir_all_url]" class="regular-text" type="text" name="emr_settings[emr_redir_all_url]" value="<?php echo esc_attr( isset( $options['emr_redir_all_url'] ) ? $options['emr_redir_all_url'] : '' ); ?>" placeholder="https://google.com" />
						<br><label class="description" for="emr_settings[emr_redir_all_url]"><?php esc_html_e( 'Enter URL to redirect all mobile to ex. http://google.com', 'emr-redirect' ); ?></label>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php esc_html_e( 'If homepage is set to display latest posts and not a static page redirect it?', 'emr-redirect' ); ?></th>
					<td>
						<select name="emr_settings[emr_front_page]">
							<?php
							$selected = isset( $options['emr_front_page'] ) ? $options['emr_front_page'] : 'no';
							$g        = '';
							$h        = '';

							foreach ( $emr_redir_front_page as $option ) {
								$label = $option['label'];
								if ( $selected == $option['value'] ) {
									$g = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								} else {
									$h .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
							}
							echo $g . $h; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped earlier
							?>
						</select>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php esc_html_e( 'Redirect non-static homepage to what URL', 'emr-redirect' ); ?></th>
					<td>
						<input id="emr_settings[emr_redir_front_url]" class="regular-text" type="text" name="emr_settings[emr_redir_front_url]" value="<?php echo esc_attr( isset( $options['emr_redir_front_url'] ) ? $options['emr_redir_front_url'] : '' ); ?>" placeholder="https://google.com" />
						<br><label class="description" for="emr_settings[emr_redir_front_url]"><?php esc_html_e( 'Enter URL to redirect the non-static homepage to ex. http://google.com', 'emr-redirect' ); ?></label>
					</td>
				</tr>

				<tr valign="top"><th scope="row"><?php esc_html_e( 'Back to full website link', 'emr-redirect' ); ?></th>
					<td>
						<?php $btfs_url = home_url( '/?view_full_site=true' ); ?>			
						<input type="text" readonly="readonly" value="<?php echo esc_attr( $btfs_url ); ?>" id="emr-btfs" class="regular-text">
					</td>
				</tr>

			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Options', 'emr-redirect' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}
