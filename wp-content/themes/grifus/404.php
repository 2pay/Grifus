<?php get_header(); ?>
<?php /* ===============  404  ===============   */ ?>
<div id="<?php echo get_option('edd_sample_theme_license_key'); ?>" class="no_contenido">
<span style="font-size: 45px;font-weight: bold;">ERROR 404</span>
<br>
<?php _e('No content available', 'mundothemes'); ?> 
</div>
<?php if(get_option('edd_sample_theme_license_key')) { $estrenos = get_option('activar-estrenos'); if ($estrenos == "true") { include("includes/funciones/estrenos.php"); } else { include("includes/funciones/random.php"); } } ?>
<?php /*  ===============  404 ===============   */ ?>
<?php get_footer(); ?>