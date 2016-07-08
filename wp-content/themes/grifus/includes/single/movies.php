<?php get_header(); ?>
<?php $move = get_option('activar-phb'); if ($move == "true") { } else { include_once 'player.php'; } ?>
<div id="single" itemscope itemtype="http://schema.org/Movie">
<?php if (have_posts()) :
while (have_posts()) : the_post(); if (has_post_thumbnail()) {
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
if($img = info_movie_get_meta('poster_url')){
$imgsrc = $img;
} else {
$img = get_template_directory_uri().'/images/noimg.png';
$imgsrc = $img;
} 
} ?>
<?php $terms = wp_get_post_terms( $post->ID, $director); foreach($terms as $term) { $term_link = get_term_link( $term ); if ( is_wp_error( $term_link ) ) { continue; }
echo '<div itemprop="director" itemscope itemtype="http://schema.org/Person"><meta itemprop="name" content="' . $term->name . '"><meta itemprop="url" content="' . esc_url( $term_link ) . '"></div>'; } ?>
<?php $terms = wp_get_post_terms( $post->ID, $elenco); foreach($terms as $term) { $term_link = get_term_link( $term ); if ( is_wp_error( $term_link ) ) { continue; }
echo '<div itemprop="actors" itemscope itemtype="http://schema.org/Person"><meta itemprop="name" content="' . $term->name . '"><meta itemprop="url" content="' . esc_url( $term_link ) . '"></div>'; }  ?>
<?php if(get_post_custom_values("youtube_id")) { ?>
 <div itemscope itemtype="http://schema.org/VideoObject">       
<?php $trailers = get_post_meta($post->ID, "youtube_id", $single = true); mostrar_trailer_meta($trailers) ?>
<meta itemprop="name" content="<?php the_title(); ?>">
<?php if($noners = get_post_custom_values("tagline")) { ?><meta itemprop="description" conTent="<?php echo $noners[0]; ?>"><?php } ?>
<?php if($noners = get_post_custom_values("fondo_player")) { ?><meta itemprop="thumbnailUrl" conTent="<?php echo $noners[0]; ?>"><?php } ?>
<meta itemprop="uploadDate" content="<?php the_date('c'); ?>">
</div>
<?php } ?>
<div class="s_left">
<div id="uwee" class="sbox">
<div class="imagen">
<div class="fix">
<?php if($mostrar = $terms = strip_tags( $terms = get_the_term_list( $post->ID, ''.$calidad.'' ))) {  ?>
<span class="calidad2"><?php echo $mostrar; ?></span>
<?php } ?>
<img itemprop="image" src="<?php echo $imgsrc; $imgsrc = ''; ?>" alt="<?php the_title(); ?>" />
<a href="<?php the_permalink() ?>?print=true" rel="nofollow"><i class="icon-printer"></i></a>
</div>
<a class="report" rel="nofollow"><b class="icon-exclamation-circle"></b> <?php _e('Report error','mundothemes'); ?></a>
</div>
<div class="data">
<h1 itemprop="name"><?php the_title(); ?></h1>
<span class="titulo_o"><?php if($values = info_movie_get_meta("Title")) { ?><i itemprop="name"><?php echo $values; ?></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
<?php if($noners = info_movie_get_meta("Released")) { ?><i itemprop="datePublished"><?php echo $noners; ?></i><?php } ?></span>
<p class="meta">
<?php if($values = info_movie_get_meta("Rated")) { ?><span itemprop="contentRating" class="<?php echo $values; ?>"><?php echo $values; ?></span><?php } ?>
<?php if($mostrar = $terms = strip_tags( $terms = get_the_term_list( $post->ID, ''.$year_estreno.'' ))) {  ?><span>
<?php echo get_the_term_list($post->ID, ''.$year_estreno.'', '', '', ''); ?>
</span><?php } ?>
<?php if($values = get_post_custom_values("Runtime")) { ?><span><b class="icon-time"></b> <i itemprop="duration"><?php echo $values[0]; ?></i></span><?php } ?>  
<i class="limpiar"><?php the_category(',&nbsp;',''); ?></i>
</p>
<!-- Micro data -->
<meta itemprop="url" content="<?php the_permalink() ?>" />
<meta itemprop="datePublished" content="<?php the_date('c'); ?>"/>
<?php if($noners = info_movie_get_meta("tagline")) { ?><meta itemprop="headline" conTent="<?php echo $noners; ?>"><?php } ?>
<?php $categories_list = my_get_the_category_list( __( ' ', 'requiredfoundation' ) );  if ( $categories_list ): ?>
<?php printf( __( ' %2$s', 'requiredfoundation' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list ); ?>
<?php endif;  ?>
<!-- Micro data -->
<div class="imdb_r" itemtype="http://schema.org/AggregateRating" itemscope="" itemprop="aggregateRating">
<a href="http://www.imdb.com/title/<?php $values = info_movie_get_meta("Checkbx2"); echo $values; ?>/" target="_blank">
<div class="a">
<?php if($values = info_movie_get_meta("imdbRating")) { ?> 
<span itemprop="ratingValue"><?php echo $values; ?></span>
<?php } ?>
</div>
</a>
<div class="b">
<div class="bar"><span style="width: <?php $values = info_movie_get_meta("imdbRating"); echo $values*10; ?>%"></span></div>
<span class="dato"><a href="http://www.imdb.com/title/<?php $values = info_movie_get_meta("Checkbx2"); echo $values; ?>/" rel="nofollow" target="_blank">IMDB:</a> <b style="margin-right:0"><?php $values = info_movie_get_meta("imdbRating"); echo $values; ?>/</b><b itemprop="bestRating">10</b> <b itemprop="ratingCount" style="margin-right:0"><?php $values = info_movie_get_meta("imdbVotes"); echo $values; ?></b> <b><?php _e('votes', 'mundothemes'); ?></b></span>
</div>
</div>
<p class="meta_dd">
<b class="icon-megaphone"></b>
<?php echo get_the_term_list($post->ID, ''.$director.'', '', ', ', ''); ?>
</p>
<p class="meta_dd limpiar">
<b class="icon-star"></b>
<?php echo get_the_term_list($post->ID, ''.$actor.'', '', ', ', ''); ?> 
</p>
<?php if($noners = info_movie_get_meta("Awards")) { ?>
<p class="meta_dd">
<b class="icon-trophy"></b>
<?php echo $noners; ?>
</p>
<?php } ?>

<?php if($noners = info_movie_get_meta("Country")) { ?>
<p class="meta_dd">
<b class="icon-network"></b>
<?php echo $noners; ?>
</p>
<?php } ?>
<?php if($noners = info_movie_get_meta("views")) { ?>
<p class="meta_dd">
<b class="icon-eye"></b>
<?php echo $noners; ?>
</p>
<?php } ?>
</div>
<?php include_once 'report.php'; ?>

<?php get_template_part('includes/single/admin'); ?>
</div>
<div class="itemmenu">
<ul class="idTabs">
<li><a href="#cap1" class="selected"><?php _e('Synopsis','mundothemes'); ?></a></li>
<?php if($values = info_movie_get_meta("youtube_id")) { ?><li><a href="#cap2"><?php _e('Trailers','mundothemes'); ?></a></li><?php } ?>
<li><a href="#cap3"><?php _e('Complete cast','mundothemes'); ?></a></li>
</ul>
</div>
<div class="sbox">
<div class="entry-content">
<div itemprop="description" id="cap1" style="display:block">
<?php the_content(); ?>
</div>
<?php if($values = info_movie_get_meta("youtube_id")) { ?><div id="cap2"><?php $trailers = get_post_meta($post->ID, "youtube_id", $single = true); mostrar_trailer($trailers) ?></div><?php } ?>
<div id="cap3">
<?php echo get_the_term_list($post->ID, ''.$director.'', '<div class="metatags"><h3><i class="icon-bullhorn"></i> '. __('Director','mundothemes').'</h3>', ' ', '</div>'); ?>
<?php echo get_the_term_list($post->ID, ''.$actor.'', '<div class="metatags"><h3><i class="icon-star"></i> '. __('Stars','mundothemes').'</h3>', ' ', '</div>'); ?>
<?php echo get_the_term_list($post->ID, ''.$elenco.'', '<div class="metatags"><h3><i class="icon-users"></i> '. __('Cast','mundothemes').'</h3>', ' ', '</div>'); ?>
</div>
</div>
<?php $activar_ads = get_option('activar-anuncio-468-60'); if ($activar_ads == "true") { ?>
<div class="ads_468" style="border-bottom: 0">
<?php $ads = get_option('anuncio-468-60'); if (!empty($ads)) echo stripslashes(get_option('anuncio-468-60')); ?>
</div>
<?php } ?>
</div>
<?php if($values = get_post_custom_values("imagenes")) { ?>
<div id="backdrops" class="galeria">
<?php $img = get_post_meta($post->ID, "imagenes", $single = true); backdrops ($img); ?>
</div>
<?php } ?>
<?php $move = get_option('activar-phb'); if ($move == "true") { ?>
<div class="realse" style="margin-bottom:15px;float: left;">
<?php include_once 'player.php'; ?>
</div>
<?php } ?>
<?php enlaces_descargas(); ?>
<?php enalces_verenlinea(); ?>
<?php if($download = get_post_custom_values("descargas_link")) { ?>
<div class="sbox">
<div class="descargas">
<ul class="pver desx">
<li class="ver">
<span class="opci"><?php _e("Links", "mundothemes"); ?></span>
<span><?php _e("Server", "mundothemes"); ?></span>
<span><?php _e('Language', 'mundothemes') ?></span>
<span><?php _e("Format", "mundothemes"); ?></span>
</li>
<?php echo $download[0]; ?>
</ul>
</div>
</div>
<?php } ?>
<div class="realse">
<?php fbtw(); ?>
</div>
<?php include_once 'comentarios.php'; ?>
</div>
<?php endwhile; endif; ?>
<div class="s_right">
<?php fbtw(); ?>
<?php $active = get_option('widget_single'); if ($active == "true") {  dynamic_sidebar( 'Single Movie' );  } else { ?>
<?php $activar_ads = get_option('activar-anuncio-300-250'); if ($activar_ads == "true") { ?>
<div class="ads_300">
<?php $ads = get_option('anuncio-300-250'); if (!empty($ads)) echo stripslashes(get_option('anuncio-300-250')); ?>
</div>
<?php } ?>
<div class="categorias">
<h3><?php _e('Genres','mundothemes'); ?> <span class="icon-sort"></span></h3>
<ul class="scrolling cat">
<?php categorias(); ?>
</ul>
</div>
<div class="filtro_y">
<h3><?php _e('Release year','mundothemes'); ?> <span class="icon-sort"></span></h3>
<ul class="scrolling">
<?php $args = array('order' => DESC ,'number' => 50); $camel = get_option('year'); $tax_terms = get_terms($camel,$args);  ?>
<?php foreach ($tax_terms as $tax_term) { echo '<li>' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '">' . $tax_term->name.'</a></li>'; } ?>
</ul>
</div>
<?php } ?>
</div>
</div>
<?php include_once 'relacionados.php'; ?>
<?php get_footer(); ?>