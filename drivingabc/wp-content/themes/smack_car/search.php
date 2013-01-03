<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>
<div id="content">
	<div id="post">

	<?php if (have_posts()) : ?>

		<h2 class="entry-title">Paieškos rezultatai:</h2>

	 

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> style="border-bottom:2px solid #FF7100; padding-bottom:5px; margin-bottom:10px;">
			
				<h3 id="post-<?php the_ID(); ?>">
					<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
				</h3>
				
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
			
			</div>

		<?php endwhile; ?>
 

	<?php else : ?>

		<h3 class="center">Nieko nerasta, bandykite kitus raktažodžius.</h3>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
