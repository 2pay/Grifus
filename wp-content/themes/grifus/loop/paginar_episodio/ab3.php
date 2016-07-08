<?php 
// This is the last episode of the last season.
echo '<a class="navtv" href="'; bloginfo('url');
echo '/';
echo get_option('episodios-slug').'/';
echo sanitize_title(episodios_get_meta('serie')); 
echo '-';
echo episodios_get_meta('temporada').'x';
echo episodios_get_meta('episodio')-1;
echo '/">';
echo '<b class="icon-triangle-left2"></b>';
echo '</a>';
?>