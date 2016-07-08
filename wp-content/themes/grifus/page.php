<?php get_header(); ?>
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

<div id="revel2" class="skl">
<?php slk(); ?>
</div>


<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<h1><?php the_title(); ?></h1>
<div class="entry-content pagess">
<?php the_content(); ?>
</div>

<?php endwhile; ?>						
<?php else : ?>
<?php _e('No content available', 'mundothemes'); ?>
<?php endif; ?>

<?php $activar = get_option('activar-com-pages'); if ($activar == "true") { include_once 'includes/single/comentarios.php'; } ?>



</div>

<div class="lateral">
<div id="fixer2">
<?php laterales(); ?>
</div>
</div>
</div>
</div>
<!-- Contenido -->
<?php  get_footer(); ?>