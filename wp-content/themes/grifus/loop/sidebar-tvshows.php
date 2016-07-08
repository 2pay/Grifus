<!-- menu -->
<?php $active = get_option('tvmodule'); if ($active == "true") { ?>
<div class="movserie">
<ul class="idTabs">
<li><a href="#serieshome" class="selected"><?php _e('Series TV','mundothemes'); ?></a></li>
<li><a href="#moviehome"><?php _e('Movies','mundothemes'); ?></a></li>
</ul>
</div>
<?php } ?>

<?php $active = get_option('tvmodule'); if ($active == "true") { ?>
<!-- Series Menu -->
<div id="serieshome" style="display: block;">
<div class="categorias">
<h3><?php _e('Genres','mundothemes'); ?> <span class="icon-sort"></span></h3>
<ul class="scrolling cat">
<?php categorias_tv(); ?>
</ul>
</div>
<div class="filtro_y">
<h3><?php _e('Release year','mundothemes'); ?> <span class="icon-sort"></span></h3>
<ul class="scrolling">
<?php $args = array('order' => DESC ,'number' => 50); $camel = 'tvyear'; $tax_terms = get_terms($camel,$args);  ?>
<?php foreach ($tax_terms as $tax_term) { echo '<li>' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '">' . $tax_term->name.'</a></li>'; } ?>
</ul>
</div>
</div>
<?php } ?>
<!-- Movies -->
<div id="moviehome" <?php $active = get_option('tvmodule'); if ($active == "true") {  } else { echo 'style="display: block;"'; }?> >
<div class="categorias">
<h3><?php _e('Genres','mundothemes'); ?> <span class="icon-sort"></span></h3>
<ul class="scrolling cat">
<?php categorias(); ?>
</ul>
</div>
<div class="filtro_y">
<h3><?php _e('Release year','mundothemes'); ?> <span class="icon-sort"></span></h3>
<ul class="scrolling">
<?php $args = array('order' => DESC ,'number' => 50); $camel = get_option('year'); $tax_terms = get_terms($camel,$args);  ?>
<?php foreach ($tax_terms as $tax_term) { echo '<li>' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '">' . $tax_term->name.'</a></li>'; } ?>
</ul>
</div>
</div>
<div class="filtro_y">
<h3><?php _e('Quality','mundothemes'); ?> <span class="icon-sort"></span></h3>
<ul class="scrolling" style="max-height: 87px;">
<?php $camel = get_option('calidad'); $tax_terms = get_terms($camel);  ?>
<?php foreach ($tax_terms as $tax_term) { echo '<li>' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '">' . $tax_term->name.'</a></li>'; } ?>
</ul>
</div>