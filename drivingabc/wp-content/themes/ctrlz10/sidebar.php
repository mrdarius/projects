	 <div id="menu">
             
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('rightsidebar') ) : ?>
			<h4>Pages</h4>
			<ul><li><a href="<?php echo get_option('home'); ?>">Home</a></li><?php wp_list_pages('title_li='); ?></ul>
			<h4>Categories</h4>
			<ul>
			<?php wp_list_categories('title_li='); ?>
			</ul>
			<br />
			<?php if ( function_exists('wp_tag_cloud') ) : ?>
			 <?php /*?>available in wp 2.3<?php */?> 

			</p>
			<?php endif; ?>
			<h4><?php _e('Search'); ?></h4>
			<form id="searchform" method="get" action="<?php bloginfo('home'); ?>">
			<input type="text" name="s" id="s" value="" size="13" /><input type="submit" id="searchsubmit" name="search" value="Search" />
			</form>
			<h4>Archives</h4>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>

	<?php endif; ?>

			<h4>Meta</h4>
			<ul>
				<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
				<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
				<li><a href="http://wordpressthemesbase.com">Most Popular Wordpress Themes</a></li>
				<?php wp_meta(); ?>	
			</ul>

	</div>
