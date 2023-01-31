<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Hyori_Elementor_Banner extends Widget_Base {

	public function get_name() {
        return 'hyori_banner';
    }

	public function get_title() {
        return esc_html__( 'Goal Banner', 'hyori' );
    }
    
	public function get_categories() {
        return [ 'hyori-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Banner', 'hyori' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // $this->add_control(
        //     'img_bg_src',
        //     [
        //         'name' => 'image',
        //         'label' => esc_html__( 'Image Background', 'hyori' ),
        //         'type' => Controls_Manager::MEDIA,
        //         'placeholder'   => esc_html__( 'Upload Image Background Here', 'hyori' ),
        //     ]
        // );
        $this->add_control(
            'img_src',
            [
                'name' => 'image',
                'label' => esc_html__( 'Image', 'hyori' ),
                'type' => Controls_Manager::MEDIA,
                'placeholder'   => esc_html__( 'Upload Image Here', 'hyori' ),
            ]
        );

        $this->add_responsive_control(
            'img_align',
            [
                'label' => esc_html__( 'Image Alignment', 'hyori' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'hyori' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'hyori' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'hyori' ),
                        'icon' => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justified', 'hyori' ),
                        'icon' => 'fa fa-align-justify',
                    ],
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .banner-image' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__( 'URL', 'hyori' ),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'url',
                'placeholder' => esc_html__( 'Enter your Button Link here', 'hyori' ),
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => esc_html__( 'Content', 'hyori' ),
                'type' => Controls_Manager::WYSIWYG,
                'placeholder' => esc_html__( 'Enter your content here', 'hyori' ),
            ]
        );

        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__( 'Button Text', 'hyori' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Enter your button text here', 'hyori' ),
            ]
        );

        $this->add_control(
            'btn_style',
            [
                'label' => esc_html__( 'Button Style', 'hyori' ),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'btn-theme' => esc_html__('Theme Color', 'hyori'),
                    'btn-theme btn-outline' => esc_html__('Theme Outline Color', 'hyori'),
                    'btn-default' => esc_html__('Default ', 'hyori'),
                    'btn-primary' => esc_html__('Primary ', 'hyori'),
                    'btn-success' => esc_html__('Success ', 'hyori'),
                    'btn-info' => esc_html__('Info ', 'hyori'),
                    'btn-warning' => esc_html__('Warning ', 'hyori'),
                    'btn-danger' => esc_html__('Danger ', 'hyori'),
                    'btn-pink' => esc_html__('Pink ', 'hyori'),
                    'btn-white' => esc_html__('White ', 'hyori'),
                ),
                'default' => 'btn-default'
            ]
        );

        $this->add_responsive_control(
            'content_align',
            [
                'label' => esc_html__( 'Content Alignment', 'hyori' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'hyori' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'hyori' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'hyori' ),
                        'icon' => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justified', 'hyori' ),
                        'icon' => 'fa fa-align-justify',
                    ],
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .banner-content' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'style',
            [
                'label' => esc_html__( 'Style', 'hyori' ),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'style1' => esc_html__('Style 1', 'hyori'),
                    'style2' => esc_html__('Style 2', 'hyori'),
                    'style3' => esc_html__('Style 3', 'hyori'),
                ),
                'default' => 'style1'
            ]
        );
        // $this->add_control(
        //     'vertical',
        //     [
        //         'label' => esc_html__( 'Vertical Content', 'hyori' ),
        //         'type' => Controls_Manager::SELECT,
        //         'options' => array(
        //             'flex-top' => esc_html__('Top', 'hyori'),
        //             'flex-middle' => esc_html__('Middle', 'hyori'),
        //             'flex-bottom' => esc_html__('Bottom', 'hyori'),
        //         ),
        //         'default' => 'flex-middle'
        //     ]
        // );
   		$this->add_control(
            'el_class',
            [
                'label'         => esc_html__( 'Extra class name', 'hyori' ),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'hyori' ),
            ]
        );

        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        $img_bg_src = ( isset( $img_bg_src['id'] ) && $img_bg_src['id'] != 0 ) ? wp_get_attachment_url( $img_bg_src['id'] ) : '';
        $style_bg = '';
        if ( !empty($img_bg_src) ) {
            $style_bg = 'style="background-image:url('.esc_url($img_bg_src).'); background-repeat: no-repeat;"';
        }
        ?>
        <div class="widget-banner updow" <?php echo trim($style_bg); ?>>
            <?php if ( !empty($link) ) { ?>
                <a href="<?php echo esc_url($link); ?>">
            <?php } ?>
                <div class="inner">
                    <?php
                    if ( !empty($img_src['id']) ) {
                    ?>
                        <div class="col-xs-<?php echo esc_attr(!empty($content) ? '12':'12' ); ?>">
                            <div class="banner-image">
                                <?php echo hyori_get_attachment_thumbnail($img_src['id'], 'full'); ?>
                                <?php if ( (!empty($content) && !empty($btn_text)) || !empty($content) ) { ?>
                                    <div class="banner-content <?php echo esc_attr($el_class.' '.$style); ?>">
                                        <div class="banner-content-inner">
                                            <?php if ( !empty($content) ) { ?>
                                                <?php echo wp_kses_post($content); ?>
                                            <?php } ?>
                                            <?php if ( !empty($btn_text) ) { ?>
                                                <div class="link-bottom">
                                                    <span class="btn radius-50 <?php echo esc_attr(!empty($btn_style) ? $btn_style : ''); ?>"><?php echo wp_kses_post($btn_text); ?></span>
                                                </div>
                                            <?php } ?>
                                            <?php if ( !empty($btn_text) && empty($content) ) { ?>
                                                <a class="btn radius-50 <?php echo esc_attr(!empty($btn_style) ? $btn_style : ''); ?>" href="<?php echo esc_url($link); ?>">
                                                    <?php echo wp_kses_post($btn_text); ?>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>

                    
                    
                </div>
            <?php if ( !empty($link) ) { ?>
                </a>
            <?php } ?>
        </div>
        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Hyori_Elementor_Banner );