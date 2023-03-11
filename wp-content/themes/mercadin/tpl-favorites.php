<?php // Template name: Favoritos ?>
<?php get_header(); ?>

<main class="main-container my-account">
    <div class="container">
        <div class="woocommerce row">
            <?php do_action( 'woocommerce_account_navigation' ); ?>
            <div class="woocommerce-MyAccount-content col-lg-7 offset-lg-1">
                <?php $favorites =  get_user_favorites(); ?>
                <?php if ( $favorites ) : ?>
                    <div class="row p-3">
                        <?php foreach ( $favorites as $favorite ) : ?>
                            <?php $product = new WC_Product($favorite);?>
                            <a href="<?php echo get_permalink($favorite) ?>"class="favorite col-lg-4 gap-3">
                                <?php echo do_shortcode('[favorite_button post_id="'.$favorite.'"]'); ?>
                                <img class="product-image" src="<?php echo get_the_post_thumbnail_url($favorite) ?>" alt="">
                               
                                <div class="product-info">
                                    <p class="product-name"><?php echo get_the_title($favorite) ?></p>
                                </div>
                                <div class="money d-flex justify-content-center">
                                    <div class="normal-money">
                                        <p>R$ <?php echo $product->get_price() ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <p>Nenhum favorito encontrado</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>