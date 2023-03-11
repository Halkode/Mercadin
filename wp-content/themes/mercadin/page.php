<?php get_header(); ?>

<main class="main-container homepage">
    <?php if(!is_user_logged_in()): ?>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <?php
                        echo do_shortcode('[ultimatemember form_id="76"]');
                    ?>
                </div>
            </div>
        </div>
        
    <?php else : ?>
        <?php
            get_template_part('partials/banner');
            get_template_part('woocommerce/archive-product');
        ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>