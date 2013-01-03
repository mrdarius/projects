<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

		<div id="sidebar">
			<div class="sidebar-element">
			<div class="sonas-post">
				<div class="sonas-laikiklis">
			
			<?php query_posts('category_name=sonas&order=ASC');

					if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					
								<h2><?php the_title(); ?></h2>
								<div class="sonas-img"><?php the_post_thumbnail(); ?></div>
								<div class="sonas-content"><?php the_content(); ?></div>

				<?php endwhile; // end of the loop. ?>
				</div>
			</div>
			</div>
			

<a target="_blank" href="http://www.hey.lt/details.php?id=vairavimoabc"><img width="88" height="31" border="0" src="http://www.hey.lt/count.php?id=vairavimoabc" alt="Hey.lt - Nemokamas lankytojų skaitliukas"></a>
