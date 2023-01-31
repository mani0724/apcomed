<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Hyori_Elementor_Revslider extends Elementor\Widget_Base {

	public function get_name() {
        return 'hyori_revslider';
    }

	public function get_title() {
        return esc_html__( 'Goal Slider Revolution', 'hyori' );
    }
    
	public function get_categories() {
        return [ 'hyori-elements' ];
    }

	protected function register_controls() {
        $revsliders = array();

        $slider = new RevSlider();
        $arrSliders = $slider->getArrSliders();

        
        if ( $arrSliders ) {
            foreach ( $arrSliders as $slider ) {
                $revsliders[ $slider->getAlias() ] = $slider->getTitle();
            }
        } else {
            $revsliders[ 0 ] = esc_html__( 'No sliders found', 'hyori' );
        }
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Revslider', 'hyori' ),
                'tab' => Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'alias',
            [
                'label' => esc_html__( 'Revolution Slider', 'hyori' ),
                'type' => Elementor\Controls_Manager::SELECT,
                'options' => $revsliders,
                'description' => esc_html__( 'Select your Revolution Slider.', 'hyori' ),
            ]
        );
   		$this->add_control(
            'el_class',
            [
                'label'         => esc_html__( 'Extra class name', 'hyori' ),
                'type'          => Elementor\Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'hyori' ),
            ]
        );

        $this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings();

        extract( $settings );

        ?>
        <div class="widget-revslider <?php echo esc_attr($el_class); ?>">
            <?php echo apply_filters( 'vc_revslider_shortcode', do_shortcode( '[rev_slider ' . $alias . ']' ) ); ?>
        </div>
        <?php
    }
}

Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Hyori_Elementor_Revslider );