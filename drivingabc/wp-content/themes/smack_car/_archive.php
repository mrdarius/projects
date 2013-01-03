<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

<div id="content">
	<div id="post">

		<?php if (have_posts()) : ?>

		<h2 class="pagetitle">&#34;<?php single_cat_title(); ?>&#34; kategorija</h2>

		<?php while (have_posts()) : the_post(); ?>
		<div <?php post_class() ?>>
				<div class="archive_post" style="border-bottom: 1px solid #f7941d;">
				
					<a href="<?php the_permalink(); ?>">
						<h4><?php the_title(); ?></h4>
					</a>
					
				</div>

		</div>

		<?php endwhile; ?>

	<?php else :

		echo "Kategorija tuščia.";

	endif;
?>

	</div>

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
