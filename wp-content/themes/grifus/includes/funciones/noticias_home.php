<div id="noticias">
<h1><A HREF="<?php bloginfo('url'); ?>/<?php _e('news','mundothemes'); ?>/"><?php _e('News','mundothemes'); ?></A></h1>
<?php $args = array( 'post_type' => 'noticias', 'showposts' => '5','orderby' => 'modified');$my_query = new WP_Query($args); ?>
<?php while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID; $IDPost = get_the_ID(); ?>
<?php   if (has_post_thumbnail()) {
$imgsrc = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'noticias');
$imgsrc = $imgsrc[0];
} elseif ($postimages = get_children("post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=0")) {
foreach($postimages as $postimage) {
$imgsrc = wp_get_attachment_image_src($postimage->ID, 'noticias');
$imgsrc = $imgsrc[0];
}
} elseif (preg_match('/<img [^>]*src=["|\']([^"|\']+)/i', get_the_content(), $match) != FALSE) {
$imgsrc = $match[1];
} else {
$imgsrc = get_template_directory_uri() . '/images/index_noimagen.png';
} ?>
<div class="item">
<div class="imagen">
<a href="<?php the_permalink() ?>"><img src="<?php echo $imgsrc; $imgsrc = ''; ?>" alt="<?php the_title(); ?>" /></a>
<span class="notita"><?php _e('News', 'mundothemes'); ?></span>
</div>
<div class="datos">
<h2><A href="<?php the_permalink() ?>"><?php the_title(); ?></A></h2>
<span><?php echo get_the_date(); ?></span>
<p><?php cg_content('',TRUE,'',30); ?>...</p>
</div>
</div>
<?php endwhile; ?>
</div>