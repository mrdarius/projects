<?php
include 'theme_options.php';
include 'guide.php';

if ( function_exists('register_sidebar') )
	register_sidebar(array(
	'name' => 'Sidebar',
    'before_widget' => '<div class="sidebox ">',
    'after_widget' => '</div>',
	'before_title' => '<h3 class="sidetitl">',
    'after_title' => '</h3>',
	
    ));


register_sidebar(array(
	'name' => 'Footer',
    'before_widget' => '<div class="botwid">',
    'after_widget' => '</div>',
	'before_title' => '<h3 class="bothead">',
    'after_title' => '</h3>',
    ));		
	
	
register_nav_menus( array(
		'primary' => __( 'Primary Navigation', '' ),
	
	) );

function fallbackmenu1(){ ?>
			<div id="menu">
				<ul><li> Go to Adminpanel > Appearance > Menus to create your menu. You should have WP 3.0+ version for custom menus to work.</li></ul>
			</div>
<?php }	
	
function new_excerpt_length($length) {
	return 70;
}
add_filter('excerpt_length', 'new_excerpt_length');

function new_excerpt_more($more) {
return '<a href="'. get_permalink($post->ID) . '">' . '&nbsp;&nbsp;[ Read More ]' . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'vulc_post', 190, 160, true );
	add_image_size( 'vulc_slide', 570, 300, true ); 

}

function vulc_post_image(){
if ( has_post_thumbnail() ) {
	 the_post_thumbnail( 'vulc_post', array('class' => 'postimg') );
} else {
?>
<img class="postimg" src="<?php bloginfo('template_directory'); ?>/images/dummy.png"  />
<?php
};
}

function vulc_slide_image(){
if ( has_post_thumbnail() ) {
	 the_post_thumbnail( 'vulc_slide', array('class' => 'slimg') );
} else { 
?>
<img class="slimg" src="<?php bloginfo('template_directory'); ?>/images/dummy2.png"  />
<?php
};
}

function getpagenavi(){
?>
<div id="navigation">
<?php if(function_exists('wp_pagenavi')) : ?>
<?php wp_pagenavi() ?>
<?php else : ?>
        <div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries','arclite')) ?></div>
        <div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;','arclite')) ?></div>
        <div class="clear"></div>
<?php endif; ?>

</div>

<?php
}
		
?>