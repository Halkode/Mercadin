<?php // Template name: Pedidos ?>
<?php get_header(); ?>
<main class="main-container my-account">
    <div class="container">
        <div class="woocommerce row">
            <?php do_action( 'woocommerce_account_navigation' ); ?>
            <?php

            defined( 'ABSPATH' ) || exit;

            do_action( 'woocommerce_before_account_orders', $has_orders ); ?>

            <div class="woocommerce-MyAccount-content col-lg-7 offset-lg-1">
                <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                    <thead>
                        <tr class="bg-primary cart-table-head">
                            <th class=""><?php esc_html_e( 'Code', 'woocommerce' ); ?></th>
                            <th class=""><?php esc_html_e( 'Date', 'woocommerce' ); ?></th>
                            <th class=""><?php esc_html_e( 'Status', 'woocommerce' ); ?></th>
                            <th class=""><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
                            <th class=""><?php esc_html_e( 'Actions', 'woocommerce' ); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ( $customer_orders->orders as $customer_order ) {
                            $order      = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
                            $item_count = $order->get_item_count() - $order->get_item_count_refunded();
                        ?>

                            <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr( $order->get_status() ); ?> order">
                                <?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
                                        <?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
                                            <?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>

                                        <?php elseif ( 'order-number' === $column_id ) : ?>
                                            <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
                                                <?php echo esc_html( _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number() ); ?>
                                            </a>

                                        <?php elseif ( 'order-date' === $column_id ) : ?>
                                            <time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'd/m/Y' ) ); ?>"><?php echo esc_html($order->get_date_created()->date( 'd/m/Y' )  ); ?></time>

                                        <?php elseif ( 'order-status' === $column_id ) : ?>
                                            <?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>

                                        <?php elseif ( 'order-total' === $column_id ) : ?>
                                            <?php
                                            /* translators: 1: formatted order total 2: total order items */
                                            echo wp_kses_post(  $order->get_formatted_order_total()  );
                                            ?>

                                        <?php elseif ( 'order-actions' === $column_id ) : ?>
                                            <?php
                                            $actions = wc_get_account_orders_actions( $order );

                                            if ( ! empty( $actions ) ) {
                                                foreach ( $actions as $key => $action ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
                                                    echo '<a href="' . esc_url( $action['url'] ) . '" class="woocommerce-button' . esc_attr( $wp_button_class ) . ' button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
                                                }
                                            }
                                            ?>
                                        <?php endif; ?>
                                    </td>
                                <?php endforeach; ?>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                        
            </div>
            <?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>

            <?php if ( 1 < $customer_orders->max_num_pages ) : ?>
                <div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
                    <?php if ( 1 !== $current_page ) : ?>
                        <a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"><?php esc_html_e( 'Previous', 'woocommerce' ); ?></a>
                    <?php endif; ?>

                    <?php if ( intval( $customer_orders->max_num_pages ) !== $current_page ) : ?>
                        <a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"><?php esc_html_e( 'Next', 'woocommerce' ); ?></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>

        </div>
    </div>
</main>
<?php get_footer(); ?>