<?php 
# Single Episodes
if(get_post_type( get_the_ID() ) ==  'episodes') {
	get_template_part('loop/single-episodes');
}	
# Single Series
elseif (get_post_type( get_the_ID() ) ==  'tvshows') {
	get_template_part('loop/single-tvshows');
}
# Single Noticias
elseif (get_post_type( get_the_ID() ) ==  'noticias') {
	get_template_part('loop/single-noticias');
} else { 
	$dato = $_GET['print']; if ($dato == "true") { 
		// modo de impresion
		include_once 'includes/single/movies_print.php'; 
			} else { 
        // modo pelicula
		include_once 'includes/single/movies.php'; 
		}
	}
?>