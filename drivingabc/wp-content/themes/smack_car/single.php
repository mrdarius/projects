<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

	<div id="content">
	<div id="post">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h2 class="entry-title"><?php the_title(); ?></h2>

			<div class="thumbnail">
				<?php the_post_thumbnail();?>
			</div>
			
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
			</div>
		</div>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

