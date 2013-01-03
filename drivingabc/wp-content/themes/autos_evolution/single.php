<?php get_header(); ?>
	<div id="content" class="widecolumn">
    <div class="topimg"></div>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('<img src="'.get_bloginfo(template_directory).'/images/left.png" alt="Older Entries" /> %link') ?></div>
			<div class="alignright"><?php next_post_link('%link <img src="'.get_bloginfo(template_directory).'/images/right.png" alt=right"Newer Entries" />') ?></div>
		</div>
<div class="clear"></div>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

			<div class="entry">
<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>

				<p class="postmetadata alt">
					<small>
						Posted
						<?php ?>
						on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?> under <?php the_category(', ') ?>.

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							<a href="#respond">Leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							You can skip to the end and leave a response. Pinging is currently not allowed.

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Both comments and pings are currently closed.

						<?php } edit_post_link('<img src="'.get_bloginfo(template_directory).'/images/post_edit.gif" alt="Edit Post" />','','.'); ?>

					</small>
				</p>

			</div>
		</div>
<?php if(!is_page()) { ?>
<?php include (TEMPLATEPATH . '/related-post.php'); ?>
<?php } ?>
	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</div>
<?php include (TEMPLATEPATH . '/sidebarleft.php'); ?>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
