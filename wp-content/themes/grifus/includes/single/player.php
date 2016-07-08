<?php if($player1 = get_post_custom_values("embed_pelicula")) { ?> 
<div id="player2">
<?php $activar = get_option('activar-fake'); if ($activar == "true") { ?>
<div id="div1" style="display: block;">
<?php
$numero = get_option('enlaces-fake');
$random = rand(1,$numero);
$url = array();
$url[1] = get_option('fake-link-1');
$url[2] = get_option('fake-link-2');
$url[3] = get_option('fake-link-3');
$url[4] = get_option('fake-link-4');
$url[5] = get_option('fake-link-5');
$url[6] = get_option('fake-link-6');
$url[7] = get_option('fake-link-7');
$url[8] = get_option('fake-link-8');
$url[9] = get_option('fake-link-9');
$url[10] = get_option('fake-link-10');
?>
<div id="pbar_outerdiv" class="fake_player">
<?php if($values = get_post_custom_values("fondo_player")) { ?>
<img class="cover" src="<?php echo $values[0]; ?>" alt="<?php the_title(); ?>" />
<?php } else { ?>
<img class="cover" src="<?php echo get_template_directory_uri(); ?>/images/player_<?php echo rand(1,2);?>.jpg" alt="<?php the_title(); ?>" />
<?php } ?>	
<a href="<?php echo $url[$random] ;?>" target="_blank">
<section>
<span class="barra"><span class="progreso" id="pbar_innerdiv"></span></span>
<span class="controles">
<b class="aa icon-controller-play"></b>
<b class="bb icon-volume_up"></b>
<i><?php the_title(); ?> <?php if($values = get_post_custom_values("Runtime")) { ?><span><?php echo $values[0]; ?></span><?php } ?> </i>
<b class="cc icon-crop_free"></b>
<?php $activar = get_option('activar-fake-logo'); if ($activar == "true") { ?>
<b class="logo">
<?php $logo = get_option('img-fake-logo');if (!empty($logo)) { ?>
<img src="<?php echo $logo; ?>" alt="<?php bloginfo('name') ?>" />
<?php } else { ?>
<?php $logo = get_option('general-logo');if (!empty($logo)) { ?>
<img src="<?php echo $logo; ?>" alt="<?php bloginfo('name') ?>" />
<?php } else { ?>
<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name') ?>" />
<?php } } ?>
</b>
<?php } ?>
</span>
</section>
</a>
</div>
</div>
<?php } ?>
<?php if($player1 = get_post_custom_values("embed_pelicula")) { ?> 
<div id="div2" <?php $activar = get_option('activar-fake'); if ($activar == "true") { } else { ?>style="display: block;"<?php } ?>>
<div class="movieplay">
<?php echo do_shortcode($player1[0]); ?>
</div>
</div>
<?php } if($player2 = get_post_custom_values("embed_pelicula2")) { ?> 
<div id="div3">
<div class="movieplay">
<?php echo do_shortcode($player2[0]); ?>
</div> 
</div> 
<?php } if($player3 = get_post_custom_values("embed_pelicula3")) { ?> 
<div id="div4">
<div class="movieplay">
<?php echo do_shortcode($player3[0]); ?>
</div> 
</div> 
<?php } if($player4 = get_post_custom_values("embed_pelicula4")) { ?> 
<div id="div5">
<div class="movieplay">
<?php echo do_shortcode($player4[0]); ?>
</div> 
</div> 
<?php } if($player5 = get_post_custom_values("embed_pelicula5")) { ?> 
<div id="div6">
<div class="movieplay">
<?php echo do_shortcode($player5[0]); ?>
</div> 
</div> 
<?php } if($player6 = get_post_custom_values("embed_pelicula6")) { ?> 
<div id="div7">
<div class="movieplay">
<?php echo do_shortcode($player6[0]); ?>
</div> 
</div> 
<?php } if($player7 = get_post_custom_values("embed_pelicula7")) { ?> 
<div id="div8">
<div class="movieplay">
<?php echo do_shortcode($player7[0]); ?>
</div> 
</div> 
<?php } if($player8 = get_post_custom_values("embed_pelicula8")) { ?> 
<div id="div9">
<div class="movieplay">
<?php echo do_shortcode($player8[0]); ?>
</div> 
</div> 
<?php } ?>
</div>
<div class="player_nav">
<ul class="idTabs">
<?php $activar = get_option('activar-fake'); if ($activar == "true") { ?><li><a href="#div1" class="selected">Ads</a></li><?php } ?>
<?php if($player1 = get_post_custom_values("embed_pelicula")) { ?>
<li>
<a href="#div2" <?php $activar = get_option('activar-fake'); if ($activar == "true") { } else { ?>class="selected"<?php } ?>>
<?php if($values = get_post_custom_values("titulo_repro1")) { echo $values[0]; } else { echo _e('Option 1', 'mundothemes'); } ?>
</a>
</li>
<?php } ?>
<?php if($player2 = get_post_custom_values("embed_pelicula2")) { ?>
<li><a href="#div3"><?php if($values = get_post_custom_values("titulo_repro2")) { echo $values[0]; } else { echo _e('Option 2', 'mundothemes'); } ?></a></li>
<?php }  ?>
<?php if($player3 = get_post_custom_values("embed_pelicula3")) { ?>
<li><a href="#div4"><?php if($values = get_post_custom_values("titulo_repro3")) { echo $values[0]; } else { echo _e('Option 3', 'mundothemes'); } ?></a></li>
<?php } ?> 
<?php if($player4 = get_post_custom_values("embed_pelicula4")) { ?>
<li><a href="#div5"><?php if($values = get_post_custom_values("titulo_repro4")) { echo $values[0]; } else { echo _e('Option 4', 'mundothemes'); } ?></a></li>
<?php } ?>
<?php if($player5 = get_post_custom_values("embed_pelicula5")) { ?>
<li><a href="#div6"><?php if($values = get_post_custom_values("titulo_repro5")) { echo $values[0]; } else { echo _e('Option 5', 'mundothemes'); } ?></a></li>
<?php } ?>
<?php if($player6 = get_post_custom_values("embed_pelicula6")) { ?>
<li><a href="#div7"><?php if($values = get_post_custom_values("titulo_repro6")) { echo $values[0]; } else { echo _e('Option 6', 'mundothemes'); } ?></a></li>
<?php } ?>
<?php if($player7 = get_post_custom_values("embed_pelicula7")) { ?>
<li><a href="#div8"><?php if($values = get_post_custom_values("titulo_repro7")) { echo $values[0]; } else { echo _e('Option 7', 'mundothemes'); } ?></a></li>
<?php } ?>
<?php if($player8 = get_post_custom_values("embed_pelicula8")) { ?>
<li><a href="#div9"><?php if($values = get_post_custom_values("titulo_repro8")) { echo $values[0]; } else { echo _e('Option 8', 'mundothemes'); } ?></a></li>
<?php } ?>
</ul>
</div>
<?php } else { ?>
<?php $activar = get_option('activar-fake'); if ($activar == "true") { ?>
<div id="player2">
<div id="div1" style="display: block;">
<?php
$numero = get_option('enlaces-fake');
$random = rand(1,$numero);
$url = array();
$url[1] = get_option('fake-link-1');
$url[2] = get_option('fake-link-2');
$url[3] = get_option('fake-link-3');
$url[4] = get_option('fake-link-4');
$url[5] = get_option('fake-link-5');
$url[6] = get_option('fake-link-6');
$url[7] = get_option('fake-link-7');
$url[8] = get_option('fake-link-8');
$url[9] = get_option('fake-link-9');
$url[10] = get_option('fake-link-10');
?>
<div id="pbar_outerdiv" class="fake_player">
<?php if($values = get_post_custom_values("fondo_player")) { ?>
<img class="cover" src="<?php echo $values[0]; ?>" alt="<?php the_title(); ?>" />
<?php } else { ?>
<img class="cover" src="<?php echo get_template_directory_uri(); ?>/images/player_<?php echo rand(1,2);?>.jpg" alt="<?php the_title(); ?>" />
<?php } ?>	
<span id="pbar_innertext" class="play_tiempo"></span>
<a href="<?php echo $url[$random] ;?>" target="_blank">
<section>
<span class="barra"><span id="pbar_innerdiv" class="progreso"></span><span id="pbar_innerdiv2" class="played"></span></span>
<span class="controles">
<b class="aa icon-controller-play"></b>
<b class="bb icon-volume_up"></b>
<i><?php the_title(); ?> <?php if($values = get_post_custom_values("Runtime")) { ?><span><?php echo $values[0]; ?></span><?php } ?> </i>
<b class="cc icon-crop_free"></b>
<?php $activar = get_option('activar-fake-logo'); if ($activar == "true") { ?>
<b class="logo">
<?php $logo = get_option('img-fake-logo');if (!empty($logo)) { ?>
<img src="<?php echo $logo; ?>" alt="<?php bloginfo('name') ?>" />
<?php } else { ?>
<?php $logo = get_option('general-logo');if (!empty($logo)) { ?>
<img src="<?php echo $logo; ?>" alt="<?php bloginfo('name') ?>" />
<?php } else { ?>
<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name') ?>" />
<?php } } ?>
</b>
<?php } ?>
</span>
</section>
</a>
</div>
</div>
</div>
<div class="player_nav">
<ul class="idTabs">
<li><a href="#div1" class="selected">Ads</a></li>
</ul>
</div>
<?php } ?>
<?php } ?>