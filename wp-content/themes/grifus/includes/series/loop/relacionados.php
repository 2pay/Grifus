<?php
$cat = get_the_category(); 
$cat = $cat[0]; 
$cat = $cat->cat_ID;
$post = get_the_ID();
$args = array('post_type' => 'tvshows', 'orderby' => 'rand', 'showposts' => get_option('nu-items-tv'),'post__not_in' => array($post));
$related = new WP_Query($args); 
if($related->have_posts()) {
while($related->have_posts()) : $related->the_post();
if (has_post_thumbnail()) {
$imgsrc = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
$imgsrc = $imgsrc[0];
} elseif ($postimages = get_children("post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=0")) {
foreach($postimages as $postimage) {
$imgsrc = wp_get_attachment_image_src($postimage->ID, 'full');
$imgsrc = $imgsrc[0];
}
} elseif (preg_match('/<img [^>]*src=["|\']([^"|\']+)/i', get_the_content(), $match) != FALSE) {
$imgsrc = $match[1];
} else {
if($img = series_get_meta('poster_url')){
$imgsrc = $img;
} else {
$img = get_template_directory_uri().'/images/noimg.png';
$imgsrc = $img;
} 
}?>
<div id="tv-<?php the_id(); ?>" class="tvitemrel">
<a href="<?php the_permalink() ?>">
<div class="imagetvrel"><img src="<?php echo $imgsrc; $imgsrc = ''; ?>" alt="<?php the_title(); ?>" /></div>
<div class="datatvrel">
<h4><?php the_title(); ?></h4>
<?php if($mostrar = $terms = strip_tags( $terms = get_the_term_list( $post->ID, 'tvyear'))) {  ?><span class="year"><?php echo $mostrar; ?></span><?php } ?>
<?php if($dato = series_get_meta("serie_vote_average")) { ?><span class="rating"><?php echo $dato; ?></span><?php } ?>
</div>
</a>
</div>
<?php endwhile; ?>
<?php } wp_reset_query(); ?>
