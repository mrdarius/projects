<?php
if ( function_exists('register_sidebar') ){
    register_sidebar(array(
        'name' => 'rightsidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}

function widget_mytheme_search() {
?> 
        <h4>Search this site</h4>
        <div class="widget-move-over"><form method="get" id="searchform" action="<?php bloginfo('home'); ?>/"><input type="text" value="<?php the_search_query(); ?>" name="s" id="s" /> <input type="submit" id="searchsubmit" value="Search" /></form></div>
<?php 
} 

function widget_mytheme_tags() {
?> 

        <h4>Popular Tags</h4>
        <div class="taggage">
        <?php wp_tag_cloud('smallest=8&largest=16'); ?>
        </div>

<?php 
} 
//GsL98DGtpo0W
function widget_mytheme_pages() {
?> 
		<h4>Pages</h4>
        <ul><li><a href="<?php echo get_option('home'); ?>/">Home</a></li><?php wp_list_pages('title_li='); ?></ul>
<?php 
} 
if ( function_exists('register_sidebar_widget') ) 
	register_sidebar_widget(__('Search'), 'widget_mytheme_search');
	register_sidebar_widget(__('tag_cloud'), 'widget_mytheme_tags');
	register_sidebar_widget(__('Pages'), 'widget_mytheme_pages');


 