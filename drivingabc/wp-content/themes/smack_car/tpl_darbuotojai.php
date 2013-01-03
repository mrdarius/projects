<?php
/**
 * Template Name: Darbuotojai
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
function date_lt($date) {
	$months_en = array('Sausis', 'Vasaris', 'Kovas', 'Balandis', 'Gegužė', 'Birželis', 'Liepa', 'Rugpjūtis', 'Rugsėjis', 'Spalis', 'Lapkritis', 'Gruodis');
	$months_lt = array('sausio', 'vasario', 'kovo', 'balandžio', 'gegužės', 'birželio', 'liepos', 'rugpjūčio', 'rugsėjo', 'spalio', 'lapkričio', 'gruodžio');
	return str_replace($months_en, $months_lt, $date);
}
get_header(); ?>

<div id="content">
	<div id="post">
	
				<h2 class="entry-title"><?php the_title(); ?></h2>
				<?php 
					query_posts('category_name=darbuotojai&order=ASC');

					if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>">
					
						<div class="darbuotojai-laikiklis">
							<a class="darbuotojai-blokas" href="<?php the_permalink(); ?>">
								<span class="darbuotojai-title"><?php the_title(); ?></span>
								<span class="darbuotojai-img"><?php echo get_the_post_thumbnail($post->ID); ?></span>
							</a>
						</div>
						
					</div><!-- #post-## -->


				<?php endwhile; // end of the loop. ?>
	</div><!-- #post-## -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>
