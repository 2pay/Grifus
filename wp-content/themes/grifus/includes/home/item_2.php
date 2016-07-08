<div class="fit item">
<div class="image">
<a href="<?php the_permalink() ?>"><img src="<?php echo $imgsrc; $imgsrc = ''; ?>" alt="<?php the_title(); ?>" /></a>
</div>
<div class="data">
<h1><?php the_title(); ?></h1>


<span class="titulo_o">
<?php if($values = get_post_custom_values("Title")) { ?><?php echo $values[0]; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
<?php if($noners = get_post_custom_values("Released")) { ?><?php echo $noners[0]; ?><?php } ?>
<?php if($values = series_get_meta("original_name")) { ?><?php echo $values; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
<?php if($noners = series_get_meta("first_air_date")) { ?><?php echo $noners; ?><?php } ?>
</span>


<p class="meta">
<?php if($values = get_post_custom_values("Rated")) { ?><span class="<?php echo $values[0]; ?>"><?php echo $values[0]; ?></span><?php } ?>
<?php if($mostrar = $terms = strip_tags( $terms = get_the_term_list( $post->ID, ''.$year_estreno.'' ))) {  ?><span><?php echo get_the_term_list($post->ID, ''.$year_estreno.'', '', '', ''); ?></span><?php } ?>
<?php if($mostrar = $terms = strip_tags( $terms = get_the_term_list( $post->ID, 'tvyear' ))) {  ?><span><?php echo get_the_term_list($post->ID, 'tvyear', '', '', ''); ?></span><?php } ?>
<?php if($values = get_post_custom_values("Runtime")) { ?><span><b class="icon-time"></b> <?php echo $values[0]; ?></span><?php } ?>
<?php if($values = series_get_meta("status")) { ?><span><?php echo $values; ?></span><?php } ?> 
</p>


<div class="imdb_r">
<?php if($values = get_post_custom_values("imdbRating")) { ?> 
<div class="a">
<span><?php echo $values[0]; ?></span>
</div>
<div class="b">
<div class="bar"><span style="width: <?php echo $values[0]*10; ?>%"></span></div>
<span class="dato">IMDB: <b><?php echo $values[0]; ?>/10</b> <b><?php $values2 = get_post_custom_values("imdbVotes"); echo $values2[0]; ?> <?php _e('votes', 'mundothemes'); ?></b></span>
</div>
<?php } ?>

<?php if($values3 = get_post_custom_values("serie_vote_average")) { ?> 
<div class="a">
<span><?php echo $values3[0]; ?></span>
</div>
<div class="b">
<div class="bar"><span style="width: <?php echo $values3[0]*10; ?>%"></span></div>
<span class="dato">TMDb: <b><?php echo $values3[0]; ?>/10</b> <b><?php $values4 = get_post_custom_values("serie_vote_count"); echo $values4[0]; ?> <?php _e('votes', 'mundothemes'); ?></b></span>
</div>
<?php } ?>

</div>




<div class="contenido"><p><?php cg_content('',TRUE,'',80); ?></p><div class="degradado"></div></div>
</div>
</div>