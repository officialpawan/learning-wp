<?php

function aura_template_parts($slug, $args){
	do_action( 'aura_theme_template_part_before', $slug, $args );

	$args['text'] = apply_filters( 'update_main', $slug, $args['text'] );

	get_template_part( $slug, null, $args );

	do_action( 'aura_theme_template_part_after', $slug, $args );
}



add_filter( 'update_main', 'my_filter', 10, 2);

function my_filter( $slug, $args ){
	if ( $slug === 'template-parts/main') {
		$args = 'pawan';
		return $args;
	}else{
		return $args;
	}
}
