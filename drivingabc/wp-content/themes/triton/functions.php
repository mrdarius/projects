<?php
include 'theme_options.php';
include 'guide.php';

if ( function_exists('register_sidebar') )
	register_sidebar(array(
	'name' => 'Sidebar',
    'before_widget' => '<li id="%1$s" class="sidebox %2$s">',
    'after_widget' => '</li>',
	'before_title' => '<h3 class="sidetitl">',
    'after_title' => '</h3>',
    ));

register_sidebar(array(
	'name' => 'Footer',
    'before_widget' => '<li id="%1$s" class="botwid %2$s">',
    'after_widget' => '</li>',
	'before_title' => '<h3 class="bothead">',
    'after_title' => '</h3>',
    ));		
	
register_nav_menus( array(
		'primary' => __( 'Primary Navigation', '' ),
		'secondary' => __( 'Secondary Navigation', '' ),
	) );	
	
function new_excerpt_length($length) {
	return 50;
}
add_filter('excerpt_length', 'new_excerpt_length');

function new_excerpt_more($more) {
return '<a href="'. get_permalink($post->ID) . '">' . '&nbsp;&nbsp;[ Read More ]' . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'trit_post', 200, 150, true );
	add_image_size( 'trit_slide', 960, 280, true );
	add_image_size( 'trit_thumb', 80, 60, true );	
}

function trit_post_image(){
if ( has_post_thumbnail() ) {
	 the_post_thumbnail( 'trit_post', array('class' => 'postimg') );
} else {
?>
<img class="postimg" src="<?php bloginfo('template_directory'); ?>/images/dummy.png" alt="" />
<?php
};
}

function trit_slide_image(){
if ( has_post_thumbnail() ) {
	 the_post_thumbnail( 'trit_slide', array('class' => 'sidim') );
} else {
?>

<?php
};
}

function trit_thumb_image(){
if ( has_post_thumbnail() ) {
	 the_post_thumbnail( 'trit_thumb', array('class' => 'phumb') );
} else {
?>
<img class="phumb" src="<?php bloginfo('template_directory'); ?>/images/dummy.png" alt="" />
<?php
};
}
	
?>