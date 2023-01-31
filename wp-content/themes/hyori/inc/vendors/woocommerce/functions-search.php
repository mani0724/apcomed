<?php

if ( !function_exists( 'hyori_autocomplete_search' ) ) {
    function hyori_autocomplete_search() {

        if ( hyori_get_config('enable_autocompleate_search', true) ) {
            wp_enqueue_script( 'typeahead-bundle', get_template_directory_uri() . '/js/typeahead.bundle.min.js', array('jquery'), null, true);
        }
    }
}
add_action( 'init', 'hyori_autocomplete_search' );

add_action( 'wc_ajax_hyori_autocomplete_search', 'hyori_autocomplete_suggestions' );
function hyori_autocomplete_suggestions() {
    // Query for suggestions
    $args = array(
        'posts_per_page' => 10,
        'fields' => 'ids',
        'post_type' => 'product',
        's' => $_REQUEST['s']
    );

    if ( isset($_REQUEST['category']) ) {
        $args['product_cat'] = $_REQUEST['category'];
    }
    $posts = get_posts( $args );
    $suggestions = array();

    foreach ($posts as $post_id) {
        
        $product = wc_get_product( $post_id );

        $suggestion = array();
        $suggestion['title'] = esc_html($product->get_title());
        $suggestion['url'] = get_permalink($post_id);
        if ( has_post_thumbnail( $post_id ) ) {
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'woocommerce_thumbnail' );
            $suggestion['image'] = $image[0];
        } else {
            $suggestion['image'] = '';
        }
        $suggestion['category'] = '';
        $terms = get_the_terms( $post_id, 'product_cat' );
        if ( !empty($terms) && !empty($terms[0]) ) {
            $suggestion['category'] = $terms[0]->name;
        }
        
        $suggestion['price'] = $product->get_price_html();
        $suggestion['id'] = $post_id;

        $suggestions[] = $suggestion;
    }
    
    echo json_encode( $suggestions );
 
    exit;
}