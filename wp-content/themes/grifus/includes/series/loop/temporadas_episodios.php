<div id="seasons">
<h2 class="css3"><?php _e('Seasons and episodes','mundothemes') ?></h2>
<?php if( have_rows('temporadas') ): 
$numerado = 1; { 
while( have_rows('temporadas') ): the_row(); ?>
<div class="se-c">
<div class="se-q"><span class="se-t<?php if ($coun == 0) : ?> se-o<?php endif; $coun++; ?>"><?php echo $numerado; ?></span>    <span class="title"><?php the_title(); ?> - <?php _e('Season','mundothemes') ?> <?php echo $numerado; ?></span></div>
<?php if( have_rows('episodios') ): ?>
<div class="se-a" <?php if ($count == 0) : ?>style="display: block"<?php endif; $count++; ?>>
<ul class="episodios">
<?php $numerado2 = 1; { while( have_rows('episodios') ): the_row(); ?>
<li>
<div class="numerando"><?php echo $numerado; ?> x <?php echo $numerado2 ?></div>
<div class="episodiotitle">
<a href="<?php bloginfo('url'); ?>/<?php echo get_option('episodios-slug'); ?>/<?php echo get_sub_field('slug'); ?>">
<?php if($title = get_sub_field('titlee')) { echo $title; } else { echo __('Episode','mundothemes'); echo '&nbsp;', $numerado2; } ?>
</a>
<span class="date"><?php if($date = get_sub_field('tvdate')) { echo $date; } else { echo '--------------------'; }?></span>
<span class="eyes"><i class="icon-eye2"></i></span>
<div>
</li>
<?php $numerado2++; ?> 
<?php endwhile; } ?> 
</ul>
</div>
<?php else : ?>
<div class="se-a">
<ul class="episodios">
<li>
<div class="numerando"><?php echo $numerado; ?> x -</div>
<div class="episodiotitle">
<a><?php _e('no data','mundothemes'); ?></a>
<span><?php _e('n/a','mundothemes'); ?></span>
<div>
</li>
</ul>
</div>
<?php endif; ?>
</div>
<?php $numerado++; ?> 
<?php endwhile; } ?> 
<?php else : ?>
<div class="nodata">
<?php _e('No data available','mundothemes'); ?>
</div>
<?php endif; ?>
</div>