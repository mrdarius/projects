<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

/*
Template Name: Links
*/
?>

<?php get_header(); ?>

<div id="content">
	<div id="post">

<h1>Links:</h1>
<ul>
<?php wp_list_bookmarks(); ?>
</ul>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
