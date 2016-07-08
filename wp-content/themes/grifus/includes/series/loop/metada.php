<div id="info">
<h2 class="css3"><?php _e('General information','mundothemes') ?></h2>
<?php if($dato = series_get_meta('original_name')) { ?><div class="metadatac"><b><?php _e('Original name','mundothemes'); ?></b><span itemprop="name"><?php echo $dato; ?></span></div><?php } ?>
<?php if($dato = episodios_get_meta('name')) { ?><div class="metadatac"><b><?php _e('Episode Title','mundothemes'); ?></b><span><?php echo $dato; ?></span></div><?php } ?>
<?php if($dato = get_the_term_list($post->ID, 'tvcreator', '', ', ', '')) { ?><div class="metadatac"><b><?php _e('Created by','mundothemes'); ?></b><span><?php echo $dato; ?></span></div><?php } ?>
<?php if($dato = get_the_term_list($post->ID, 'episodedirector', '', ', ', '')) { ?><div class="metadatac"><b><?php _e('Director','mundothemes'); ?></b><span><?php echo $dato; ?></span></div><?php } ?>
<?php if($dato = get_the_term_list($post->ID, 'tvcast', '', ', ', '')) { ?><div class="metadatac"><b><?php _e('Starring','mundothemes'); ?></b><span><?php echo $dato; ?></span></div><?php } ?>
<?php if($dato = get_the_term_list($post->ID, 'episodegueststar', '', ', ', '')) { ?><div class="metadatac"><b><?php _e('Guest Star','mundothemes'); ?></b><span><?php echo $dato; ?></span></div><?php } ?>
<?php if($dato = episodios_get_meta('air_date')) { ?><div class="metadatac"><b><?php _e('Air date','mundothemes'); ?></b><span><?php echo $dato; ?></span></div><?php } ?>
<?php if($dato = episodios_get_meta('serie')) { ?><div class="metadatac"><b><?php _e('Serie','mundothemes'); ?></b><span><a href="<?php bloginfo('url'); ?>/<?php echo get_option('tvshows-slug'); ?>/<?php echo sanitize_title(episodios_get_meta('serie')); ?>"><?php echo $dato; ?></a></span></div><?php } ?>
<?php if($dato = get_the_term_list($post->ID, 'episodeyear', '', ', ', '')) { ?><div class="metadatac"><b><?php _e('Year','mundothemes'); ?></b><span><?php echo $dato; ?></span></div><?php } ?>
<?php get_template_part('includes/single/admin'); ?>
<?php if($values = series_get_meta("imagenes")) { ?>
<div class="backdropss">
<h2><?php _e('Backdrops','mundothemes') ?></h2>
<div id="backdrops" class="galeria animax">
<?php $img = get_post_meta($post->ID, "imagenes", $single = true); backdrops ($img); ?>
</div>
</div>
<?php } ?>
<div class="contenidotv">
<h2><?php _e('Synopsis of','mundothemes') ?> <?php the_title(); ?></h2>
<div itemprop="description">
<?php the_content(); ?>
</div>
</div>
<?php $activar_ads = get_option('activar-anuncio-468-60'); if ($activar_ads == "true") { ?>
<div class="ads_468">
<?php $ads = get_option('anuncio-468-60'); if (!empty($ads)) echo stripslashes(get_option('anuncio-468-60')); ?>
</div>
<?php } ?>
<?php if($dato = get_the_term_list($post->ID, 'tvnetworks', '', ', ', '')) { ?><div class="metadatac"><b><?php _e('Airs On','mundothemes'); ?></b><span><?php echo $dato; ?></span></div><?php } ?>
<?php if($dato = get_the_term_list($post->ID, 'tvstudio', '', ', ', '')) { ?><div class="metadatac"><b><?php _e('Production','mundothemes'); ?></b><span><?php echo $dato; ?></span></div><?php } ?>
<?php if($dato = get_the_term_list($post->ID, 'tvyear', '', ', ', '')) { ?><div class="metadatac"><b><?php _e('Release Year','mundothemes'); ?></b><span><?php echo $dato; ?></span></div><?php } ?>
<?php if($dato = series_get_meta('first_air_date')) { ?><div class="metadatac"><b><?php _e('Firt air date','mundothemes'); ?></b><span itemprop="datePublished"><?php echo $dato; ?></span></div><?php } ?>
<?php if($dato = series_get_meta('last_air_date')) { ?><div class="metadatac"><b><?php _e('Last air date','mundothemes'); ?></b><span><?php echo $dato; ?></span></div><?php } ?>
<?php if($dato = series_get_meta('type')) { ?><div class="metadatac"><b><?php _e('Type','mundothemes'); ?></b><span><?php echo $dato; ?></span></div><?php } ?>
<?php if($dato = series_get_meta('episode_run_time')) { ?><div class="metadatac"><b><?php _e('Episode runtime','mundothemes'); ?></b><span><?php echo $dato; ?> min</span></div><?php } ?>
<?php if($dato = series_get_meta('homepage')) { ?><div class="metadatac"><b><?php _e('Home Page','mundothemes'); ?></b><span><a rel="nofollow" href="<?php echo $dato; ?>" target="_blank"><?php the_title(); ?></a></span></div><?php } ?>
<?php if($dato = series_get_meta('popularity')) { ?><div class="metadatac"><b><?php _e('Popularity','mundothemes'); ?></b><span><?php echo $dato; ?></span></div><?php } ?>
<?php if($dato = series_get_meta('status')) { ?><div class="metadatac"><b><?php _e('TV Status','mundothemes'); ?></b><span><?php echo $dato; ?></span></div><?php } ?>
</div>