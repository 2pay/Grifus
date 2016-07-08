<div class="slider_box s_home">
<div class="head_slider">
<h3><?php _e('Content at random','mundothemes'); ?></h3>
<div class="controles">
<a class="prev btn"><b class="icon-angle-left"></b></a>
<a class="play btn"><b class="icon-playback-play"></b></a>
<a class="next btn"><b class="icon-angle-right"></b></a>
</div>
</div>
<div id="slider1" class="owl-carousel owl-theme">
<?php query_posts( array('post_type' => array('post','tvshows'), 'showposts' => $nitem, 'orderby' => 'rand' )); ?>
<?php while ( have_posts() ) : the_post(); ?>
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
$img = get_post_custom_values('poster_url');
$imgsrc = $img[0];
} ?>
<div class="item">
<div class="imagens">
<a href="<?php the_permalink() ?>"><img src="<?php echo $imgsrc; $imgsrc = ''; ?>" alt="<?php the_title(); ?>" width="100%" height="100%" /></a>
<?php if($values = get_post_custom_values("imdbRating")) { ?><span class="imdb"><b class="icon-star"></b> <?php echo $values[0]; ?></span><?php } ?>
<?php if($values = series_get_meta("serie_vote_average")) { ?><span class="imdb"><b class="icon-star"></b> <?php echo $values; ?></span><?php } ?>

</div>
<span class="ttps"><?php the_title(); ?></span>
<?php if($mostrar = $terms = strip_tags( $terms = get_the_term_list( $post->ID, 'tvyear'))) {  ?>
<span class="ytps"><?php echo $mostrar; ?></span>
<?php } ?>
<?php if($mostrar = $terms = strip_tags( $terms = get_the_term_list( $post->ID, $year_estreno ))) {  ?>
<span class="ytps"><?php echo $mostrar; ?></span>
<?php } ?>
</div>
<?php endwhile; wp_reset_query(); ?>
</div>
</div>