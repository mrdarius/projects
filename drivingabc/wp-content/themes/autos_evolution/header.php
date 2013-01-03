<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script src="<?php bloginfo('template_url'); ?>/javascript/tabber.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascript/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascript/jquery.innerfade.js"></script>
		<script type="text/javascript">
	   $(document).ready(
				function(){
					$('ul#portfolio').innerfade({
						speed: 1000,
						timeout: 5000,
						type: 'sequence',
						containerheight: '220px'
					});
					
				});
  	</script>
<?php wp_head(); ?>
</head>
<body>
<div id="page">
	<div id="box">
		<div id="header">
			<div id="headerimg">
		   		
			</div>      
             <div id="headerimg2">
             <h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<div class="description"><?php bloginfo('description'); ?></div>
        <div id="coolicon">
<a href="<?php echo get_option('home'); ?>/" title="Home"><img src="<?php bloginfo('template_url'); ?>/images/home.png" alt="Home"/></a>
           <a href="mailto:yourname@example.com" title="Contact"><img src="<?php bloginfo('template_url'); ?>/images/mail.png" alt="Contact"/></a>
                  <a href="<?php bloginfo('rss2_url'); ?>" title="RSS"><img src="<?php bloginfo('template_url'); ?>/images/rss.png" alt="RSS"/></a></div>
             </div>
             
		</div>

<hr />
