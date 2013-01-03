<div class="right">
<div class='feedlist'>

<ul>

	<li class="getshort"><a href="<?php bloginfo('rss2_url'); ?>" ><img src="<?php bloginfo('stylesheet_directory'); ?>/images/rss.png" title="subscribe" alt="RSS"/></a></li>
	<li class="getshort"><a href="http://del.icio.us/post?url=<?php bloginfo('siteurl');?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/delicious.png" title="Delicious" alt="Delicious"/></a> </li>
	<li class="getshort"><a href="http://www.digg.com/submit?phase=2&amp;url=<?php bloginfo('siteurl');?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/digg.png" title="Digg" alt="Digg"/></a></li>
	<li class="getshort"><a href="<?php $face = get_option('trit_face'); echo ($face); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/facebook.png" title="Facebook" alt="Facebook"/></a></li> 
	<li class="getshort"><a href="http://twitter.com/<?php $twit = get_option('trit_twit'); echo ($twit); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/twitter.png" title="Twitter" alt="Twitter"/></a></li> 
	<li class="getshort"><a href="<?php $linkd = get_option('trit_linkd'); echo ($linkd); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/linkedin.png" title="Linkedin" alt="Linkedin"/></a></li> 
	<li class="getshort"><a href="<?php $yout = get_option('trit_yout'); echo ($yout); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/youtube.png" title="Youtube" alt="Youtube"/></a></li> 
</ul>

</div>
 <div class="sidebox">
<h3 class="sidetitl"> Popular Posts </h3>	
<div class="featlist">
<?php 
	$my_query = new WP_Query('orderby=comment_count&showposts=5');
	while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>
<div class="fblock">

<a href="<?php the_permalink() ?>">	<?php trit_thumb_image();?></a>
<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo substr($post->post_title,0,20); ?></a></h3>
<p>  <?php the_content_rss('', TRUE, '', 10); ?> </p>

</div>
<?php endwhile; ?>
</div>
</div>	

 <div class="sidebox">
<h3 class="sidetitl">Twitter updates</h3>
<?php
$twit = get_option('trit_twit'); 
include('twitter.php');?>
<?php if(function_exists('twitter_messages')) : ?>
       <?php twitter_messages("$twit") ?>
       <?php endif; ?>
</div> 


<?php include (TEMPLATEPATH . '/sponsors.php'); ?>	

<div class="sidebar">
<ul>
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar') ) : else : ?>
	<?php endif; ?>
</ul>
</div>

</div>