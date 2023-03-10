<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );

?>

<nav class="woocommerce-MyAccount-navigation col-lg-4">
	<ul>
		<li class="<?php echo wc_get_account_menu_item_classes(get_option( 'woocommerce_myaccount', 'dashboard' )); ?>">
			<a href="<?php echo esc_url( wc_get_account_endpoint_url(get_option( 'woocommerce_myaccount', 'dashboard' ) ) ); ?>">
				<img src="<?php echo asset('img/myaccount.svg');?>" alt="Minha conta">		
				<?php echo _e( 'Dados pessoais' ); ?>
			</a>
		</li>
		<li class="<?php echo wc_get_account_menu_item_classes( get_option( 'woocommerce_myaccount_orders_endpoint', 'orders' ) ); ?>">
			<a href="<?php echo esc_url( wc_get_account_endpoint_url( get_option( 'woocommerce_myaccount_orders_endpoint', 'orders' ) ) ); ?>">
				<img src="<?php echo asset('img/bag.svg');?>" alt="">	
				<?php echo _e( 'Pedidos' ); ?>
			</a>
		</li>
		<!-- <li class="<?php echo wc_get_account_menu_item_classes( get_option( 'woocommerce_myaccount_orders_endpoint', 'orders' ) ); ?>">
			<a href="<?php echo esc_url( wc_get_account_endpoint_url( get_option( 'woocommerce_myaccount_orders_endpoint', 'orders' ) ) ); ?>">
				<img src="<?php echo asset('img/favorite.svg');?>" alt="">	
				<?php echo _e( 'Pedidos' ); ?>
			</a>
		</li> -->
		<li class="<?php echo wc_get_account_menu_item_classes( get_option( 'woocommerce_logout_endpoint', 'customer-logout' ) ); ?>">
			<a href="<?php echo esc_url( wc_get_account_endpoint_url( get_option( 'woocommerce_logout_endpoint', 'customer-logout' ) ) ); ?>">
				<img src="<?php echo asset('img/logout.svg');?>" alt="">		
				<?php echo _e( 'Sair da conta' ); ?>
			</a>
		</li>
	</ul>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
