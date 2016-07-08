<?php 
/*
Template Name: Add Movies
*/
get_header(); ?>
<!-- contenido -->
<div class="box">
<div class="header">
<?php 
/* sub-menu */
function_exists('wp_nav_menu') && has_nav_menu('menu_subheader' );
wp_nav_menu( array( 'theme_location' => 'menu_subheader', 'container' => '',  'menu_class' => '') );
?>
<div class="buscador">
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
<div class="imputo">
<input class="buscar" TYPE="text" placeholder="<?php _e('Search..', 'mundothemes'); ?>" name="s" id="s">
</div>
</form>
</div>
</div>
<div class="box_item">
<div class="peliculas">
<?php 
if($_GET['mt']) { 
require_once "includes/single/formularios/recaptchalib.php";
     $siteKey = get_option('public_key_rcth');
     $secret = get_option('private_key_rcth');
     $lang = "es";
     $resp = null;
     $error = null;
     $reCaptcha = new ReCaptcha($secret);
if ($_POST["g-recaptcha-response"]) {
    $resp = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
if ($resp != null && $resp->success) { 
include_once 'includes/funciones/posting.php';  ?>
<div class="aviso verde">
<div class="icon"><b class="icon-checkmark"></b></div>
<div class="contenido">
<span><?php _e('Movie sent','mundothemes'); ?></span>
<?php _e('Excellent, the data has been sent.','mundothemes'); ?></div>
</div>
<?php } else { ?>
<div class="aviso rojo">
<div class="icon"><b class="icon-notice"></b></div>
<div class="contenido">
<span><?php _e('Error','mundothemes'); ?></span>
<?php _e('Your publication could not be processed', 'mundothemes'); ?>, <a href="javascript:history.back()"><?php _e('Try again', 'mundothemes'); ?></a></div>
</div>
<?php } } ?>
<?php agregar_movie(); ?>
</div>
<div class="lateral">
<div id="fixer2">
<a class="add_movie" href="<?php bloginfo('url'); ?>"><b class="icon-home"></b> <?php _e('Back','mundothemes'); ?></a>
<div class="categorias">
<h3><?php _e('Genres','mundothemes'); ?> <span class="icon-sort"></span></h3>
<ul class="scrolling cat">
<?php categorias(); ?>
</ul>
</div>
<div class="filtro_y">
<h3><?php _e('Release year','mundothemes'); ?> <span class="icon-sort"></span></h3>
<ul class="scrolling">
<?php
$cc = date('Y');
$cd = date('Y')-51; 
foreach (range($cc, $cd) as $número) { ?>
<li><a class="ito" HREF="<?php bloginfo('url'); ?>/<?php echo get_option('year'); ?>/<?php echo $número; ?>"><?php echo $número; ?></a></li>
<?php } ?>
</ul>
</div>
</div>
</div>
</div>
</div>
<!-- Contenido -->
<?php  get_footer(); ?>