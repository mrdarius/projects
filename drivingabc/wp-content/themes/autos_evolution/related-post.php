<div class="post-content" id="related-post">

<?php
$this_post = $post;
$category = get_the_category(); $category = $category[0]; $category = $category->cat_ID;
$posts = get_posts('numberposts=5&offset=0&orderby=post_date&order=DESC&category='.$category);
$count = 0;
foreach ( $posts as $post ) {
if ( $post->ID == $this_post->ID || $count == 5) {
unset($posts[$count]);
}else{
$count ++;
}
}
?>

<?php if ( $posts ) : ?>

<h3>Related Post</h3>
<ul>
<?php function getWords($text, $limit) {
$array = explode(" ", $text, $limit +1);
if(count($array) > $limit) {
unset($array[$limit]);
}
return implode(" ", $array); }
?>
<?php foreach ( $posts as $post ) : ?>
<?php $mycontent = strip_tags($post->post_content);
$excerpt = getWords($mycontent, 5);
$a_title = $excerpt . "..."; ?>
<li><a href="<?php the_permalink(); ?>" title="<?php echo $a_title ?>">
<?php if ( get_the_title() ) { the_title(); } else { echo "Untitle"; } ?></a>
</li>
<?php endforeach // $posts as $post ?>
</ul>
<?php else : ?>
<h3>Related Post</h3>
<ul>
<li>Nothing found related with this post topic</li>
</ul>
<?php endif // $posts ?>
<?php
$post = $this_post;
unset($this_post);
?>

<div class="social">
<h3>Spread the word</h3>
<p class="digg"><a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" rel="nofollow">Digg this post</a></p>
<p class="delicious"><a href="http://del.icio.us/post?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" rel="nofollow">Bookmark to delicious</a></p>
<p class="stumble"><a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" rel="nofollow">Stumble the post</a></p>
<p class="technorati"><a href="http://technorati.com/faves?add=<?php the_permalink(); ?>" rel="nofollow">Add to your technorati favourite</a></p>
<p class="subfeed"><?php comments_rss_link('Subscribes to this post'); ?> </p>
</div>
</div>