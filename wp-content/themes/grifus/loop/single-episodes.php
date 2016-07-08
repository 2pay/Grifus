<?php get_header(); ?>
<div id="series"  itemscope itemtype="http://schema.org/TVEpisode">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<meta itemprop="url" content="<?php the_permalink() ?>" />
<?php $terms = wp_get_post_terms( $post->ID, 'episodedirector'); foreach($terms as $term) { $term_link = get_term_link( $term ); if ( is_wp_error( $term_link ) ) { continue; }
echo '<div itemprop="director" itemscope itemtype="http://schema.org/Person"><meta itemprop="name" content="' . $term->name . '"><meta itemprop="url" content="' . esc_url( $term_link ) . '"></div>'; } ?>
<?php $terms = wp_get_post_terms( $post->ID, 'episodegueststar'); foreach($terms as $term) { $term_link = get_term_link( $term ); if ( is_wp_error( $term_link ) ) { continue; }
echo '<div itemprop="actors" itemscope itemtype="http://schema.org/Person"><meta itemprop="name" content="' . $term->name . '"><meta itemprop="url" content="' . esc_url( $term_link ) . '"></div>'; } ?>
<div class="ladoA">
<div id="fixar" class="">
<div class="imagen">
<a href="<?php bloginfo('url'); ?>/<?php echo get_option('tvshows-slug'); ?>/<?php echo sanitize_title(episodios_get_meta('serie')); ?>">
<img src="<?php echo episodios_get_meta('poster_serie'); ?>" itemprop="image" alt="<?php echo episodios_get_meta('serie'); ?>">
</a>
</div>
<div class="meta-a">
<p><?php echo episodios_get_meta('air_date'); ?></p>
</div>
<div class="meta-b">
<span class="metx"><i><?php echo episodios_get_meta('temporada'); ?></i> <?php _e('Season','mundothemes'); ?> </span>
<span class="metx"><i><?php echo episodios_get_meta('episodio'); ?></i> <?php _e('Episode','mundothemes'); ?> </span>
</div>
</div>
</div>
<div class="ladoB">
<div class="central">
<div class="cover" style="background-image:url(<?php if($fondo = series_get_meta('img_episode')) { echo $fondo; } ?>)">
<h1 itemprop="name"><?php echo episodios_get_meta('name'); ?></h1>
<div class="degradado"></div>
</div>
<!-- cover -->
<div class="metax1">
<div class="epinav">
<?php if($pagina = series_get_meta('code_paginame')) { 
	get_template_part('loop/paginar_episodio/'. $pagina .'');
		} else { 
	get_template_part('loop/paginar_episodio/default'); 
	} 
?>
</div>
<div class="tvsocial">
<ul>
<li><a class="radiushare" href="javascript: void(0);" onclick="window.open ('http://www.facebook.com/sharer.php?u=<?php the_permalink() ?>', 'Facebook', 'toolbar=0, status=0, width=650, height=450');"><i class="icon-facebook-f"></i><?php _e('Share','mundothemes'); ?></a></li>
<li><a class="more radiushare"><b class="icon-dots-three-horizontal"></b></a>
<ul class="sub">
<li><a class="twr" href="javascript: void(0);" onclick="window.open ('https://twitter.com/intent/tweet?text=<?php the_title(); ?>&amp;url=<?php the_permalink() ?>', 'Twitter', 'toolbar=0, status=0, width=650, height=450');" data-rurl="<?php the_permalink() ?>"><b class="icon-twitter2"></b></a></li>
<li><a class="gog" href="javascript: void(0);" onclick="window.open ('https://plus.google.com/share?url=<?php the_permalink() ?>', 'Google plus', 'toolbar=0, status=0, width=650, height=450');"><b class="icon-google"></b></a></li>
<li><a class="pit" href="javascript: void(0);" onclick="window.open ('https://pinterest.com/pin/create/button/?url=<?php the_permalink() ?>&amp;media=<?php echo series_get_meta('fondo_player'); ?>&amp;description=<?php the_title(); ?>', 'Pinterest', 'toolbar=0, status=0, width=650, height=450');"><b class="icon-pinterest"></b></a></li>
</ul>
<li>
</ul>
</div>
</div>
<!-- rating y social -->
<ul class="navtv idTabs">
<li><a class="info selected" href="#info"><?php _e('Information','mundothemes'); ?></a></li>
<li><a class="info" href="#streaming"><?php _e('Videos','mundothemes'); ?></a></li>
<li><a class="info" href="#links"><?php _e('Links','mundothemes'); ?></a></li>
</ul>
<?php get_template_part('includes/series/loop/metada'); ?>
<div id="streaming">
<h2 class="css3"><?php _e('Player','mundothemes') ?></h2>
<?php if( have_rows('player') ): ?>
<div class="player2">
<div class="embed2">
<?php $numerado = 1; { while( have_rows('player') ): the_row(); ?>
<div id="player2<?php echo $numerado; ?>">

<?php if($dato = get_sub_field('embed_player')) {  ?>
<?php echo do_shortcode($dato); ?>
<?php } ?>
<span class="tit"><?php the_sub_field('titulo_player'); ?></span>
</div>
<?php $numerado++; ?>   
<?php endwhile; } ?>
</div>
<div class="navplayer2">
<span class="tiplayer">    </span>
<ul class="player2ul idTabs">
<li class="mainer"><a><?php _e('Select','mundothemes'); ?> <i class="icon-sort"></i></a>
<ul>
<?php $numerado = 1; { while( have_rows('player') ): the_row(); ?>
<li><a href="#player2<?php echo $numerado; ?>"><?php  the_sub_field('titulo_player'); ?></a></li>
<?php $numerado++; ?>   
<?php endwhile; } ?>
</ul>
</li>
</ul>
</div>
</div>
<?php else : ?>
<div class="nodata"><?php _e('No data available','mundothemes'); ?></div>
<?php endif; ?>
</div>
<div id="links">
<h2 class="css3"><?php _e('Links','mundothemes') ?></h2>
<div class="linkstv">
<?php enlaces_descargas(); ?>
<?php enalces_verenlinea(); ?>
</div>
</div>
<?php get_template_part('includes/series/loop/comentarios'); ?>
</div>
<div class="sidebartv">
<?php $active = get_option('widget_single_tv'); if ($active == "true") {  dynamic_sidebar( 'Single TV Shows' );  } else { get_template_part('includes/series/loop/relacionados'); } ?>
</div>
</div>
<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>