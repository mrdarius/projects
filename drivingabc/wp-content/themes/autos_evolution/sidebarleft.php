	<div id="leftside">

  

    	<div id="searchsubmit">
    		
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	    </div>

    <div class="sidebar_l">
		<ul>
			<?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar') ) : ?>
			

		
           <li><h2>Recent Post</h2>
							<?php query_posts('showposts=5'); ?>
								<ul>
									<?php while (have_posts()) : the_post(); ?>
								<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
									<?php endwhile;?>
								</ul>
                         </li>

<li><h2>Recent Comments</h2>
					<?php
global $wpdb;
$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
comment_post_ID, comment_author, comment_date_gmt, comment_approved,
comment_type,comment_author_url,
SUBSTRING(comment_content,1,30) AS com_excerpt
FROM $wpdb->comments
LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
$wpdb->posts.ID)
WHERE comment_approved = '1' AND comment_type = '' AND
post_password = ''
ORDER BY comment_date_gmt DESC
LIMIT 10";
$comments = $wpdb->get_results($sql);
$output = $pre_HTML;
$output .= "\n<ul>";
foreach ($comments as $comment) {
$output .= "\n<li>".strip_tags($comment->comment_author)
.":" . "<a href=\"" . get_permalink($comment->ID) .
"#comment-" . $comment->comment_ID . "\" title=\"on " .
$comment->post_title . "\">" . strip_tags($comment->com_excerpt)
."</a></li>";
}
$output .= "\n</ul>";
$output .= $post_HTML;
echo $output;?></li>

	
								<?php wp_list_pages('title_li=<h2>' . __('Pages') . '</h2>'); ?> 
					
       
			<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
				

				
			<?php } ?>

			<?php endif; ?>
		</ul>
	</div>
    <div class="clear"></div>
    <div class="ads">
   <h2>Sponsored</h2>
    <img src="<?php bloginfo('template_url'); ?>/images/ads.jpg" alt="ads"/>
   
    </div>
</div>
