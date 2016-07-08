<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php wp_title( '-', true, 'right' ); ?></title>		
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/print/style.css" />
</head>
<body>
<div class="content">
<div class="controls">
<div class="contols-inner">
<a href="<?php the_permalink() ?>" class="button exit-print"><?php _e('Exit print mode','mundothemes'); ?></a>
<span class="button print-again" onclick="window.print();"><?php _e('Print Data','mundothemes'); ?></span>
<span class="button text-plus" title="Increase text size">A+</span>
<input class="current-font-size" type="number">
<span class="button text-minus" title="Decrease text size">A-</span>
<span class="button remove-undo-all" title="Undo all"><?php _e('Undo all','mundothemes'); ?></span>
</div>
</div>
<?php if (have_posts()) :while (have_posts()) : the_post(); ?>
<?php post_movies_true(); ?>
<!-- contenido imprimible -->
<div class="printable-content">
<h1 class="movie-title"><?php the_title(); ?></h1>
<?php if($values = get_post_custom_values("tagline")) { ?><span class="lema"><?php echo $values[0]; ?></span><?php } ?>
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
if($img = get_post_custom_values($imagefix)){
$imgsrc = $img[0];
} else {
$img = get_template_directory_uri().'/images/noimg.png';
$imgsrc = $img;
} 
} 
?>
<div class="imagen">
<?php if($values = info_movie_get_meta("fondo_player")) { ?><img src="<?php echo $values; ?>" alt="<?php the_title(); ?>" class="cover center-img"><?php } ?>
<img src="<?php echo $imgsrc; $imgsrc = ''; ?>" alt="<?php the_title(); ?>" class="poster" />
</div>
<h3><?php _e('Synopsis','mundothemes'); ?>:</h3>
<?php the_content(); ?>
<?php if($values = info_movie_get_meta("Title")) { ?>
<div class="dato">
<div class="a"><?php _e('Original title','mundothemes'); ?></div>
<div class="b"><?php echo $values; ?></div>
</div>
<?php } ?>
<?php if($mostrar = $terms = strip_tags( $terms = get_the_term_list( $post->ID, ''.$director.'', '', ', ', ''))) {  ?>
<div class="dato">
<div class="a"><?php _e('Director','mundothemes'); ?></div>
<div class="b"><?php echo $mostrar; ?></div>
</div>
<?php } ?>
<?php if($mostrar = $terms = strip_tags( $terms = get_the_term_list( $post->ID, ''.$actor.'', '', ', ', ''))) {  ?>
<div class="dato">
<div class="a"><?php _e('Stars','mundothemes'); ?></div>
<div class="b"><?php echo $mostrar; ?></div>
</div>
<?php } ?>
<?php if($values = info_movie_get_meta("Released")) { ?>
<div class="dato">
<div class="a"><?php _e('Release Date','mundothemes'); ?></div>
<div class="b"><?php echo $values; ?></div>
</div>
<?php } ?>
<?php if($values = info_movie_get_meta("Rated")) { ?>
<div class="dato">
<div class="a"><?php _e('Rated','mundothemes'); ?></div>
<div class="b"><?php echo $values; ?></div>
</div>
<?php } ?>
<?php if($values = info_movie_get_meta("Runtime")) { ?>
<div class="dato">
<div class="a"><?php _e('Runtime','mundothemes'); ?></div>
<div class="b"><?php echo $values; ?></div>
</div>
<?php } ?>
<?php if($values = info_movie_get_meta("Awards")) { ?>
<div class="dato">
<div class="a"><?php _e('Awards','mundothemes'); ?></div>
<div class="b"><?php echo $values; ?></div>
</div>
<?php } ?>
<?php if($values = info_movie_get_meta("Country")) { ?>
<div class="dato">
<div class="a"><?php _e('Country','mundothemes'); ?></div>
<div class="b"><?php echo $values; ?></div>
</div>
<?php } ?>
<?php if($values = info_movie_get_meta("budget")) { ?>
<div class="dato">
<div class="a"><?php _e('Budget','mundothemes'); ?></div>
<div class="b">USD $<?php echo number_format($values, 2, ',', ' '); ?></div>
</div>
<?php } ?>
<?php if($values = info_movie_get_meta("revenue")) { ?>
<div class="dato">
<div class="a"><?php _e('Revenue','mundothemes'); ?></div>
<div class="b">USD $<?php echo number_format($values, 2, ',', ' '); ?></div>
</div>
<?php } ?>
<?php if($values = info_movie_get_meta("popularity")) { ?>
<div class="dato">
<div class="a"><?php _e('Popularity','mundothemes'); ?></div>
<div class="b"><?php echo $values; ?></div>
</div>
<?php } ?>
<?php if($values = info_movie_get_meta("status")) { ?>
<div class="dato">
<div class="a"><?php _e('Status','mundothemes'); ?></div>
<div class="b"><?php echo $values; ?></div>
</div>
<?php } ?>
<?php if($values = info_movie_get_meta("Checkbx2")) { ?>
<div class="dato">
<div class="a"><?php _e('ID IMDb.com','mundothemes'); ?></div>
<div class="b"><?php echo $values; ?></div>
</div>
<?php } ?>
<?php if($values = info_movie_get_meta("imdbRating")) { ?>
<div class="dato">
<div class="a"><?php _e('IMDB Rating','mundothemes'); ?></div>
<div class="b"><strong><?php echo $values; ?></strong></div>
</div>
<?php } ?>
<?php if($values = info_movie_get_meta("imdbVotes")) { ?>
<div class="dato">
<div class="a"><?php _e('IMDB votes','mundothemes'); ?></div>
<div class="b"><?php echo $values; ?></div>
</div>
<?php } ?>
<?php if($values = info_movie_get_meta("id")) { ?>
<div class="dato">
<div class="a"><?php _e('ID Themoviedb.org','mundothemes'); ?></div>
<div class="b"><?php echo $values; ?></div>
</div>
<?php } ?>
<?php if($values = info_movie_get_meta("vote_average")) { ?>
<div class="dato">
<div class="a"><?php _e('TMDb Rating','mundothemes'); ?></div>
<div class="b"><strong><?php echo $values; ?></strong></div>
</div>
<?php } ?>
<?php if($values = info_movie_get_meta("vote_count")) { ?>
<div class="dato">
<div class="a"><?php _e('TMDb votes','mundothemes'); ?></div>
<div class="b"><?php echo $values; ?></div>
</div>
<?php } ?>
<img src="https://chart.googleapis.com/chart?chs=130x130&cht=qr&chl=<?php the_permalink() ?>&choe=UTF-8" class="center-img">
</div>
<!-- fin contenido imprimible -->
<?php endwhile; endif; ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js?ver=2.1.3"></script>
<script src="<?php echo get_template_directory_uri(); ?>/print/scripts.js"></script>
</body>
</html>
