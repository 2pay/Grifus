<?php get_header(); ?>
<div id="episodes">
<div class="epitit"><h1><?php _e('Content recently added', 'mundothemes'); ?></h1></div>
<table class="list">
<thead>
<tr>
<td class="bb"><?php _e('TV Show','mundothemes'); ?></td>
<td class="cc"><?php _e('Title','mundothemes'); ?></td>
<td class="dd"><?php _e('Air date','mundothemes'); ?></td>
<td class="ee"><?php _e('Director','mundothemes'); ?></td>
</tr>
</thead>
<tbody>
<?php  if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<tr>
<td class="bb">
<a href="<?php the_permalink() ?>"><?php echo episodios_get_meta('serie'); ?></a> <span><?php echo episodios_get_meta('temporada'); ?> x <?php echo episodios_get_meta('episodio'); ?></span>
<div class="episodeinfo">
<div class="bloque">
<?php if($fondo = series_get_meta('img_episode')) { ?><div class="imagen"><a href="<?php the_permalink() ?>"><img src=" <?php echo $fondo; ?>"></a></div><?php } ?>
<div class="data">
<a href="<?php the_permalink() ?>"><h2><?php echo episodios_get_meta('name'); ?></h2></a>
<p><?php cg_content('',TRUE,'',250); ?></p>
<div class="degra"></div>
</div>
</div>
</div>
</td>
<td class="cc"><a href="<?php the_permalink() ?>"><?php echo episodios_get_meta('name'); ?></a></td>
<td class="dd"><?php echo episodios_get_meta('air_date'); ?></td>
<td class="ee"><?php echo get_the_term_list($post->ID, 'episodedirector', '', ', ', ''); ?></td>
</tr>
<?php endwhile; ?>						
<?php endif; ?>
</tbody>
</table>
<div id="paginador" style="margin-bottom:0;">
<?php pagination($additional_loop->max_num_pages);?>
</div>
<div class="respo_pag">
<div class="pag_a"><?php previous_posts_link( __('Previous','mundothemes') ); ?></div>
<div class="pag_b"><?php next_posts_link( __('Next','mundothemes') ); ?></div>
</div>
</div>
<?php  get_footer(); ?>