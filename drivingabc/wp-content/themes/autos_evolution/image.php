<?php get_header(); ?>

	<div id="content" class="widescreen">
    <div class="topimg"></div>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">
			
			<div class="entry">
				<p class="attachment"><a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'large' ); ?></a></p>
                <?php wp_get_attachment_metadata(116); ?>
                <h1 style="text-align:center;color:#660000"><?php the_title(); ?></h1><br/>
                <div class="caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt(); // this is the "caption" ?></div>

				<?php the_content('<p class="serif">Read the story &raquo;</p>'); ?>

				<div class="navigation">
					<div class="alignleft"><?php previous_image_link();?><br/></div>
                    <div class="imagetitle"><h2>See Others... </h2>
                    <table class="gallery-caption">
<tbody>
<tr>
<th width="100" valign="top">Gallery Name : </th>
<td>
<a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a>
</td>
</tr>
</tbody>
</table>
                    </div>
                    <div class="alignright"><?php next_image_link() ?></div>
				</div>

				<div class="clear" /></div>
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

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no attachments matched your criteria.</p>

<?php endif; ?>

	</div>
<?php get_footer(); ?>
