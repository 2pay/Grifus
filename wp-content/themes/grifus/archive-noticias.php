<?php get_header(); ?>
<div class="box">
<div class="header">
<?php 
/* sub-menu */
function_exists('wp_nav_menu') && has_nav_menu('menu_subheader' );
wp_nav_menu( array( 'theme_location' => 'menu_subheader', 'container' => '',  'menu_class' => '') );
?>
<div class="buscador">
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
<div class="imputo">
<input class="buscar" TYPE="text" placeholder="<?php _e('Search..', 'mundothemes'); ?>" name="s" id="s">
</div>
</form>
</div>
</div>
<div class="box_item">
<div class="peliculas">
<div id="revel2" class="skl">
<?php slk(); ?>
</div>
<h1><?php _e('News', 'mundothemes'); ?></h1>

<?php $activar_ads = get_option('activar-anuncio-728-90'); if ($activar_ads == "true") { ?>
<div class="ads_728">
<?php $ads = get_option('anuncio-728-90'); if (!empty($ads)) echo stripslashes(get_option('anuncio-728-90')); ?>
</div>
<?php } ?>
<div id="noticias">
<div class="items">
<?php  if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); 
if (has_post_thumbnail()) {
$imgsrc = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'newss');
$imgsrc = $imgsrc[0];
} elseif ($postimages = get_children("post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=0")) {
foreach($postimages as $postimage) {
$imgsrc = wp_get_attachment_image_src($postimage->ID, 'newss');
$imgsrc = $imgsrc[0];
}
} elseif (preg_match('/<img [^>]*src=["|\']([^"|\']+)/i', get_the_content(), $match) != FALSE) {
$imgsrc = $match[1];
} else {
$imgsrc = get_template_directory_uri() . '/images/no_news.png';
} 
?>
<div class="item">
<a href="<?php the_permalink() ?>">
<div class="img">
<img src="<?php echo $imgsrc; $imgsrc = ''; ?>" alt="<?php the_title(); ?>" width="100%" height="100%" />
<h3><span class="title"><?php the_title(); ?></span></h3>
</div>
</a>
<div class="dato"><?php _e('ago','mundothemes'); ?> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')); ?></div>
</div>
<?php endwhile; ?>	
<?php else : ?>
<div class="no_contenido_home"><?php _e('No content available', 'mundothemes'); ?></div>
<?php endif; ?>	
</div>
</div>
</div>
<div class="lateral">
<div id="fixer2">
<?php laterales(); ?>
</div>
</div>
</div>
</div>
<div id="paginador">
<?php pagination($additional_loop->max_num_pages);?>
</div>
<!-- Contenido -->
<?php  get_footer(); ?>