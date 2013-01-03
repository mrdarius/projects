		<!-- Sidebar -->
		<div id="sidebar">


<div class="sidebar-box">


			
			<center>	<a href="<?php bloginfo('rss_url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/rss.gif" alt="RSS Feed" border="0"></a>

</center>
			
				</div>


<div class="sidebar-box">


				<h3>Streaming Video</h3>
			
			<center>	<img src="<?php bloginfo('template_directory'); ?>/images/banner2.gif" alt="Banner" width="275" height="275" /></center>
			
				</div>



			<div class="sidebar-box">
				<h3>Advertisements</h3>
				<div class="sidebar-ads">
					<div class="sidebar-ads-in"><img src="<?php bloginfo('template_directory'); ?>/images/ad-buu.gif" alt="Banner" width="125" height="125" /></div>
					<div class="sidebar-ads-in"><img src="<?php bloginfo('template_directory'); ?>/images/ad-g.gif" alt="Banner" width="125" height="125" /></div>
					<div class="sidebar-ads-in"><img src="<?php bloginfo('template_directory'); ?>/images/ad-n.gif" alt="Banner" width="125" height="125" /></div>
					<div class="sidebar-ads-in"><img src="<?php bloginfo('template_directory'); ?>/images/ad-e.gif" alt="Banner" width="125" height="125" /></div>

					<div class="clear"></div>
				</div>
			</div>
		
			<div class="sidebar-box">
				<h3>Pages</h3>
				<ul>
					<?php wp_list_pages('title_li='); ?>
				</ul>
			</div>
			
			<div class="sidebar-box">
				<h3>Categories</h3>
				<ul>
					<?php wp_list_categories('title_li='); ?>
				</ul>
			</div>
			
			<div class="sidebar-box">
				<h3>Archives</h3>
				<ul>
					<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</div>
			
			<div class="sidebar-box">
				<h3>Blog Roll</h3>
				<ul>
					<?php wp_list_bookmarks('categorize=0&title_li='); ?>
				</ul>
			</div>
			



			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : ?>
			
			<?php endif; ?>
		
		</div>
		<!-- Sidebar -->