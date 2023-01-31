<?php

// Shop Archive settings
function hyori_woo_redux_config($sections, $sidebars, $columns) {
    $attributes = array();
    if ( is_admin() ) {
        $attrs = wc_get_attribute_taxonomies();
        if ( $attrs ) {
            foreach ( $attrs as $tax ) {
                $attributes[wc_attribute_taxonomy_name( $tax->attribute_name )] = $tax->attribute_label;
            }
        }
    }
    $sections[] = array(
        'icon' => 'el el-shopping-cart',
        'title' => esc_html__('Shop Settings', 'hyori'),
        'fields' => array(
            array (
                'id' => 'products_general_total_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3 style="margin: 0;"> '.esc_html__('General Setting', 'hyori').'</h3>',
            ),
            array(
                'id' => 'enable_shop_catalog',
                'type' => 'switch',
                'title' => esc_html__('Enable Shop Catalog', 'hyori'),
                'default' => 0,
                'subtitle' => esc_html__('Enable Catalog Mode for disable Add To Cart button, Cart, Checkout', 'hyori'),
            ),
            array (
                'id' => 'products_watches_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3 style="margin: 0;"> '.esc_html__('Swatches Variation Setting', 'hyori').'</h3>',
            ),
            array(
                'id' => 'show_product_swatches_on_grid',
                'type' => 'switch',
                'title' => esc_html__('Show Swatches On Product Grid', 'hyori'),
                'default' => 1
            ),
            array(
                'id' => 'product_swatches_attribute',
                'type' => 'select',
                'title' => esc_html__( 'Grid swatch attribute to display', 'hyori' ),
                'subtitle' => esc_html__( 'Choose attribute that will be shown on products grid', 'hyori' ),
                'options' => $attributes
            ),
            array(
                'id' => 'show_product_swatches_use_images',
                'type' => 'switch',
                'title' => esc_html__('Use images from product variations', 'hyori'),
                'subtitle' => esc_html__( 'If enabled swatches buttons will be filled with images choosed for product variations and not with images uploaded to attribute terms.', 'hyori' ),
                'default' => 1
            ),
            array(
                'id' => 'products_breadcrumb_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3 style="margin: 0;"> '.esc_html__('Breadcrumbs Setting', 'hyori').'</h3>',
            ),
            array(
                'id' => 'show_product_breadcrumbs',
                'type' => 'switch',
                'title' => esc_html__('Breadcrumbs', 'hyori'),
                'default' => 1
            ),
            array (
                'title' => esc_html__('Breadcrumbs Background Color', 'hyori'),
                'subtitle' => '<em>'.esc_html__('The breadcrumbs background color of the site.', 'hyori').'</em>',
                'id' => 'woo_breadcrumb_color',
                'type' => 'color',
                'transparent' => false,
            ),
            array(
                'id' => 'woo_breadcrumb_image',
                'type' => 'media',
                'title' => esc_html__('Breadcrumbs Background', 'hyori'),
                'subtitle' => esc_html__('Upload a .jpg or .png image that will be your breadcrumbs.', 'hyori'),
            ),
        )
    );
    // Archive settings

    $sections[] = array(
        'title' => esc_html__('Product Archives', 'hyori'),
        'subsection' => true,
        'fields' => array(
            array(
                'id' => 'products_general_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3 style="margin: 0;"> '.esc_html__('General Setting', 'hyori').'</h3>',
            ),
            array(
                'id' => 'show_shop_cat_title',
                'type' => 'switch',
                'title' => esc_html__('Show Shop/Category Title ?', 'hyori'),
                'default' => 1
            ),
            array(
                'id' => 'product_display_mode',
                'type' => 'select',
                'title' => esc_html__('Products Layout', 'hyori'),
                'subtitle' => esc_html__('Choose a default layout archive product.', 'hyori'),
                'options' => array(
                    'grid' => esc_html__('Grid', 'hyori'),
                    'list' => esc_html__('List', 'hyori'),
                ),
                'default' => 'grid'
            ),
            array(
                'id' => 'product_columns',
                'type' => 'select',
                'title' => esc_html__('Product Columns', 'hyori'),
                'options' => $columns,
                'default' => 4,
                'required' => array('product_display_mode', '=', array('grid'))
            ),
            array(
                'id' => 'number_products_per_page',
                'type' => 'text',
                'title' => esc_html__('Number of Products Per Page', 'hyori'),
                'default' => 12,
                'min' => '1',
                'step' => '1',
                'max' => '100',
                'type' => 'slider'
            ),
            array(
                'id' => 'show_quickview',
                'type' => 'switch',
                'title' => esc_html__('Show Quick View', 'hyori'),
                'default' => 1
            ),
            array(
                'id' => 'show_rating',
                'type' => 'switch',
                'title' => esc_html__('Show Rating', 'hyori'),
                'default' => 1
            ),
            
            array(
                'id' => 'enable_swap_image',
                'type' => 'switch',
                'title' => esc_html__('Enable Swap Image', 'hyori'),
                'default' => 1
            ),

            array(
                'id' => 'product_pagination',
                'type' => 'select',
                'title' => esc_html__('Pagination Type', 'hyori'),
                'options' => array(
                    'default' => esc_html__('Default', 'hyori'),
                    'loadmore' => esc_html__('Load More Button', 'hyori'),
                    'infinite' => esc_html__('Infinite Scrolling', 'hyori'),
                ),
                'default' => 'default'
            ),

            array(
                'id' => 'show_archive_product_recent_viewed',
                'type' => 'switch',
                'title' => esc_html__('Show Products Recent Viewed', 'hyori'),
                'default' => 1
            ),
            array(
                'id' => 'number_archive_product_recent_viewed',
                'title' => esc_html__('Number of Recent Viewed products to show', 'hyori'),
                'default' => 4,
                'min' => '1',
                'step' => '1',
                'max' => '50',
                'type' => 'slider',
                'required' => array('show_archive_product_recent_viewed', '=', true)
            ),
            array(
                'id' => 'recent_archive_viewed_product_columns',
                'type' => 'select',
                'title' => esc_html__('Recent Viewed Products Columns', 'hyori'),
                'options' => $columns,
                'default' => 4,
                'required' => array('show_archive_product_recent_viewed', '=', true)
            ),

            array(
                'id' => 'products_sidebar_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3 style="margin: 0;"> '.esc_html__('Sidebar Setting', 'hyori').'</h3>',
            ),
            array(
                'id' => 'product_archive_fullwidth',
                'type' => 'switch',
                'title' => esc_html__('Is Full Width?', 'hyori'),
                'default' => false
            ),
            array(
                'id' => 'product_archive_layout',
                'type' => 'image_select',
                'compiler' => true,
                'title' => esc_html__('Archive Product Layout', 'hyori'),
                'subtitle' => esc_html__('Select the layout you want to apply on your archive product page.', 'hyori'),
                'options' => array(
                    'main' => array(
                        'title' => esc_html__('Main Content', 'hyori'),
                        'alt' => esc_html__('Main Content', 'hyori'),
                        'img' => get_template_directory_uri() . '/inc/assets/images/screen1.png'
                    ),
                    'left-main' => array(
                        'title' => esc_html__('Left Sidebar - Main Content', 'hyori'),
                        'alt' => esc_html__('Left Sidebar - Main Content', 'hyori'),
                        'img' => get_template_directory_uri() . '/inc/assets/images/screen2.png'
                    ),
                    'main-right' => array(
                        'title' => esc_html__('Main Content - Right Sidebar', 'hyori'),
                        'alt' => esc_html__('Main Content - Right Sidebar', 'hyori'),
                        'img' => get_template_directory_uri() . '/inc/assets/images/screen3.png'
                    ),
                ),
                'default' => 'left-main'
            ),
            array(
                'id' => 'product_archive_left_sidebar',
                'type' => 'select',
                'title' => esc_html__('Archive Left Sidebar', 'hyori'),
                'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'hyori'),
                'options' => $sidebars,
                'required' => array('product_archive_layout', '=', array('left-main'))
            ),
            array(
                'id' => 'product_archive_right_sidebar',
                'type' => 'select',
                'title' => esc_html__('Archive Right Sidebar', 'hyori'),
                'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'hyori'),
                'options' => $sidebars,
                'required' => array('product_archive_layout', '=', array('main-right'))
            ),
            array(
                'id' => 'product_archive_top_filter_style',
                'type' => 'select',
                'title' => esc_html__('Top Filter Style', 'hyori'),
                'subtitle' => esc_html__('Choose a top filter style.', 'hyori'),
                'options' => array(
                    'style1' => esc_html__('Style 1', 'hyori'),
                ),
                'default' => 'style1',
                'required' => array('product_archive_layout', '=', array('main'))
            ),
        )
    );
    
    
    // Product Page
    $sections[] = array(
        'title' => esc_html__('Single Product', 'hyori'),
        'subsection' => true,
        'fields' => array(
            array (
                'id' => 'product_general_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3 style="margin: 0;"> '.esc_html__('General Setting', 'hyori').'</h3>',
            ),
            array(
                'id' => 'product_single_version',
                'type' => 'select',
                'title' => esc_html__('Product Layout', 'hyori'),
                'options' => array(
                    'v1' => esc_html__('Layout 1 (3 Columns)', 'hyori'),
                    'v2' => esc_html__('Layout 2 (2 Columns)', 'hyori'),
                ),
                'default' => 'v2',
            ),
            array(
                'id' => 'product_thumbs_position',
                'type' => 'select',
                'title' => esc_html__('Thumbnails Position', 'hyori'),
                'options' => array(
                    'thumbnails-left' => esc_html__('Thumbnails Left', 'hyori'),
                    'thumbnails-right' => esc_html__('Thumbnails Right', 'hyori'),
                    'thumbnails-bottom' => esc_html__('Thumbnails Bottom', 'hyori'),
                ),
                'default' => 'thumbnails-left',
            ),
            array(
                'id' => 'number_product_thumbs',
                'title' => esc_html__('Number Thumbnails Per Row', 'hyori'),
                'default' => 4,
                'min' => '1',
                'step' => '1',
                'max' => '8',
                'type' => 'slider',
            ),
            array(
                'id' => 'product_delivery_info',
                'type' => 'editor',
                'title' => esc_html__('Delivery Information', 'hyori'),
                'default' => '',
            ),
            array(
                'id' => 'product_shipping_info',
                'type' => 'editor',
                'title' => esc_html__('Shipping Information', 'hyori'),
                'default' => '',
            ),
            array(
                'id' => 'show_product_countdown_timer',
                'type' => 'switch',
                'title' => esc_html__('Show Product CountDown Timer', 'hyori'),
                'subtitle' => esc_html__('For only product deal', 'hyori'),
                'default' => 1
            ),
            array(
                'id' => 'show_product_meta',
                'type' => 'switch',
                'title' => esc_html__('Show Product Meta', 'hyori'),
                'default' => 1
            ),
            array(
                'id' => 'show_product_social_share',
                'type' => 'switch',
                'title' => esc_html__('Show Social Share', 'hyori'),
                'default' => 1
            ),
            array(
                'id' => 'show_product_review_tab',
                'type' => 'switch',
                'title' => esc_html__('Show Product Review Tab', 'hyori'),
                'default' => 1
            ),
            array(
                'id' => 'hidden_product_additional_information_tab',
                'type' => 'switch',
                'title' => esc_html__('Hidden Product Additional Information Tab', 'hyori'),
                'default' => 1
            ),

            array (
                'id' => 'product_sidebar_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3 style="margin: 0;"> '.esc_html__('Sidebar Setting', 'hyori').'</h3>',
            ),
            array(
                'id' => 'product_single_layout',
                'type' => 'image_select',
                'compiler' => true,
                'title' => esc_html__('Single Product Sidebar Layout', 'hyori'),
                'subtitle' => esc_html__('Select the layout you want to apply on your Single Product Page.', 'hyori'),
                'options' => array(
                    'main' => array(
                        'title' => esc_html__('Main Only', 'hyori'),
                        'alt' => esc_html__('Main Only', 'hyori'),
                        'img' => get_template_directory_uri() . '/inc/assets/images/screen1.png'
                    ),
                    'left-main' => array(
                        'title' => esc_html__('Left - Main Sidebar', 'hyori'),
                        'alt' => esc_html__('Left - Main Sidebar', 'hyori'),
                        'img' => get_template_directory_uri() . '/inc/assets/images/screen2.png'
                    ),
                    'main-right' => array(
                        'title' => esc_html__('Main - Right Sidebar', 'hyori'),
                        'alt' => esc_html__('Main - Right Sidebar', 'hyori'),
                        'img' => get_template_directory_uri() . '/inc/assets/images/screen3.png'
                    ),
                ),
                'default' => 'left-main'
            ),
            array(
                'id' => 'product_single_fullwidth',
                'type' => 'switch',
                'title' => esc_html__('Is Full Width?', 'hyori'),
                'default' => false
            ),
            array(
                'id' => 'product_single_left_sidebar',
                'type' => 'select',
                'title' => esc_html__('Single Product Left Sidebar', 'hyori'),
                'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'hyori'),
                'options' => $sidebars
            ),
            array(
                'id' => 'product_single_right_sidebar',
                'type' => 'select',
                'title' => esc_html__('Single Product Right Sidebar', 'hyori'),
                'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'hyori'),
                'options' => $sidebars
            ),
            array(
                'id' => 'product_block_setting',
                'icon' => true,
                'type' => 'info',
                'raw' => '<h3 style="margin: 0;"> '.esc_html__('Product Block Setting', 'hyori').'</h3>',
            ),
            array(
                'id' => 'show_product_releated',
                'type' => 'switch',
                'title' => esc_html__('Show Products Releated', 'hyori'),
                'default' => 1
            ),
            array(
                'id' => 'number_product_releated',
                'title' => esc_html__('Number of related products to show', 'hyori'),
                'default' => 4,
                'min' => '1',
                'step' => '1',
                'max' => '50',
                'type' => 'slider',
                'required' => array('show_product_releated', '=', true)
            ),
            array(
                'id' => 'releated_product_columns',
                'type' => 'select',
                'title' => esc_html__('Releated Products Columns', 'hyori'),
                'options' => $columns,
                'default' => 4,
                'required' => array('show_product_releated', '=', true)
            ),

            array(
                'id' => 'show_product_upsells',
                'type' => 'switch',
                'title' => esc_html__('Show Products upsells', 'hyori'),
                'default' => 1
            ),
            array(
                'id' => 'upsells_product_columns',
                'type' => 'select',
                'title' => esc_html__('Upsells Products Columns', 'hyori'),
                'options' => $columns,
                'default' => 4,
                'required' => array('show_product_upsells', '=', true)
            ),
            array(
                'id' => 'show_product_recent_viewed',
                'type' => 'switch',
                'title' => esc_html__('Show Products Recent Viewed', 'hyori'),
                'default' => 1
            ),
            array(
                'id' => 'number_product_recent_viewed',
                'title' => esc_html__('Number of Recent Viewed products to show', 'hyori'),
                'default' => 4,
                'min' => '1',
                'step' => '1',
                'max' => '50',
                'type' => 'slider',
                'required' => array('show_product_recent_viewed', '=', true)
            ),
            array(
                'id' => 'recent_viewed_product_columns',
                'type' => 'select',
                'title' => esc_html__('Recent Viewed Products Columns', 'hyori'),
                'options' => $columns,
                'default' => 4,
                'required' => array('show_product_recent_viewed', '=', true)
            ),
        )
    );
    
    return $sections;
}
add_filter( 'hyori_redux_framwork_configs', 'hyori_woo_redux_config', 10, 3 );