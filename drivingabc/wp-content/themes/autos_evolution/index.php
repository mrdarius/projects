<?php get_header(); ?>
<?php include (TEMPLATEPATH . '/sidebarleft.php'); ?>
	<div id="content" class="narrowcolumn">
    <div class="topimg"></div>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
        
			<div class="post" id="post-<?php the_ID(); ?>">
                <div class="post-date">
<span class="post-month"><?php the_time('M') ?></span>
<span class="post-day"><?php the_time('d') ?></span>
</div>

				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                
				

				<div class="entry">
					<?php the_content("Read the story &rarr;"); ?>           
				</div>
                
				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> <small>Post by <strong><?php the_author() ?></strong> </small> in <?php the_category(', ') ?> | <?php edit_post_link('<img src="'.get_bloginfo(template_directory).'/images/post_edit.gif" alt="Edit Post" />', '', ' | '); ?>  <?php comments_popup_link('No Comments <img src="'.get_bloginfo(template_directory).'/images/comment.gif" alt="comment"/>', '1 Comment <img src="'.get_bloginfo(template_directory).'/images/comment.gif" alt="comment"/>', '% Comments <img src="'.get_bloginfo(template_directory).'/images/comment.gif" alt="comment"/>'); ?></p>
			</div>
            

            
		<?php endwhile; ?>
 		<?php else : ?>
		<h2 class="center">Not Found</h2>
			<p class="center">Sorry, but you are looking for something that isn't here.</p>
			<?php include (TEMPLATEPATH . "/searchform.php"); ?>
		<?php endif; ?>
    			<div class="navigation">
			<div class="alignleft"><?php next_posts_link('<img src="'.get_bloginfo(template_directory).'/images/left.png" alt="Older Entries" /> Older Entries') ?></div>
				<div class="alignright"><?php previous_posts_link('Newer Entries <img src="'.get_bloginfo(template_directory).'/images/right.png" alt=right"Newer Entries" />') ?></div>
			</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>