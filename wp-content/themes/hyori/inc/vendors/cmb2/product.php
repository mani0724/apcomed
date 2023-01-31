<?php

if ( !function_exists( 'hyori_product_metaboxes' ) ) {
	function hyori_product_metaboxes(array $metaboxes) {
		$prefix = 'goal_product_';
	    $fields = array(
	    	array(
				'name' => esc_html__( 'Review Video', 'hyori' ),
				'id'   => $prefix.'review_video',
				'type' => 'text',
				'description' => esc_html__( 'You can enter a video youtube or vimeo', 'hyori' ),
			),
    	);
		
	    $metaboxes[$prefix . 'display_setting'] = array(
			'id'                        => $prefix . 'display_setting',
			'title'                     => esc_html__( 'More Information', 'hyori' ),
			'object_types'              => array( 'product' ),
			'context'                   => 'normal',
			'priority'                  => 'low',
			'show_names'                => true,
			'fields'                    => $fields
		);

	    return $metaboxes;
	}
}
add_filter( 'cmb2_meta_boxes', 'hyori_product_metaboxes' );
