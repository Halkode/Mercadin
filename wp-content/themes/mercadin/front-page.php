<?php get_header(); ?>

<main class="main-container homepage">
    <?php
        get_template_part('partials/banner');
        get_template_part('woocommerce/archive-product');
    ?>
</main>

<?php get_footer(); ?>