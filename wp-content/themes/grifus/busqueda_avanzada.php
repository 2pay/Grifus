<?php
/*
Template Name: Advanced Search
*/
define('WPAS_DEBUG', false); get_header();  
$args = array();
$args['wp_query'] = array('post_type' => 'post',
'posts_per_page' => '15',
'order' => 'DESC',
'orderby' => 'date');
$args['fields'][] = array('type' => 'search',
'label' => __( 'Advanced Search', 'mundothemes' ),
'value' => '');			
$args['fields'][] = array('type' => 'taxonomy',
'label' => __( 'Genre', 'mundothemes' ),
'taxonomy' => 'category',
'format' => 'multi-select',
'operator' => 'AND');
$args['fields'][] = array('type' => 'orderby',
'label' => __('Order By', 'mundothemes'),
'values' => array('' => '', 'title' => __('Title', 'mundothemes'), 'date' => __('Date','mundothemes')),
'format' => 'select');
$args['fields'][] = array('type' => 'order',
'label' => __('Order', 'mundothemes'),
'values' => array('' => '', 'ASC' => __('Ascending','mundothemes'), 'DESC' => __('Falling','mundothemes')),
'format' => 'select');

$args['fields'][] = array('type' => 'taxonomy',
'label' => __( 'Quality', 'mundothemes' ),
'taxonomy' => get_option('calidad'),
'format' => 'checkbox',
'operator' => 'IN');

$args['fields'][] = array('type' => 'taxonomy',
'label' => __( 'Release Year', 'mundothemes' ),
'taxonomy' => get_option('year'),
'format' => 'checkbox',
'operator' => 'IN');

$args['fields'][] = array('type' => 'submit', 'value' => __('Search', 'mundothemes'));
$my_search_object = new WP_Advanced_Search($args);
$temp_query = $wp_query;
$wp_query = $my_search_object->query();
?>
<div id="sub_contenido" class="page">


<div class="sidebar">
<?php $my_search_object->the_form(); ?>
</div>

<div class="contenido coss" id="resultados">
<?php 
if ( have_posts() ): while ( have_posts() ): the_post(); ?>
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
if($img = get_post_custom_values($imagefix)){
$imgsrc = $img[0];
} else {
$img = get_template_directory_uri().'/images/noimg.png';
$imgsrc = $img;
} 
} ?>					
<div class="resultado">
<div class="imagen">
<a href="<?php the_permalink() ?>"><img src="<?php echo $imgsrc; $imgsrc = ''; ?>" alt="<?php the_title(); ?>" /></a>
<?php if($values = get_post_custom_values("imdbRating")) { ?><span class="imdb"><B>IMDb:</B> <?php echo $values[0]; ?></span><?php } ?>
</div>
<div class="datos">
<span class="titulo"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></span>
<?php if(get_the_term_list($post->ID, ''.$year_estreno.'')) { ?><span class="anio"><?php echo get_the_term_list($post->ID, ''.$year_estreno.'', '', ', ', ''); ?></span><?php } ?>
<p><?php cg_content('',TRUE,'',30) ?>...</p>
<span class="abc-c" style="width:130px;">
<span class="abc-r" style="width: <?php $values = get_post_custom_values("imdbRating"); echo round($values[0],1)*10; ?>%;"></span>
</span>
<div class="ratio">
<div class="ac">
<b><?php $values = get_post_custom_values("imdbRating"); echo round($values[0],1); ?></b>
<span><?php _e('Average', 'mundothemes'); ?></span>
</div>
<div class="ac">
<b><?php $values = get_post_custom_values("imdbVotes"); echo $values[0]*1; ?></b><span><?php _e('Vote', 'mundothemes'); ?></span>
</div>
</div>
</div>
</div>
<?php endwhile;?>
<div id="paginador">
<?php pagination($additional_loop->max_num_pages);?>
</div>
<?php  else : echo _e('No content available', 'mundothemes'); endif; $wp_query = $temp_query; wp_reset_query(); ?>
</div>

<?php get_footer(); ?>