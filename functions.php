<?php

// Added top bar.
add_action( 'aura_theme_template_part_before', 'add_section');
function add_section( $slug ){
	if( $slug === 'header/open' ){
			echo '<div style="background-color: #333; height: 75px;">before</div>';
		}

}

//Removed title from home page.
add_filter( 'aura_theme_template_part_status', 'remove_title', 10, 2);

function remove_title( $status, $slug ){
	if ( is_home() && $slug === 'content-header' ){
		$status = false;
	}
		return $status;
}


// Remove sticky bar from site
add_filter( 'aura_theme_template_part_status', 'remove_sticky', 10, 2);

function remove_sticky( $status, $slug ){
	if ( $slug === 'header/sticky' ){
		$status = false;
	}
		return $status;
}


// Change title in inner pages.
add_filter( 'aura_theme_template_part_args', 'change_title', 20, 2);
function change_title($args, $slug){
	if( $slug === 'content-header' && is_singular(['page', 'post'])){
		$args['title'] = 'Pawan';
	}

	return $args;
}


// Updated tga for post list.
add_filter( 'aura_theme_template_part_args', 'change_tag', 30, 2);
function change_tag( $args, $slug ){
	if( $slug === 'post/title'){
		if( $args['post_type'] === 'post' && $args[ 'layout'] === 'list'){
			$args['tag'] = 'h2';
		}
	}
	return $args;
}
