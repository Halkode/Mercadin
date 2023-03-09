<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' ); ?>

<?php $cat = get_queried_object(); ?>


<!-- <section class="shop-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                /**
                 * Hook: woocommerce_before_main_content.
                 *
                 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                 * @hooked woocommerce_breadcrumb - 20
                 * @hooked WC_Structured_Data::generate_website_data() - 30
                 */
                // do_action( 'woocommerce_before_main_content' );
                ?>
            </div>
        </div>
    </div>
</section> -->

<header class="woocommerce-products-header shop-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="header-page">
                    <?php
                    /**
                     * Hook: woocommerce_archive_description.
                     *
                     * @hooked woocommerce_taxonomy_archive_description - 10
                     * @hooked woocommerce_product_archive_description - 10
                     */
                    do_action( 'woocommerce_archive_description' );
                    ?>
                    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                        <!-- <p>Todos os produtos</p> -->
                        <!-- <h1 class="woocommerce-products-header__title page-title title-global text-center"><?php woocommerce_page_title(); ?></h1> -->
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="shop-products woocommerce-shop pt-5 px-md-0 px-3">
    <div class="container">
        <div class="row list-top">
            <?php
                    $args = [
                        'post_type'      => 'product',
                        'posts_per_page' => 4,
                    ];
                    if ($_GET['in_categories']) {
                        $args['tax_query'] = [
                            [
                                'taxonomy' 	=> 'product_cat',
                                'field' 		=> 'slug',
                                'terms' 		=> $_GET['in_categories']
                            ],
                        ];
                    }
                    $posts = new WP_Query($args);
                ?>
                <?php if ( $posts->have_posts() ) : ?>
                    <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                        <?php $title = get_the_title(); ?>
                        <?php $cap = get_the_post_thumbnail_caption(); ?>
                        <div class="col-lg-3 card-product">
                            <a href="<?php echo get_the_permalink(); ?>" class="hover-transform">
                                <div class="overflow-hidden">
                                    <img src="<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : image('placeholder.svg'); ?>" alt="<?php echo ($cap) ? $cap : $title; ?>" class="img-fluid" />
                                </div>
                                <h2 class="blog-featured-title">
                                    <?php echo $title; ?>
                                </h2>
                            </a>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php wp_reset_query(); ?>
                <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-md-3 col-filters">
                <?php echo do_shortcode('[woof autosubmit=1 price_filter=1]'); ?>
                <form action="" method="GET" id="filter-form">
                    <?php
                        $categories = get_terms([
                            'taxonomy'  => 'product_cat',
                            'parent'    => 0,
                            'hide_empty' => false
                        ]);

                        if ( $categories ) :
                    ?>
                        <h4>Categorias</h4>
                        <?php foreach ( $categories as $category ) : 
                            $subcategories = get_terms([
                                'taxonomy'  => 'product_cat',
                                'parent'    => $category->term_id,
                                'hide_empty' => false
                            ]);    
                        ?>
                            <div class="form-check">
                                <input
                                    type="checkbox"
                                    name="in_categories[]"
                                    value="<?php echo $category->slug; ?>"
                                    class="form-check-input"
                                    <?php echo in_array($category->slug, $_GET['in_categories']) ? 'checked' : '' ?>
                                >
                                <label class="form-check-label parent-filter-category">
                                    <?php echo $category->name; ?>
                                    <?php
                                        if ( !empty($subcategories) ) :
                                    ?>
                                    <span class="collapse-categories-button" data-category-id="<?php echo $category->term_id ?>">
                                       <i class="fa-solid fa-chevron-down"></i>
                                    </span>
                                    <?php endif; ?>
                                </label>
                            </div>
                            <?php
                                if ( !empty($subcategories) ) :
                            ?>
                                <div class="collapse-categories collapse-categories-<?php echo $category->term_id ?>">
                                    <?php foreach ( $subcategories as $subcategory ) :  ?>
                                        <div class="form-check ps-5">
                                            <input
                                                type="checkbox"
                                                name="in_categories[]"
                                                value="<?php echo $subcategory->slug ?>"
                                                class="form-check-input"
                                                <?php echo in_array($subcategory->slug, $_GET['in_categories']) ? 'checked' : '' ?>
                                            >
                                            <label class="form-check-label"><?php echo $subcategory->name ?></label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    
                    <input type="hidden" name="post_type" value="product">

                    <input type="submit" value="Buscar" class="btn btn-primary rounded-pill mt-3 d-block text-white">
                </form>
            </div>
            <div class="col-md-9 col-products">
                <h5><?php echo get_search_query(true) ?></h5>
                <?php
                    $args = [
                        'post_type'      => 'product',
                        'posts_per_page' => 2,
                        'offset'         => 4
                    ];
            
                    $posts = new WP_Query($args);
                ?>
                <?php if ( $posts->have_posts() ) : ?>
                    <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                        <?php $title = get_the_title(); ?>
                        <?php $cap = get_the_post_thumbnail_caption(); ?>
                        <div class="col-lg-4 card-product">
                            <a href="<?php echo get_the_permalink(); ?>" class="hover-transform">
                                <div class="overflow-hidden">
                                    <img src="<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : image('placeholder.svg'); ?>" alt="<?php echo ($cap) ? $cap : $title; ?>" class="img-fluid" />
                                </div>
                                <h2 class="blog-featured-title">
                                    <?php echo $title; ?>
                                </h2>
                                <div class="btt btt-primary blog-featured-button">Ver mais</div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php wp_reset_query(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
// do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
