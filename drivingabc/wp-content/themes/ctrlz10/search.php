<?php get_header(); ?>
<div id="content">
    <div id="main">

	<?php if (have_posts()) : ?>
								<div class="item entry">
									<h2 class="pagetitle">Search results for &#8216;<?php the_search_query(); ?>&#8217;</h2>
								</div> 
                <?php while (have_posts()) : the_post(); ?>
				<?php /*?>item<?php */?> 
				<div class="item entry" id="post-<?php the_ID(); ?>">
				          <div class="itemhead">
				            <h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
				            <div class="chronodata">Posted <?php the_time('F jS, Y') ?> by <?php the_author() ?></div>
				          </div>
						  <div class="storycontent">
                                <?php the_excerpt(); ?>
						  </div>
				          <div class="metadata">
							 <div class="category">  
                             Tagged and categorized as: <?php if (the_category(', '))  the_category(); ?> 
                             <?php if ( function_exists('wp_tag_cloud') ) : ?>
                             <?php the_tags(', ', ', ', ''); ?>
							 <?php endif; ?>
							 <? if(!is_single()) echo "|"; ?> 
							 <?php edit_post_link('Edit', '', ' | '); ?> 
							 <?php comments_popup_link('Comment (0)', ' Comment (1)', 'Comments (%)'); ?>
                             <?php if( pings_open() ) : ?>
                              | <a href="<?php trackback_url() ?>" rel="trackback" title="Uniform Resource Identifier">TrackBack 
                             	URI</a><?php endif; ?>                             
							 </div>
						  </div>
				 </div>
				 <?php /*?>end item<?php */?> 
 
<?php comments_template(); // Get wp-comments.php template ?>
 
                <?php endwhile; ?>
 
                <div class="navigation">
                        <div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
                        <div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
                </div>
 
        <?php else : ?>
 			<div class="item entry">
                <h2 class="pagetitle">No search results</h2>
                <p class="center">We did not find any posts containing the string &#8216;<?php the_search_query(); ?>&#8217;.</p>
			</div>
 
	<?php endif; ?>

	</div>
	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div>
	    
  </div>
<?php get_footer(); ?>