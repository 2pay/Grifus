<?php get_header(); ?>
<?php get_template_part('includes/aviso'); ?>
<!-- Slider -->
<div class="box">
<div class="box_item">
<?php $estrenos = get_option('activar-estrenos'); if ($estrenos == "true") { ?>
<div id="slid01">
<?php include("includes/funciones/estrenos.php");  ?>
</div>
<?php } ?>
<div id="slid02">
<?php include("includes/funciones/random.php"); ?>
</div>
</div>
</div>
<?php $estrenos = get_option('activar-estrenos'); if ($estrenos == "true") { ?>
<div class="iteslid">
<ul class="idTabs">
<li><a href="#slid01" class="selected"><?php _e('Releases','mundothemes'); ?> <?php echo date ("Y"); ?></a></li>
<li><a href="#slid02" style="float:right;"><?php _e('Content at random','mundothemes'); ?></a></li>
</ul>
</div>
<?php } ?>
<?php $activar = get_option('news_home'); if ($activar == "true") { ?>
<!-- noticias -->
<div class="news_home">
<?php $activar_ads = get_option('activar-anuncio-300-250'); if ($activar_ads == "true") { ?>
<div class="ads">
<?php $ads = get_option('anuncio-300-250'); if (!empty($ads)) echo stripslashes(get_option('anuncio-300-250')); ?>
</div>
<?php } ?>
<div class="noticias">
<ul class="scrolling">
<?php $args = array( 'post_type' => 'noticias', 'showposts' => '10','orderby' => 'modified');$my_query = new WP_Query($args); ?>
<?php while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID; $IDPost = get_the_ID(); ?>
<li>
<div class="new">
<div class="fecha">
<div class="dia"><?php the_time('d') ?></div>
<div class="mes"><?php the_time('F') ?></div>
</div>
<div class="noti">
<div class="titulo"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></div>
<div class="contenido"><p><?php cg_content('',TRUE,'',20); ?></p></div>
</div>
</div>
</li>
<?php endwhile; ?>
</ul>
</div>
</div>
<?php } ?>
<!-- contenido -->
<div class="box">
<div class="header">
<?php 
/* sub-menu */
function_exists('wp_nav_menu') && has_nav_menu('menu_subheader' );
wp_nav_menu( array( 'theme_location' => 'menu_subheader', 'container' => '',  'menu_class' => '') );
?>
</div>
<div class="box_item">
<div class="peliculas">
<div id="revel" class="skl">
<?php slk(); ?>
</div>
<h1><?php _e('Content recently added', 'mundothemes'); ?></h1>
<?php $activar_ads = get_option('activar-anuncio-728-90'); if ($activar_ads == "true") { ?>
<div class="ads_728">
<?php $ads = get_option('anuncio-728-90'); if (!empty($ads)) echo stripslashes(get_option('anuncio-728-90')); ?>
</div>
<?php } ?>
<!-- ************PELICULAS*************** -->
<div class="<?php $dato = get_option('item_home'); echo stripslashes ($dato); ?> items">
<?php
$active = get_option('tvmodule'); if ($active == "true") {
if( is_home() ){
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts( array('post_type'=>array('post','tvshows'),'paged'=>$paged ) ); } } ?>
<?php  if (have_posts()) : ?>
<?php post_movies_true(); ?>
<?php while (have_posts()) : the_post(); 
if(get_option('edd_sample_theme_license_key')) { ?>
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
if($item = get_option('item_home')) {
include 'includes/home/'.$item.'.php'; 
} else {
include 'includes/home/item_1.php';
}
?>
<?php } endwhile; ?>						
<?php else : ?>
<div class="no_contenido_home"><?php _e('No content available', 'mundothemes'); ?></div>
<?php endif; wp_reset_query(); ?>
<!-- **************************** -->
<?php $activar = get_option('activar-scroll'); if ($activar == "true") { ?>
<div class="nav-previous alignleft"><?php next_posts_link( '' ); ?></div>
<div class="nav-next alignright"><?php previous_posts_link( '' ); ?></div>
<?php } else { ?>
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
<?php $active = get_option('widget_home'); if ($active == "true") {  dynamic_sidebar( 'Home' );  } else { ?>
<div id="fixer">
<?php get_template_part('loop/sidebar-home'); ?>
</div>
<?php } ?>
</div>
</div>
</div>
<!-- Contenido -->
<?php  get_footer(); ?>