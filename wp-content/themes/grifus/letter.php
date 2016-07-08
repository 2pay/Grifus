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
<h1>Letter T</h1>
<?php $activar_ads = get_option('activar-anuncio-728-90'); if ($activar_ads == "true") { ?>
<div class="ads_728">
<?php $ads = get_option('anuncio-728-90'); if (!empty($ads)) echo stripslashes(get_option('anuncio-728-90')); ?>
</div>
<?php } ?>
<!-- ************PELICULAS*************** -->
<div class="items">


<?php
    $first_char = $_GET["it"];
	$type = $_GET["type"];
	$show_posts = '100';
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $postids=$wpdb->get_col($wpdb->prepare("
    SELECT      ID
    FROM        $wpdb->posts
    WHERE       SUBSTR($wpdb->posts.post_title,1,1) = %s
    ORDER BY    $wpdb->posts.post_title",$first_char)); 

    if ($postids) {
    $args=array(
      'post__in' => $postids,
      'post_type' => $type,
	  'paged' => $paged,
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'caller_get_posts'=> 1
    );
    $my_query = null;
    $my_query = new WP_Query($args);
    if( $my_query->have_posts() ) {
    while ($my_query->have_posts()) : $my_query->the_post(); ?>



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

<?php include 'includes/home/item_1.php'; ?>


 <?php endwhile; } wp_reset_query(); } else { ?>
 No data
 <?php } ?>

<!-- **************************** -->


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