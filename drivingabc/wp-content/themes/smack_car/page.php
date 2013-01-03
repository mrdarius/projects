<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

<div id="content">
	<div id="post">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<!--<h2 class="entry-title"><?php //the_title(); ?></h2>-->

			<div class="entry">

				<div class="slider-holder" style="margin-bottom:10px;">
					<h3>Paskutiniai įrašai:</h3>
					<?php if (function_exists('rps_show')) echo rps_show(); ?>
				</div>
				
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
