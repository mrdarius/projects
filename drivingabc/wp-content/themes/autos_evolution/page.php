<?php get_header(); ?>

	<div id="content" class="widecolumn">
    <div class="topimg"></div>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2><br/>
			<div class="entry">
				<?php the_content('<p class="serif">Read the story &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
 <div class="clear"></div>
		</div>

		<?php endwhile; endif; ?>
	<?php edit_post_link('<img src="'.get_bloginfo(template_directory).'/images/post_edit.gif" alt="Edit Post" />', '<p>', '</p>'); ?>
	</div>
<?php include (TEMPLATEPATH . '/sidebarleft.php'); ?>
<?php get_sidebar(); ?>

<?php get_footer(); ?>