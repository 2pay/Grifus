<?php
function pagination($pages = '', $range = 2) { 
	$showitems = ($range * 2)+1;
	global $paged; if(empty($paged)) $paged = 1;
	if($pages == '') {
		global $wp_query; $pages = $wp_query->max_num_pages; 
		if(!$pages){ $pages = 1; } 
	}
	if(1 != $pages) { 
		echo "<div class='paginado'><ul>";
		
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
			echo "<li><a class=previouspostslink' rel='nofollow' href='".get_pagenum_link(1)."'>".__( 'First', 'mundothemes' )."</a></li>";	
		if($paged > 1 && $showitems < $pages) 
			echo "";
		for ($i=1; $i <= $pages; $i++){ 
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) { 
				echo ($paged == $i)? "<li class='dd'><a class='current'>".$i."</a></li>":"<li><a rel='nofollow' class='page larger' href='".get_pagenum_link($i)."'>".$i."</a></li>";
			} 
		} 
		if ($paged < $pages && $showitems < $pages) 
			
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
			echo "<li><a rel='nofollow' class=previouspostslink' href='".get_pagenum_link($pages)."'>".__( 'Last', 'mundothemes' )."</a></li>";
			echo "</ul></div>"; 
	}
}