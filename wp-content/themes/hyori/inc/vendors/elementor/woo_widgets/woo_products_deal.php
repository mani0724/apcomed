<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Hyori_Elementor_Woo_Products_Deal extends Widget_Base {

	public function get_name() {
        return 'hyori_woo_products_deal';
    }

	public function get_title() {
        return esc_html__( 'Goal Products Deal', 'hyori' );
    }

    public function get_icon() {
        return 'fa fa-shopping-bag';
    }

	public function get_categories() {
        return [ 'hyori-elements' ];
    }

	protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'hyori' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control(
            'title', [
                'label' => esc_html__( 'Widget Title', 'hyori' ),
                'type' => Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'sub_title', [
                'label' => esc_html__( 'Widget Sub Title', 'hyori' ),
                'type' => Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'sub_text', [
                'label' => esc_html__( 'Sub Text', 'hyori' ),
                'type' => Controls_Manager::TEXTAREA
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'product_id', [
                'label' => esc_html__( 'Product ID', 'hyori' ),
                'type' => Controls_Manager::TEXT
            ]
        );

        $repeater->add_control(
            'end_date', [
                'label' => esc_html__( 'End Date', 'hyori' ),
                'type' => Controls_Manager::DATE_TIME,
                'picker_options' => [
                    'enableTime' => false
                ]
            ]
        );

        $this->add_control(
            'products',
            [
                'label' => esc_html__( 'Products Deal', 'hyori' ),
                'type' => Controls_Manager::REPEATER,
                'placeholder' => esc_html__( 'Enter your product tabs here', 'hyori' ),
                'fields' => $repeater->get_controls(),
            ]
        );

        $this->add_control(
            'layout_type',
            [
                'label' => esc_html__( 'Layout', 'hyori' ),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'grid' => esc_html__('Grid', 'hyori'),
                    'carousel' => esc_html__('Carousel', 'hyori'),
                ),
                'default' => 'grid'
            ]
        );

        $this->add_control(
            'product_item',
            [
                'label' => esc_html__( 'Product Item', 'hyori' ),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'inner-deal' => esc_html__('Grid Item', 'hyori'),
                    'inner-deal-list' => esc_html__('List Item', 'hyori'),
                ),
                'default' => 'inner-deal-list',
            ]
        );

        $this->add_control(
            'columns',
            [
                'label' => esc_html__( 'Columns', 'hyori' ),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'number',
                'placeholder' => esc_html__( 'Enter your column number here', 'hyori' ),
                'default' => 4
            ]
        );

        $this->add_control(
            'columns_tablet',
            [
                'label' => esc_html__( 'Columns Tablet', 'hyori' ),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'number',
                'placeholder' => esc_html__( 'Enter your column number here', 'hyori' ),
                'default' => 3,
                'condition' => [
                    'layout_type' => 'carousel',
                ],
            ]
        );

        $this->add_control(
            'rows',
            [
                'label' => esc_html__( 'Rows', 'hyori' ),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'number',
                'placeholder' => esc_html__( 'Enter your rows number here', 'hyori' ),
                'default' => 1,
                'condition' => [
                    'layout_type' => 'carousel',
                ],
            ]
        );

        $this->add_control(
            'show_nav',
            [
                'label'         => esc_html__( 'Show Navigation', 'hyori' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Show', 'hyori' ),
                'label_off'     => esc_html__( 'Hide', 'hyori' ),
                'return_value'  => true,
                'default'       => true,
                'condition' => [
                    'layout_type' => 'carousel',
                ],
            ]
        );

        $this->add_control(
            'show_pagination',
            [
                'label'         => esc_html__( 'Show Pagination', 'hyori' ),
                'type'          => Controls_Manager::SWITCHER,
                'label_on'      => esc_html__( 'Show', 'hyori' ),
                'label_off'     => esc_html__( 'Hide', 'hyori' ),
                'return_value'  => true,
                'default'       => true,
                'condition' => [
                    'layout_type' => 'carousel',
                ],
            ]
        );

   		$this->add_control(
            'el_class',
            [
                'label'         => esc_html__( 'Extra class name', 'hyori' ),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'hyori' ),
            ]
        );

        $this->end_controls_section();


        // Style
        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__( 'Widget Style', 'hyori' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'widget_title_color',
            [
                'label' => esc_html__( 'Widget Title Color', 'hyori' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .products-deal-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sub_title_color',
            [
                'label' => esc_html__( 'Sub Title Color', 'hyori' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .sub-widget-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sub_text_color',
            [
                'label' => esc_html__( 'Sub Text Color', 'hyori' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .sub-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__( 'Widget Title Typography', 'hyori' ),
                'name' => 'widget_title_typography',
                'selector' => '{{WRAPPER}} .widget-title',
            ]
        );



        $this->end_controls_section();

        
        $this->start_controls_section(
            'section_product_style',
            [
                'label' => esc_html__( 'Product Style', 'hyori' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

                $this->add_control(
            'border_color',
            [
                'label' => esc_html__( 'Border Color', 'hyori' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .product-block' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__( 'Button Color', 'hyori' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .product-block .groups-button .add-cart .button::before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .groups-button a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_bg_color',
            [
                'label' => esc_html__( 'Button Background Color', 'hyori' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .product-block .quickview, {{WRAPPER}} .product-block .compare, {{WRAPPER}} .product-block .yith-wcwl-add-to-wishlist a' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .product-block .groups-button .add-cart .button::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_hover_color',
            [
                'label' => esc_html__( 'Button Hover Color', 'hyori' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .product-block .groups-button .add-cart .added_to_cart::before, {{WRAPPER}} .product-block .groups-button .add-cart .button:hover::before ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .product-block .yith-wcwl-add-to-wishlist a:hover, {{WRAPPER}} .product-block .yith-wcwl-add-to-wishlist a:not(.add_to_wishlist), {{WRAPPER}} .product-block .compare:hover, {{WRAPPER}} .product-block .compare.added:before, {{WRAPPER}} .product-block .quickview:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_hover_bg_color',
            [
                'label' => esc_html__( 'Button Hover Background Color', 'hyori' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .product-block .groups-button .add-cart .added_to_cart::before, {{WRAPPER}} .product-block .groups-button .add-cart .button:hover::before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .product-block .yith-wcwl-add-to-wishlist a:hover, {{WRAPPER}} .product-block .yith-wcwl-add-to-wishlist a:not(.add_to_wishlist), {{WRAPPER}} .product-block .compare:hover, {{WRAPPER}} .product-block .compare.added:before, {{WRAPPER}} .product-block .quickview:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'hyori' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} h3.name a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_hover_color',
            [
                'label' => esc_html__( 'Title Hover Color', 'hyori' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .product-block:hover h3.name a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__( 'Title Typography', 'hyori' ),
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} h3.name a',
            ]
        );

        $this->add_control(
            'cat_color',
            [
                'label' => esc_html__( 'Category Color', 'hyori' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .product-cat' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__( 'Category Typography', 'hyori' ),
                'name' => 'cat_typography',
                'selector' => '{{WRAPPER}} .product-cat',
            ]
        );

        $this->add_control(
            'price_color',
            [
                'label' => esc_html__( 'Price Color', 'hyori' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .price' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__( 'Price Typography', 'hyori' ),
                'name' => 'price_typography',
                'selector' => '{{WRAPPER}} .price',
            ]
        );

        $this->add_control(
            'old_price_color',
            [
                'label' => esc_html__( 'Old Price Color', 'hyori' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .price del' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__( 'Old Price Typography', 'hyori' ),
                'name' => 'old_price_typography',
                'selector' => '{{WRAPPER}} .price del',
            ]
        );

        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings();

        extract( $settings );
        if ( $products ) {
            if ( empty($columns) ) {
                $columns = 4;
            }
            $bcol = 12/$columns;
        ?>
            <div class="widget widget-products-deal <?php echo esc_attr($el_class); ?>">
                <div class="widget-title">
                    <?php if ( !empty($sub_title) ): ?>
                        <span class="sub-widget-title <?php echo esc_attr($tab_type); ?>">
                            <?php echo esc_attr( $sub_title ); ?>
                        </span>
                    <?php endif; ?>
                    <?php if ( !empty($title) ): ?>
                        <h3 class="products-deal-title <?php echo esc_attr($tab_type); ?>">
                            <i class="ti-rocket"></i><?php echo esc_attr( $title ); ?>
                        </h3>
                    <?php endif; ?>
                    <?php if ( !empty($sub_text) ): ?>
                        <p class="sub-text <?php echo esc_attr($tab_type); ?>">
                            <?php echo esc_attr( $sub_text ); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="widget-content woocommerce <?php echo esc_attr($layout_type); ?>">
                    <?php if ( $layout_type == 'carousel' ) { ?>
                        <div class="slick-carousel products" data-items="<?php echo esc_attr($columns); ?>" data-medium="<?php echo esc_attr($columns_tablet); ?>" data-smalldesktop="<?php echo esc_attr($columns_tablet); ?>"  data-smallmedium="<?php echo esc_attr(($columns_tablet > 1)?2:1); ?>" data-extrasmall="1" data-pagination="<?php echo esc_attr( $show_pagination ? 'true' : 'false' ); ?>" data-nav="<?php echo esc_attr( $show_nav ? 'true' : 'false' ); ?>" data-rows="<?php echo esc_attr( $rows ); ?>">
                            <?php
                            foreach ($products as $data) {
                                if ( !empty($data['product_id']) ) {
                                    $post_object = get_post( $data['product_id'] );
                                    if ( $post_object ) {
                                        setup_postdata( $GLOBALS['post'] =& $post_object );

                                        ?>
                                            <div class="products-grid product col-md-<?php echo esc_attr($bcol); ?>">
                                                <?php wc_get_template( 'item-product/'.$product_item.'.php' , array(
                                                    'end_date' => !empty($data['end_date']) ? $data['end_date'] : ''
                                                ) ); ?>
                                            </div>
                                        <?php
                                    }
                                }
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                    <?php } else { ?>
                        <div class="row">
                            <?php
                            foreach ($products as $data) {
                                
                                if ( !empty($data['product_id']) ) {
                                    $post_object = get_post( $data['product_id'] );
                                    if ( $post_object ) {
                                        setup_postdata( $GLOBALS['post'] =& $post_object );

                                        ?>
                                            <div class="products-grid product col-md-<?php echo esc_attr($bcol); ?>">
                                                <?php wc_get_template( 'item-product/'.$product_item.'.php' , array(
                                                    'end_date' => !empty($data['end_date']) ? $data['end_date'] : ''
                                                ) ); ?>
                                            </div>
                                        <?php 
                                    }
                                }
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                    <?php } ?>

                </div>
            </div>
            <?php
        }
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Hyori_Elementor_Woo_Products_Deal );