<div class="clear"></div>
<div id="newtabs" class="tabox ">
    <ul class="tabsnav">
        <li class="fea"><a href="#popular"> Popular </a></li>
		<li class="rec"><a href="#recent">  Recent  </a></li>
		<li class="pop"><a href="#tgs">     Tags    </a></li>
    </ul>
            
<div id="popular" class="tabsdiv">
<?php 
	$my_query = new WP_Query('orderby=comment_count&showposts=5');
	while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>
<div class="fblock">
<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo substr($post->post_title,0,20); ?></a></h3>
<p>  <?php the_content_rss('', TRUE, '', 10); ?> </p>
<div class="clear"></div>
</div>
<?php endwhile; ?>
</div>
			
<div id="recent" class="tabsdiv">

<?php 
	$my_query = new WP_Query('showposts=5');
	while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>
<div class="fblock">
<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo substr($post->post_title,0,20); ?></a></h3>
<p>  <?php the_content_rss('', TRUE, '', 10); ?> </p>
<div class="clear"></div>
</div>
<?php endwhile; ?>

</div>

 <div id="tgs" class="tabsdiv">
 
<div class="tagsbox"><?php wp_tag_cloud('smallest=8&largest=22'); ?></div>

</div>
</div>