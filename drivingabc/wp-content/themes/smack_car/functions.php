<?php
if ( function_exists('register_sidebar') )
    register_sidebar();
	
// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	
function twentyten_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'twentyten_excerpt_length' );
?>