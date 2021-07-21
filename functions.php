<?php

function aura_template_parts($slug, $args){
	$args = apply_filters( 'aura_theme_template_part_tag', $args, $slug );

	do_action( 'aura_theme_template_part_before', $slug, $args );

	get_template_part( $slug, null, $args );

	do_action( 'aura_theme_template_part_after', $slug, $args );
}



add_filter( 'aura_theme_template_part_tag', 'my_filter', 10, 2);

function my_filter( $args, $slug ){
	if ( $slug === 'template-parts/main' && is_singular( [ 'post', 'page'] )) {
		$args['text'] = 'pawan';
	}
		return $args;
}
