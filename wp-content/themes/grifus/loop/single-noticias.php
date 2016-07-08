<?php get_header(); ?>
<div id="single">
<?php if (have_posts()) :
while (have_posts()) : the_post(); ?>
<div class="s_left">
<div class="realse">
</div>
<div class="sbox">
<div class="entry-content">
<h1><?php the_title(); ?></h1>
<p><?php echo get_the_date(); ?></p>
<?php the_content(); ?>
</div>
</div>
<div class="realse">
<?php fbtw(); ?>
</div>
<?php get_template_part('includes/single/comentarios'); ?>
</div>
<?php endwhile; endif; ?>
<div class="s_right">
<?php fbtw(); ?>
<?php $activar_ads = get_option('activar-anuncio-300-250'); if ($activar_ads == "true") { ?>
<div class="ads_300">
<?php $ads = get_option('anuncio-300-250'); if (!empty($ads)) echo stripslashes(get_option('anuncio-300-250')); ?>
</div>
<?php } ?>
<div class="categorias">
<h3><?php _e('Genres','mundothemes'); ?> <span class="icon-sort"></span></h3>
<ul class="cat">
<?php categorias(); ?>
</ul>
</div>
<div class="filtro_y">
<h3><?php _e('Release year','mundothemes'); ?> <span class="icon-sort"></span></h3>
<ul>
<?php
$cc = date('Y');
$cd = date('Y')-51; 
foreach (range($cc, $cd) as $número) { ?>
<li><a class="ito" HREF="<?php bloginfo('url'); ?>/<?php echo get_option('year'); ?>/<?php echo $número; ?>"><?php echo $número; ?></a></li>
<?php } ?>
</ul>
</div>
</div>
</div>
<?php get_footer(); ?>