<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />


<!--<META NAME="description" CONTENT="Vairavimo abėcėlė - Vairavimo kursai Kalvariju g, Vairavimo pamokos Naugarduko g. Vilnius, Vairavimo mokykla, Vairavimo mokyklos Vilniuje, Papildomos vairavimo pamokos." />
<META NAME="keywords" CONTENT="vairavimo abėcėlė, vairavimo abc, vairavimas, vairavimo teorija, vairavimo pamokos." />-->

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<?php wp_head(); ?>
</head>
<body>
 	<div id="wrapper">
		<div id="header">
			<div id="header_holder">
				<a class="HeaderLogo" href="http://vairavimoabc.lt/"></a>
						<div id="search">
							<?php get_search_form(); ?>
						</div>	

			</div>
		</div>
						<div id="menu-header">
					  <?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary', 'menu' => 'Papildomos vairavimo pamokos' ) ); ?>
				</div>
		<div id="main">