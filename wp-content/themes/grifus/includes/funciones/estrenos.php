<?php if($cat = get_option('estrenos_cat')) { ?>
<div class="slider_box s_home">
<div class="head_slider">
<h3><?php _e('New releases','mundothemes'); ?></h3>
<div class="controles">
<a class="prev2 btn"><b class="icon-angle-left"></b></a>
<a class="play2 btn"><b class="icon-playback-play"></b></a>
<a class="next2 btn"><b class="icon-angle-right"></b></a>
</div>
</div>
<div id="slider2" class="owl-carousel owl-theme">
<?php $rand_posts = get_posts('numberposts=40&cat='.$cat.'&orderby=DESC'); foreach( $rand_posts as $post ) : ?>
<?php   if (has_post_thumbnail()) {
$imgsrc = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'medium');
$imgsrc = $imgsrc[0];
} elseif ($postimages = get_children("post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=0")) {
foreach($postimages as $postimage) {
$imgsrc = wp_get_attachment_image_src($postimage->ID, 'medium');
$imgsrc = $imgsrc[0];
}
} elseif (preg_match('/<img [^>]*src=["|\']([^"|\']+)/i', get_the_content(), $match) != FALSE) {
$imgsrc = $match[1];
} else {
if($img = get_post_custom_values('poster_url')){
$imgsrc = $img[0];
} else {
$img = get_template_directory_uri().'/images/noimg.png';
$imgsrc = $img;
} 
}
?>
<div class="item">
<div class="imagens">
<a href="<?php the_permalink() ?>"><img src="<?php echo $imgsrc; $imgsrc = ''; ?>" alt="<?php the_title(); ?>" width="100%" height="100%" /></a>
<?php if($values = get_post_custom_values("imdbRating")) { ?><span class="imdb"><b><b class="icon-star"></b></b> <?php echo $values[0]; ?></span><?php } ?>
</div>
<span class="ttps"><?php the_title(); ?></span>
<?php if($mostrar = $terms = strip_tags( $terms = get_the_term_list( $post->ID, $year_estreno ))) {  ?>
<span class="ytps"><?php echo $mostrar; ?></span>
<?php } ?>
</div>
<?php endforeach; ?>
</div>
</div>
<?php } else { ?>
<div class="slider_box s_home">
<div class="head_slider">
<h3><?php _e('New releases','mundothemes'); ?> (<?php echo date ("Y"); ?>) </h3>
<div class="controles">
<a class="prev2 btn"><b class="icon-angle-left"></b></a>
<a class="play2 btn"><b class="icon-playback-play"></b></a>
<a class="next2 btn"><b class="icon-angle-right"></b></a>
</div>
</div>
<div id="slider2" class="owl-carousel owl-theme">
<?php $year = date ("Y"); query_posts(array(get_option('year') => $year, 'showposts' => $nitem)); ?>
<?php while (have_posts()) : the_post(); ?>
<?php   if (has_post_thumbnail()) {
$imgsrc = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'medium');
$imgsrc = $imgsrc[0];
} elseif ($postimages = get_children("post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=0")) {
foreach($postimages as $postimage) {
$imgsrc = wp_get_attachment_image_src($postimage->ID, 'medium');
$imgsrc = $imgsrc[0];
}
} elseif (preg_match('/<img [^>]*src=["|\']([^"|\']+)/i', get_the_content(), $match) != FALSE) {
$imgsrc = $match[1];
} else {
if($img = get_post_custom_values('poster_url')){
$imgsrc = $img[0];
} else {
$img = get_template_directory_uri().'/images/noimg.png';
$imgsrc = $img;
} 
}
?>
<div class="item">
<div class="imagens">
<a href="<?php the_permalink() ?>"><img src="<?php echo $imgsrc; $imgsrc = ''; ?>" alt="<?php the_title(); ?>" width="100%" height="100%" /></a>
<?php if($values = get_post_custom_values("imdbRating")) { ?><span class="imdb"><b><b class="icon-star"></b></b> <?php echo $values[0]; ?></span><?php } ?>
</div>
<span class="ttps"><?php the_title(); ?></span>
<?php if($mostrar = $terms = strip_tags( $terms = get_the_term_list( $post->ID, $year_estreno ))) {  ?>
<span class="ytps"><?php echo $mostrar; ?></span>
<?php } ?>
</div>
<?php endwhile; ?>
</div>
</div>
<?php } ?>