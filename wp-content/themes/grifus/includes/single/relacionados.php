<div class="slider_box" style="margin-bottom: 25px;">
<div class="head_slider">
<h3><?php _e('Related movies','mundothemes'); ?></h3>
<div class="controles">
<a class="prev btn"><b class="icon-angle-left"></b></a>
<a class="play btn"><b class="icon-playback-play"></b></a>
<a class="next btn"><b class="icon-angle-right"></b></a>
</div>
</div>
<div id="slider1" class="owl-carousel owl-theme">
<?php
 // Articulos Recomendados
$cat = get_the_category(); 
$cat = $cat[0]; 
$cat = $cat->cat_ID;
$post = get_the_ID();
$args = array('cat'=>$cat, 'orderby' => 'rand', 'showposts' => $nitem,'post__not_in' => array($post));
$related = new WP_Query($args); 
if($related->have_posts()) {
while($related->have_posts()) : $related->the_post();
if (has_post_thumbnail()) {
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
if($img = get_post_custom_values($imagefix)){
$imgsrc = $img[0];
} else {
$img = get_template_directory_uri().'/images/noimg.png';
$imgsrc = $img;
} 
} ?>
<div class="item">
<div class="imagens">
<a href="<?php the_permalink() ?>"><img src="<?php echo $imgsrc; $imgsrc = ''; ?>" alt="<?php the_title(); ?>" width="100%" height="100%" /></a>
<?php if($values = get_post_custom_values("imdbRating")) { ?><span class="imdb"><b><b class="icon-star"></b></b> <?php echo $values[0]; ?></span><?php } ?>
</div>
<span class="ttps"><?php the_title(); ?></span>
<?php if($mostrar = $terms = strip_tags( $terms = get_the_term_list( $post->ID, ''.$year_estreno.'' ))) {  ?>
<span class="ytps"><?php echo $mostrar; ?></span>
<?php } ?>
</div>
<?php endwhile; ?>

<?php } wp_reset_query(); ?>
</div>
</div>