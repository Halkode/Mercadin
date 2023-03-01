<?php


// REST API FOR PRODUCTS
function my_rest_get_prod_list(WP_REST_Request $request)
{
    $WP_posts_prods = new WP_Query(array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'orderby' => 'order',
        'order' => 'ASC',
        'posts_per_page' => $request->get_param('s') ? 5 : -1,
        's' => $request->get_param('s'),
    ));


    $prods_obj = array();

    if ($WP_posts_prods->have_posts()) {
        while ($WP_posts_prods->have_posts()) {

            $WP_posts_prods->the_post();

            $prods = $WP_posts_prods->post;
            $post_id = get_the_ID();
            $prods->title = get_the_title($post_id);
            $prods->thumb = get_the_post_thumbnail_url($post_id);
            $prods->ID = $post_id;
            $prods->link = get_the_permalink($post_id);
            $prods->meta = get_post_meta($post_id);
            $prods_obj[] = $prods;
        }
    } else {
        return new WP_Error('no_posts', __('Nenhum resultado encontrado.'), array('status' => 404));
    }
    $response = array(
        'prods' => $prods_obj,
        'meta' => array(
            'max_num_pages' => absint($WP_posts_prods->max_num_pages),
            'found_posts' => absint($WP_posts_prods->found_posts),
        )
    );
    wp_reset_postdata();
    return new WP_REST_Response($response, 200);
}

function my_rest_api_init_prods()
{
    register_rest_route(THEME_REST_NAMESPACE, '/prods', array(
        'methods' => 'GET',
        'callback' => 'my_rest_get_prod_list',
    ));
}

add_action('rest_api_init', 'my_rest_api_init_prods');
