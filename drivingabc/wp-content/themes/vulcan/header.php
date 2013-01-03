<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>


<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php 
wp_enqueue_script('jquery');
wp_enqueue_script('cufon', get_stylesheet_directory_uri() . '/js/cufon.js');
wp_enqueue_script('effects', get_stylesheet_directory_uri() . '/js/effects.js');
wp_enqueue_script('Myriad', get_stylesheet_directory_uri() .'/js/Myriad_Pro_700.font.js');
wp_enqueue_script('s3Slider', get_stylesheet_directory_uri() .'/js/s3Slider.js');
wp_enqueue_script('jqueryui', get_stylesheet_directory_uri() .'/js/jquery-ui-personalized-1.5.2.packed.js');
wp_enqueue_script('sprinkle', get_stylesheet_directory_uri() .'/js/sprinkle.js');
?>

<script type="text/javascript"><!--//--><![CDATA[//><!--
sfHover = function() {
	if (!document.getElementsByTagName) return false;
	var sfEls1 = document.getElementById("menu").getElementsByTagName("li");
	for (var i=0; i<sfEls1.length; i++) {
		sfEls1[i].onmouseover=function() {
			this.className+=" sfhover";
		}
		sfEls1[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);
//--><!]]></script>

<?php wp_get_archives('type=monthly&format=link'); ?>
<?php //comments_popup_script(); // off by default ?>
<?php 
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
wp_head(); 
?>
</head>
<body>

<div class="masthead">
<div id="foxmenucontainer">
		<?php wp_nav_menu( array( 'container_id' => 'menu', 'theme_location' => 'primary','fallback_cb'=> 'fallbackmenu1' ) ); ?>	
</div>

<div id="top"> 
<div class="head">

<div class="blogname">
	<h1><a href="<?php bloginfo('siteurl');?>/" title="<?php bloginfo('name');?>"> <?php bloginfo('name');?></a></h1>
	<h2><?php bloginfo('description'); ?></h2>
</div>

<div class="twitbox">
<?php
$twit = get_option('vulc_twit'); 
include('twitter.php');?>
<?php if(function_exists('twitter_messages')) : ?>
   <p><?php twitter_messages("$twit") ?></p>
    <?php endif; ?>
</div> 

</div>
</div>

<div id="topbox">

<div class="facebox"><a href="<?php $face = get_option('vulc_face'); echo ($face); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/facebg.png" title="Facebook" alt="Facebook"/></a></div>
<div class="feedbox"><a href="<?php bloginfo('rss2_url'); ?>" ><img src="<?php bloginfo('stylesheet_directory'); ?>/images/feedbg.png" title="subscribe" alt="RSS"/></a></div>
<div class="sbox"><?php include (TEMPLATEPATH . '/searchform.php'); ?></div>

</div>
</div>

<div id="wrapper">
<div id="casing">		