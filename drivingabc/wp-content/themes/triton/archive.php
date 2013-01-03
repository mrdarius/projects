<?php get_header(); ?>
<div id="content" >

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>
		
<div class="box <?php if (++$counter % 2 == 0) { echo "altbox"; }?>" id="post-<?php the_ID(); ?>">

<div class="boxtitle">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>

<div class="entry">
<a href="<?php the_permalink() ?>">
<?php trit_post_image() ?>
</a>
	<?php the_excerpt(); ?> 
<div class="clear"></div>
</div>
<div class="comm rounded" ><?php comments_popup_link('0 Comment', '1 Comment', '% Comments'); ?></div>
<div class="morer rounded" ><a href="<?php the_permalink() ?>"> Read Full Post </a></div>
<div class="clear"></div

</div>
<?php endwhile; ?>

 <div id="navigation">
<?php
if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
?>
</div>

<?php else : ?>

		<h1 class="title">Not Found</h1>
		<p>Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>