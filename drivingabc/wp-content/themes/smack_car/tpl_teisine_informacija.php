<?php
/**
 * Template Name: Teisine Informacija
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
get_header(); ?>

<div id="content">
	<div id="post">
	
			<div class="post-content">
			
				<h2 class="entry-title"><?php the_title(); ?></h2>
				
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="entry-image"><?php the_post_thumbnail(); ?></div>
				<?php } ?>
				
				<div class="entry-content">
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

					<?php endwhile; endif; ?>
					
				</div>
			
			</div>			
				
			<div class="post-posts">
			
				<?php query_posts('category_name=teisine-informacija&order=ASC');
					global $more;
					if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
						<div class="EkoHolder">
						
							<?php if (has_post_thumbnail()) : ?>
								<div class="EkoImage">
									<?php the_post_thumbnail();?>
								</div>
							<?php else : ?>
								<div class="EkoNoImage"></div>
							<?php endif; ?>
							
							<div class="EkoTitle">
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</div>
							
							<div class="EkoExcerpt">
								<?php the_excerpt();?>
							</div>
							
						</div>
							
					</div><!-- #post-## -->


				<?php endwhile; // end of the loop. ?>
			
			</div>
			
	</div><!-- #post-## -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>