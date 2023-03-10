<?php // Template name: Minha conta ?>
<?php get_header(); ?>

<main class="main-container my-account">
    <div class="container">
        <?php if(!is_user_logged_in()): ?>
            <?php
                echo do_shortcode('[ultimatemember form_id="1419"]');
            ?>
        <?php else : ?>
            <?php echo do_shortcode('[woocommerce_my_account]') ?>
        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>