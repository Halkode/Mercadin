<?php

defined( 'ABSPATH' ) || exit;

?>
<div class="col-lg-7 offset-5">
	<h1><?php the_title(); ?></h1>
</div>
<?php do_action( 'woocommerce_account_navigation' ); ?>
<div class="woocommerce-MyAccount-content col-lg-7 offset-1">
	<div>
		<form class="woocommerce-EditAccountForm edit-account" action="<?php echo BASE_URL('/minha-conta') ?>" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >
			<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

			<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
				<label for="account_email"><?php esc_html_e( 'Email', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
				<label for="account_first_name"><?php esc_html_e( 'Nome', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
			</p>
			
			<div class="clear"></div>

				

			<!-- <fieldset>
				<legend><?php esc_html_e( 'Password change', 'woocommerce' ); ?></legend>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="password_current"><?php esc_html_e( 'Current password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off" />
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="password_1"><?php esc_html_e( 'New password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" />
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="password_2"><?php esc_html_e( 'Confirm new password', 'woocommerce' ); ?></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" />
				</p>
			</fieldset> -->
			<div class="clear"></div>

			<?php do_action( 'woocommerce_edit_account_form' ); ?>

			<p>
				<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
				<button type="submit" class="woocommerce-Button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
				<input type="hidden" name="action" value="save_account_details" />
			</p>

			<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
		</form>
	</div>	
</div>
