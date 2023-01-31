<?php

function hyori_child_enqueue_styles() {
	wp_enqueue_style( 'hyori-child-style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'hyori_child_enqueue_styles', 100 );