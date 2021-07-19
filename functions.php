<?php

function aura_template_parts($slug, $args){
	do_action( 'aura_theme_template_part_before', $slug, $args );

	get_template_part( $slug, null, $args );

	do_action( 'aura_theme_template_part_after', $slug, $args );
}
