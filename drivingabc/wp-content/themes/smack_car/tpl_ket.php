<?php
/**
 * Template Name: KET
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

<div id="content">
	<div id="post">
	
				<h2 class="entry-title"><?php the_title(); ?></h2>
				<?php 
					query_posts('category_name=keliu-eismo-taisykles&order=ASC');
					global $more;
					if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>						
					
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>

					</div><!-- #post-## -->


				<?php endwhile; // end of the loop. ?>
	</div><!-- #post-## -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>
