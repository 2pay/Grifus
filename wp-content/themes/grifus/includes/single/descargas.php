<?php $movies = get_option('activar-descargas'); if ($movies == "true") { ?>
<div class="descargas">
<ul class="pver desx">
<li class="ver">
<span class="opci"><?php _e("Links", "mundothemes"); ?></span>
<span><?php _e("Server", "mundothemes"); ?></span>
<span><?php _e('Language', 'mundothemes') ?></span>
<span><?php _e("Format", "mundothemes"); ?></span>
</li>
<?php if($download = get_post_custom_values("descargas_link")) { echo $download[0]; } else { ?>
<li>
<a>
<span class="op"><?php _e('Download', 'mundothemes'); ?></span>
<span><?php _e('Not available', 'mundothemes'); ?></span>
<span><?php _e('Not available', 'mundothemes'); ?></span>
<span><?php _e('Not available', 'mundothemes'); ?></span>
</a>
</li>
<?php } ?>
</ul>
</div>
<?php }  ?>
<?php $movies = get_option('activar-acf'); if ($movies == "true") { ?>
<?php if( have_rows('ddw') ): ?>
<div class="enlaces_box">
<ul class="enlaces">
<li class="elemento cabe">
<span class=""><?php _e('Download Links','mundothemes'); ?> <i class="icon-caret-down"></i></span>
<span class=""><?php _e('Server','mundothemes'); ?> <i class="icon-caret-down"></i></span>
<span class=""><?php _e('Audio / Language','mundothemes'); ?> <i class="icon-caret-down"></i></span>
<span class=""><?php _e('Quality','mundothemes'); ?> <i class="icon-caret-down"></i></span>
</li>
</ul>
<ul class="enlaces">
<?php  $numerado = 1; { while( have_rows('ddw') ): the_row(); ?>
<a href="<?php echo get_sub_field('op1'); ?>" target="_blank">
<li class="elemento">
<span class="a">
<?php $css = get_option('activar-dark'); if ($css == "true") { ?>
<img src="<?php echo get_template_directory_uri(); ?>/images/download_1.png"> 
<?php } else { ?>
<img src="<?php echo get_template_directory_uri(); ?>/images/download_0.png"> 
<?php } ?>
<?php _e('Option','mundothemes'); ?> <?php echo $numerado; ?>
</span>
<span class="b">
<img src="http://www.google.com/s2/favicons?domain=<?php echo get_sub_field('op2'); ?>" alt="<?php echo get_sub_field('op2'); ?>"> 
<?php echo get_sub_field('op2'); ?>
</span>
<span class="c"><?php echo get_sub_field('op3'); ?></span>
<span class="d"><?php echo get_sub_field('op4'); ?></span>
</li>
</a>
<?php $numerado++; ?>
<?php endwhile; } ?>
</ul>
</div>
<?php endif; ?>
<?php if( have_rows('voo') ): ?>
<div class="enlaces_box">
<ul class="enlaces">
<li class="elemento cabe">
<span class=""><?php _e('View Online','mundothemes'); ?> <i class="icon-caret-down"></i></span>
<span class=""><?php _e('Server','mundothemes'); ?> <i class="icon-caret-down"></i></span>
<span class=""><?php _e('Audio / Language','mundothemes'); ?> <i class="icon-caret-down"></i></span>
<span class=""><?php _e('Quality','mundothemes'); ?> <i class="icon-caret-down"></i></span>
</li>
</ul>
<ul class="enlaces">
<?php  $numerado = 1; { while( have_rows('voo') ): the_row(); ?>
<a href="<?php echo get_sub_field('op1'); ?>" target="_blank">
<li class="elemento">
<span class="a">
<?php $css = get_option('activar-dark'); if ($css == "true") { ?>
<img src="<?php echo get_template_directory_uri(); ?>/images/play_1.png"> 
<?php } else { ?>
<img src="<?php echo get_template_directory_uri(); ?>/images/play_0.png"> 
<?php } ?>
<?php _e('Option','mundothemes'); ?> <?php echo $numerado; ?></span>
<span class="b">
<img src="http://www.google.com/s2/favicons?domain=<?php echo get_sub_field('op2'); ?>" alt="<?php echo get_sub_field('op2'); ?>"> 
<?php echo get_sub_field('op2'); ?>
</span>
<span class="c"><?php echo get_sub_field('op3'); ?></span>
<span class="d"><?php echo get_sub_field('op4'); ?></span>
</li>
</a>
<?php $numerado++; ?>
<?php endwhile; } ?>
</ul>
</div>
<?php endif; ?>
<?php } ?>