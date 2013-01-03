<?php get_header(); ?>

<div id="content">

<?php if (is_front_page()) { ?>
<?php include (TEMPLATEPATH . '/slide.php'); ?>	
<?php } ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">

<div class="postim">
<a href="<?php the_permalink() ?>">
<?php vulc_post_image()?>
</a>
</div>

<div class="cover">

<div class="title">
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
	<div class="postmeta">
	<div class="metablock comm"><?php comments_popup_link('0 Comment', '1 Comment', '% Comments'); ?></div>			
	<div class="metablock clock">  <?php the_time('M - j - Y'); ?></div>
	<div class="metablock author"><?php the_author(); ?></div> 
	</div>	
</div>

<div class="entry">
	<?php the_excerpt(); ?> 
	<div class="clear"></div>
</div>

</div>	
<div class="readmore">
	<span class="read"><a href="<?php the_permalink() ?>"> Continue </a></span>
</div>


</div>

<?php endwhile; ?>
<div class="clear"></div>
<?php getpagenavi(); ?>

<?php else : ?>
		<h1 class="title">Not Found</h1>
		<p>Sorry, but you are looking for something that isn't here.</p>
<?php endif; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>