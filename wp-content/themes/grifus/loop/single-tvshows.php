<?php get_header(); ?>
<div id="series" itemscope itemtype="http://schema.org/TVSeries">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php get_template_part('includes/series/loop/microdata'); ?>
<div class="ladoA">
<?php get_template_part('includes/series/loop/left'); ?>
</div>
<!-- ladoA -->
<div class="ladoB">
<div class="central">
<?php get_template_part('includes/series/loop/cover'); ?>
<?php get_template_part('includes/series/loop/metada'); ?>
<?php get_template_part('includes/series/loop/temporadas_episodios'); ?>
<div id="coments"></div>
<!-- comentarios -->
<div id="trailer">
<h2 class="css3"><?php _e('Videos','mundothemes') ?></h2>
<?php $trailers = get_post_meta($post->ID, "youtube_id", $single = true); mostrar_trailer_tv($trailers) ?>
<?php if(series_get_meta("youtube_id")) { ?>
 <div itemscope itemtype="http://schema.org/VideoObject">       
<?php $trailers = get_post_meta($post->ID, "youtube_id", $single = true); mostrar_trailer_meta($trailers) ?>
<meta itemprop="name" content="<?php the_title(); ?>">
<meta itemprop="description" conTent="<?php the_title(); ?> Trailer">
<?php if($noners = series_get_meta("fondo_player")) { ?><meta itemprop="thumbnailUrl" conTent="<?php echo $noners; ?>"><?php } ?>
<?php if($noners = series_get_meta("first_air_date")) { ?><meta itemprop="uploadDate" conTent="<?php echo $noners; ?>"><?php } ?>
</div>
<?php } ?>
</div>
<!-- trailer y videos -->
<?php get_template_part('includes/series/loop/comentarios'); ?>
</div>
<!-- central -->
<div class="sidebartv">
<?php $active = get_option('widget_single_tv'); if ($active == "true") {  dynamic_sidebar( 'Single TV Shows' );  } else { get_template_part('includes/series/loop/relacionados'); } ?>
</div>
<!-- sidebar -->
</div>
<!-- ladoB -->
<?php endwhile; endif; ?>
</div>
<!-- series -->
<?php get_footer(); ?>