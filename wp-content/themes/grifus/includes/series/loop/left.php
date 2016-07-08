<?php 
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
} ?>
<div id="fixar">
<div class="imagen">
<img src="<?php echo $imgsrc; $imgsrc = ''; ?>" itemprop="image" alt="<?php the_title(); ?>" />
</div>
<?php if($dato = series_get_meta('original_name')) { ?><div class="meta-a"><p><?php echo $dato; ?></p></div><?php } ?>
<div class="meta-b">
<?php if($dato = series_get_meta('number_of_seasons')) { ?><span class="metx bccx"><i><?php echo $dato; ?></i> <?php _e('Seasons','mundothemes'); ?> </span><?php } ?>
<?php if($dato = series_get_meta('number_of_episodes')) { ?><span class="metx"><i><?php echo $dato; ?></i> <?php _e('Episodes','mundothemes'); ?> </span><?php } ?>
</div>

</div>