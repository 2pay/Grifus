<div id="mt-<?php the_id(); ?>" class="item">
<a href="<?php the_permalink() ?>">
<div class="image">
<img src="<?php echo $imgsrc; $imgsrc = ''; ?>" alt="<?php the_title(); ?>" width="100%" height="100%" />
<span class="player"></span>


<?php if($values = get_post_custom_values("imdbRating")) { ?>
<span class="imdb"><b><b class="icon-star"></b></b> <?php echo $values[0]; ?></span>
<?php } if($values = series_get_meta("serie_vote_average")) { ?>
<span class="imdb"><b><b class="icon-star"></b></b> <?php echo $values; ?></span>
<?php } ?>
</div>
</a>
<div class="boxinfo">
<a href="<?php the_permalink() ?>">
<span class="tt"><?php the_title(); ?></span>
<span class="ttx">
<?php cg_content('',TRUE,'',60); ?>
<div class="degradado"></div>
</span>
</a>
<div class="cocs imdb_r">
<?php if($values = get_post_custom_values("imdbRating")) { ?> 
<div class="a">
<span class="imdbs"><?php echo $values[0]; ?></span>
</div>
<div class="b">
<div class="bar"><span style="width: <?php echo $values[0]*10; ?>%"></span></div>
<span class="dato">IMDB: <b><?php echo $values[0]; ?>/10</b> <b><?php $values2 = get_post_custom_values("imdbVotes"); echo $values2[0]; ?> <?php _e('votes', 'mundothemes'); ?></b></span>
</div>
<?php } ?>


<?php if($values3 = series_get_meta("serie_vote_average")) { ?> 
<div class="a">
<span class="imdbs"><?php echo $values3; ?></span>
</div>
<div class="b">
<div class="bar"><span style="width: <?php echo $values3*10; ?>%"></span></div>
<span class="dato">TMDb: <b><?php echo $values3; ?>/10</b> <b><?php $values4 = series_get_meta("serie_vote_count"); echo $values4; ?> <?php _e('votes', 'mundothemes'); ?></b></span>
</div>
<?php } ?>
</div>
<?php if($values = get_post_custom_values("imdbRating")) { ?>
<div class="typepost">movie</div>
<?php } ?>
<?php if($values = series_get_meta("serie_vote_average")) { ?>
<div class="typepost">tv</div>
<?php } ?>
</div>




<div class="fixyear">
<h2><?php the_title(); ?></h2>
<?php if($mostrar = $terms = strip_tags( $terms = get_the_term_list( $post->ID, get_option('year')))) {  ?>
<span class="year"><?php echo $mostrar; ?></span>
<?php } ?>
<?php if($mostrar = $terms = strip_tags( $terms = get_the_term_list( $post->ID, 'tvyear'))) {  ?>
<span class="year"><?php echo $mostrar; ?></span>
<?php } ?>
</div>
<?php if($mostrar = $terms = strip_tags( $terms = get_the_term_list( $post->ID, get_option('calidad')))) {  ?>
<span class="calidad2"><?php echo $mostrar; ?></span>
<?php } ?>
</div>