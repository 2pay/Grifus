<?php get_header(); ?>
<!-- contenido -->
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
<h1><?php printf( __( '%s', 'mundothemes' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
<?php if ( tag_description() ) : ?>
<span class="desc"><?php echo tag_description(); ?></span>
<?php endif; ?>
<?php $activar_ads = get_option('activar-anuncio-728-90'); if ($activar_ads == "true") { ?>
<div class="ads_728">
<?php $ads = get_option('anuncio-728-90'); if (!empty($ads)) echo stripslashes(get_option('anuncio-728-90')); ?>
</div>
<?php } ?>
<!-- ************PELICULAS*************** -->
<div class="<?php $dato = get_option('item_tax'); echo stripslashes ($dato); ?> items">
<?php  if (have_posts()) : ?>
<?php post_movies_true(); ?>
<?php while (have_posts()) : the_post(); 
if(get_option('edd_sample_theme_license_key')) {
?>
<?php  if (has_post_thumbnail()) {
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
<?php 
if($item = get_option('item_tax')) {
include 'includes/home/'.$item.'.php'; 
} else {
include 'includes/home/item_1.php';
}
?>
<?php } endwhile; ?>						
<?php else : ?>
<div class="no_contenido_home"><?php _e('No content available', 'mundothemes'); ?></div>
<?php endif; ?>
<!-- **************************** -->
<?php $activar_ads = get_option('activar-scroll'); if ($activar_ads == "true") { ?>
<div class="nav-previous alignleft"><?php next_posts_link( '' ); ?></div>
<div class="nav-next alignright"><?php previous_posts_link( '' ); ?></div>
<?php } ?>

<?php $activar_ads = get_option('activar-scroll'); if ($activar_ads == "true") {  } else { ?>
<div id="paginador">
<?php pagination($additional_loop->max_num_pages);?>
</div>
<div class="respo_pag">
<div class="pag_a"><?php previous_posts_link( __('Previous','mundothemes') ); ?></div>
<div class="pag_b"><?php next_posts_link( __('Next','mundothemes') ); ?></div>
</div>
<?php } ?>
</div>
</div>
<div class="lateral">
<?php $active = get_option('widget_tax'); if ($active == "true") {  dynamic_sidebar( 'Taxonomy' );  } else { ?>
<div id="fixer2">
<?php get_template_part('loop/sidebar-tvshows'); ?>
</div>
<?php } ?>
</div>
</div>
</div>

<!-- Contenido -->
<?php  get_footer(); ?>