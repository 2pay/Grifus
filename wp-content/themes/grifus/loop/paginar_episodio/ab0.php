<?php 
// This is the first episode of season.
echo '<a class="navtv" href="'; bloginfo('url');
echo '/';
echo get_option('episodios-slug').'/';
echo sanitize_title(episodios_get_meta('serie')); 
echo '-';
echo episodios_get_meta('temporada')-1;
echo 'x';
echo '1';
echo '/">';
echo '<b class="icon-triangle-left2"></b>';
echo '</a>';
echo '<a class="navtv" href="'; bloginfo('url');
echo '/';
echo get_option('episodios-slug').'/';
echo sanitize_title(episodios_get_meta('serie')); 
echo '-';
echo episodios_get_meta('temporada').'x';
echo episodios_get_meta('episodio')+1;
echo '/">';
echo '<b class="icon-triangle-right2"></b>';
echo '</a>';
?>