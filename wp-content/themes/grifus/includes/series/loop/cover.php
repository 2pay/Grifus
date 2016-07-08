<div class="cover" style="background-image:url(<?php if($fondo = series_get_meta('fondo_player')) { echo $fondo; } else { echo get_template_directory_uri().'/images/cover.jpg'; } ?>)">
<?php if($dato = series_get_meta('status')) { ?><span class="status"><?php echo $dato; ?></span><?php } ?>
<h1 itemprop="name"><?php the_title(); ?></h1>
<div class="degradado"></div>
</div>
<!-- cover -->
<div id="metatv" class="metax1">
<?php if($values3 = series_get_meta("serie_vote_average")) { ?> 
<div class="imdb_r covete" itemtype="http://schema.org/AggregateRating" itemscope itemprop="aggregateRating">
<div class="a">
<span class="imdbs cds" itemprop="ratingValue"><?php echo $values3; ?></span>
</div>
<div class="b">
<div class="bar"><span style="width: <?php echo $values3*10; ?>%"></span></div>
<span class="dato">TMDb: <b><?php echo $values3; ?>/<i itemprop="bestRating">10</i></b> <b itemprop="ratingCount"><?php $values4 = series_get_meta("serie_vote_count"); echo $values4; ?></b> <b><?php _e('votes', 'mundothemes'); ?></b></span>
</div>
</div>
<?php } else { ?>
<div class="imdb_r covete">
no data
</div>
<?php } ?>
<div class="tvsocial">
<ul>
<li class="fbtv"><a class="radiushare" href="javascript: void(0);" onclick="window.open ('http://www.facebook.com/sharer.php?u=<?php the_permalink() ?>', 'Facebook', 'toolbar=0, status=0, width=650, height=450');"><i class="icon-facebook-f"></i><?php _e('Share','mundothemes'); ?></a></li>
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
<li><a class="episodes" href="#seasons"><?php _e('Episodes','mundothemes'); ?></a></li>
<li><a class="comentar" href="#trailer"><?php _e('Videos','mundothemes'); ?></a></li>
<li class="restet"><a class="comentar" href="#coments"><?php _e('Reviews','mundothemes'); ?></a></li>
</ul>
