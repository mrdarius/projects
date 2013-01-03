<?php get_header(); ?>

<div id="content" >

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div <?php post_class('post') ?> id="post-<?php the_ID(); ?>">
<div class="title">
<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
<div class="titlemeta">
		<span class="author"> Posted by <?php the_author(); ?> </span> <span class="clock"> <?php the_time('F - j - Y'); ?> </span> 
</div>
<div class="clear"></div>
</div>

<div class="entry">
<?php the_content('Read the rest of this entry &raquo;'); ?>
<?php include (TEMPLATEPATH . '/ad2.php'); ?>
<div class="clear"></div>
<?php wp_link_pages(array('before' => '<p><strong>Pages: </strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</div>

<div class="postmeta">
	<span class="categorys">Categories: <?php the_category(', '); ?> </span>
</div>

</div>

<?php comments_template(); ?>

<?php endwhile; else: ?>

		<h1 class="title">Not Found</h1>
		<p>I'm Sorry,  you are looking for something that is not here. Try a different search.</p>

<?php endif; ?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>