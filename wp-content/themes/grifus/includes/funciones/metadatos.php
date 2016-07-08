<?php
function info_movie_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}
function info_movie_add_meta_box() {
	add_meta_box(
		'info_movie-info-movie',
		__('Movie Info', 'mundothemes'),
		'info_movie_html',
		'post',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'info_movie_add_meta_box' );
function info_movie_html( $post) {
wp_nonce_field( '_info_movie_nonce', 'info_movie_nonce' ); ?>
<p>
<input class="mt" type="text" name="Checkbx2" id="Checkbx2" value="<?php echo info_movie_get_meta( 'Checkbx2' ); ?>">
<input type="button" class="button button-primary button-large mtmm" name="Checkbx" value="<?php _e('Generate data from IMDb','mundothemes'); ?>">
<br>
<label class="mtt" for="id" style="font-weight: 300;"><?php _e('Assign ID IMDb, example (http://www.imdb.com/title/tt0120338/) = <b>tt0120338</b>', 'mundothemes'); ?></label>
</p>
<p>&nbsp;</p>

<div class="menus_mt_datos"><ul class="idTabs menuplayer">
<li><a href="#media" class="selected">Media</a></li>
<li><a href="#imdb">IMDb</a></li>
<li><a href="#tmdb">TMDb</a></li>
</ul></div>


<div id="media" class="separador" style="display: block;">

<p class="upmedia">
<label class="mtt" for="poster_url"><?php _e( 'URL Poster (optional)', 'mundothemes' ); ?></label><br>
<input class="mt upbb" type="text" name="poster_url" id="poster_url" value="<?php echo info_movie_get_meta( 'poster_url' ); ?>">
<input id="boton" class="up_images upaa button-primary" type="button" value="<?php _e('Upload', 'mundothemes'); ?>" />
</p>
<p class="upmedia">
<label class="mtt upbb" for="fondo_player"><?php _e( 'Main Backdrop', 'mundothemes' ); ?></label><br>
<input class="mt upbb" type="text" name="fondo_player" id="fondo_player" value="<?php echo info_movie_get_meta( 'fondo_player' ); ?>">
<input id="boton" class="up_images upaa button-primary" type="button" value="<?php _e('Upload', 'mundothemes'); ?>" />
</p>
<p class="upmedia">
<label class="mtt" for="imagenes"><?php _e( 'Backdrops - Place each image url below another', 'mundothemes' ); ?></label><br>
<textarea class="mttt upbb" name="imagenes" id="imagenes"><?php echo info_movie_get_meta( 'imagenes' ); ?></textarea>
<input id="boton" class="up_images upaa button-primary" type="button" value="<?php _e('Upload', 'mundothemes'); ?>" />
</p>	
<p>
<label class="mtt" for="youtube_id"><?php _e( 'Trailer ID Youtube', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="youtube_id" id="youtube_id" value="<?php echo info_movie_get_meta( 'youtube_id' ); ?>">
</p>
</div>
<div id="imdb" class="separador">
<p>
<label class="mtt" for="imdbRating"><?php _e( 'IMDB Rating', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="imdbRating" id="imdbRating" value="<?php echo info_movie_get_meta( 'imdbRating' ); ?>">
</p>
<p>
<label class="mtt" for="imdbVotes"><?php _e( 'IMDB votes', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="imdbVotes" id="imdbVotes" value="<?php echo info_movie_get_meta( 'imdbVotes' ); ?>">
</p>
<p>
<label class="mtt" for="Title"><?php _e( 'Original title', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="Title" id="Title" value="<?php echo info_movie_get_meta( 'Title' ); ?>">
</p>
<p>
<label class="mtt" for="Rated"><?php _e( 'Rated', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="Rated" id="Rated" value="<?php echo info_movie_get_meta( 'Rated' ); ?>">
</p>
<p>
<label class="mtt" for="Released"><?php _e( 'Release Date', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="Released" id="Released" value="<?php echo info_movie_get_meta( 'Released' ); ?>">
</p>
<p>
<label class="mtt" for="Runtime"><?php _e( 'Runtime', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="Runtime" id="Runtime" value="<?php echo info_movie_get_meta( 'Runtime' ); ?>">
</p>
<p>
<label class="mtt" for="Awards"><?php _e( 'Awards', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="Awards" id="Awards" value="<?php echo info_movie_get_meta( 'Awards' ); ?>">
</p>
<p>
<label class="mtt" for="Country"><?php _e( 'Country', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="Country" id="Country" value="<?php echo info_movie_get_meta( 'Country' ); ?>">
</p>
</div>
<div id="tmdb" class="separador">
<p>
<label class="mtt" for="vote_average"><?php _e( 'TMDb Rating', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="vote_average" id="vote_average" value="<?php echo info_movie_get_meta( 'vote_average' ); ?>">
</p>
<p>
<label class="mtt" for="vote_count"><?php _e( 'TMDb votes', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="vote_count" id="vote_count" value="<?php echo info_movie_get_meta( 'vote_count' ); ?>">
</p>
<p>
<label class="mtt" for="budget"><?php _e( 'Budget', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="budget" id="budget" value="<?php echo info_movie_get_meta( 'budget' ); ?>">
</p>
<p>
<label class="mtt" for="revenue"><?php _e( 'Revenue', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="revenue" id="revenue" value="<?php echo info_movie_get_meta( 'revenue' ); ?>">
</p>
<p>
<label class="mtt" for="popularity"><?php _e( 'Popularity', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="popularity" id="popularity" value="<?php echo info_movie_get_meta( 'popularity' ); ?>">
</p>
<p>
<label class="mtt" for="id"><?php _e( 'TMDb ID', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="id" id="id" value="<?php echo info_movie_get_meta( 'id' ); ?>">
</p>
<p>
<label class="mtt" for="status"><?php _e( 'Status', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="status" id="status" value="<?php echo info_movie_get_meta( 'status' ); ?>">
</p>
<p>
<label class="mtt" for="tagline"><?php _e( 'Tag line', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="tagline" id="tagline" value="<?php echo info_movie_get_meta( 'tagline' ); ?>">
</p>
</div>
<?php }
function info_movie_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['info_movie_nonce'] ) || ! wp_verify_nonce( $_POST['info_movie_nonce'], '_info_movie_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;
/*  Guardar datos */
    if ( isset( $_POST['Checkbx2'] ) ) update_post_meta( $post_id, 'Checkbx2', esc_attr( $_POST['Checkbx2'] ) );
	if ( isset( $_POST['poster_url'] ) ) update_post_meta( $post_id, 'poster_url', esc_attr( $_POST['poster_url'] ) );
	if ( isset( $_POST['fondo_player'] ) ) update_post_meta( $post_id, 'fondo_player', esc_attr( $_POST['fondo_player'] ) );
	if ( isset( $_POST['imagenes'] ) ) update_post_meta( $post_id, 'imagenes', esc_attr( $_POST['imagenes'] ) );
	if ( isset( $_POST['youtube_id'] ) ) update_post_meta( $post_id, 'youtube_id', esc_attr( $_POST['youtube_id'] ) );
	if ( isset( $_POST['imdbRating'] ) ) update_post_meta( $post_id, 'imdbRating', esc_attr( $_POST['imdbRating'] ) );
	if ( isset( $_POST['imdbVotes'] ) ) update_post_meta( $post_id, 'imdbVotes', esc_attr( $_POST['imdbVotes'] ) );
	if ( isset( $_POST['Title'] ) ) update_post_meta( $post_id, 'Title', esc_attr( $_POST['Title'] ) );
	if ( isset( $_POST['Rated'] ) ) update_post_meta( $post_id, 'Rated', esc_attr( $_POST['Rated'] ) );
	if ( isset( $_POST['Released'] ) ) update_post_meta( $post_id, 'Released', esc_attr( $_POST['Released'] ) );
	if ( isset( $_POST['Runtime'] ) ) update_post_meta( $post_id, 'Runtime', esc_attr( $_POST['Runtime'] ) );
	if ( isset( $_POST['Awards'] ) ) update_post_meta( $post_id, 'Awards', esc_attr( $_POST['Awards'] ) );
	if ( isset( $_POST['Country'] ) ) update_post_meta( $post_id, 'Country', esc_attr( $_POST['Country'] ) );
	if ( isset( $_POST['vote_average'] ) ) update_post_meta( $post_id, 'vote_average', esc_attr( $_POST['vote_average'] ) );
	if ( isset( $_POST['vote_count'] ) ) update_post_meta( $post_id, 'vote_count', esc_attr( $_POST['vote_count'] ) );
	if ( isset( $_POST['budget'] ) ) update_post_meta( $post_id, 'budget', esc_attr( $_POST['budget'] ) );
	if ( isset( $_POST['revenue'] ) ) update_post_meta( $post_id, 'revenue', esc_attr( $_POST['revenue'] ) );
	if ( isset( $_POST['popularity'] ) ) update_post_meta( $post_id, 'popularity', esc_attr( $_POST['popularity'] ) );
	if ( isset( $_POST['id'] ) ) update_post_meta( $post_id, 'id', esc_attr( $_POST['id'] ) );
	if ( isset( $_POST['status'] ) ) update_post_meta( $post_id, 'status', esc_attr( $_POST['status'] ) );
	if ( isset( $_POST['tagline'] ) ) update_post_meta( $post_id, 'tagline', esc_attr( $_POST['tagline'] ) );

}
add_action( 'save_post', 'info_movie_save' );
function custom_admin_js() { 
global $post_type; if( $post_type == 'post' ) {	?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js?ver=2.1.4"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/includes/framework/js/idtabstbb.js"></script>
<script>
	$('input[name=Checkbx]').click(function() {
	var coc = $('input[name=Checkbx2]').get(0).value;
	// Send Request
    $.getJSON("https://www.omdbapi.com/?i=" + coc + "", function(data) {
	    var valDir = "";
		var valWri = "";
		var valAct = "";	
		$.each(data, function(key, val) {
			  $('input[name=' +key+ ']').val(val); 
			  if(key == "Director"){
				valDir+= " "+val+",";
			  }	  
			  if(key == "Actors"){
				valAct+= " "+val+",";
			  }
			  if(key == "Year"){
				$('#new-tag-<?php echo get_option('year'); ?>').val(val);
			  }
		});
		$('#new-tag-<?php echo get_option("director"); ?>').val(valDir);
		$('#new-tag-<?php echo get_option("actor"); ?>').val(valAct);
	}); 
});
</script> 
<?php $api = get_option('tmdbapi'); if ($api == "true") { ?>
<script>
	$('input[name=Checkbx]').click(function() {
	var input = $('input[name=Checkbx2]').get(0).value;
	var url = "https://api.themoviedb.org/3/movie/";
	var agregar = "?append_to_response=images,trailers";
	var idioma = "&language=<?php echo get_option('tmdbidioma') ?>&include_image_language=<?php echo get_option('tmdbidioma')?>,null";
	var apikey = "&api_key=<?php echo get_option('tmdbkey')?>";
	// Send Request
    $.getJSON( url + input + agregar + idioma + apikey, function(tmdbdata) {   
		var valTit = "";
		var valPlo = "";
		var valImg = "";
		var valBac = "";
		$.each(tmdbdata, function(key, val) {
			  $('input[name=' +key+ ']').val(val); 
			  
			  if(key == "title"){
				valTit+= ""+val+"";
			  }
			  if(key == "overview"){
				valPlo+= ""+val+"";
			  }
			  if(key == "poster_path"){
				valImg+= "https://image.tmdb.org/t/p/w185"+val+"";
			  }
			  if(key == "backdrop_path"){
				valBac+= "https://image.tmdb.org/t/p/w780"+val+"";
			  }
<?php $api = get_option('apigenero'); if ($api == "true") { ?>
if(key == "genres"){
			var genr = "";
			$.each( tmdbdata.genres, function( i, item ) {
       	 		genr += "" + item.name + ", ";
				genr1 = item.name;
				$('input[name=newcategory]').val( genr1 );
				$('#category-add-submit').trigger('click');
				 $('#category-add-submit').prop("disabled", false);
				$('input[name=newcategory]').val("");
    		});
			$('input[name=' +key+ ']').val( genr );
		}	
<?php } ?>
if(key == "trailers"){
			var tral = "";
			$.each( tmdbdata.trailers.youtube, function( i, item ) {
       	 		tral += "[" + item.source + "]";
    		});
			$('input[name="youtube_id"]').val( tral );
}
if(key == "images"){
			var imgt = "";
			$.each( tmdbdata.images.backdrops, function( i, item ) {
				imgt += "https://image.tmdb.org/t/p/w300" + item.file_path + "\n";	
    		});
			$('textarea[name="imagenes"]').val( imgt );
}



$.getJSON( url + input + "/credits?" + apikey, function(tmdbdata) {
	$.each(tmdbdata, function(key, val) {
		if(key == "cast"){
			var valCast = "";
			$.each( tmdbdata.cast, function( i, item ) {
			valCast += "" + item.name + ", "; //
		});
			$('#new-tag-<?php echo get_option("elenco"); ?>').val( valCast );
		} else {
			var crew_d = crew_dl = "";
			var crew_w = crew_wl = "";	
		}
	});
});
		});
		$('#title').val(valTit);
		$('#content').val(valPlo);
		$('#poster_url').val(valImg);
		$('#fondo_player').val(valBac);
	}); 
});
</script>
<?php 
  }
} }
add_action('admin_footer', 'custom_admin_js');
$sp_boxes = array ( 

/* Player Embeds */
__('Players', 'mundothemes') => array (
array( 'menuplay', 'menuplay', 'playermenu' ),
array( 'sepa1', 'separa', 'separame' ),
array( 'embed_pelicula', __('Embed code', 'mundothemes'), 'textarea' ),
array( 'titulo_repro1', __('Title player', 'mundothemes') ),
array( 'Separador', 'separa', 'fin' ),
array( 'sepa2', 'separa', 'separame' ),
array( 'embed_pelicula2', __('Embed code', 'mundothemes'), 'textarea' ),
array( 'titulo_repro2', __('Title player', 'mundothemes') ),
array( 'Separador', 'separa', 'fin' ),
array( 'sepa3', 'separa', 'separame' ),
array( 'embed_pelicula3', __('Embed code', 'mundothemes'), 'textarea' ),
array( 'titulo_repro3', __('Title player', 'mundothemes') ),
array( 'Separador', 'separa', 'fin' ),
array( 'sepa4', 'separa', 'separame' ),
array( 'embed_pelicula4', __('Embed code', 'mundothemes'), 'textarea' ),
array( 'titulo_repro4', __('Title player', 'mundothemes') ),
array( 'Separador', 'separa', 'fin' ),
array( 'sepa5', 'separa', 'separame' ),
array( 'embed_pelicula5', __('Embed code', 'mundothemes'), 'textarea' ),
array( 'titulo_repro5', __('Title player', 'mundothemes') ),
array( 'Separador', 'separa', 'fin' ),
array( 'sepa6', 'separa', 'separame' ),
array( 'embed_pelicula6', __('Embed code', 'mundothemes'), 'textarea' ),
array( 'titulo_repro6', __('Title player', 'mundothemes') ),
array( 'Separador', 'separa', 'fin' ),
array( 'sepa7', 'separa', 'separame' ),
array( 'embed_pelicula7', __('Embed code', 'mundothemes'), 'textarea' ),
array( 'titulo_repro7', __('Title player', 'mundothemes') ),
array( 'Separador', 'separa', 'fin' ),
array( 'sepa8', 'separa', 'separame' ),
array( 'embed_pelicula8', __('Embed code', 'mundothemes'), 'textarea' ),
array( 'titulo_repro8', __('Title player', 'mundothemes') ),
array( 'Separador', 'separa', 'fin' ),
),
/* download player */
/* __('Downloads', 'mundothemes') => array (
array( 'descargas_link', __('HTML Code links downloads', 'mundothemes'), 'textarea' ),
),*/

);
add_action( 'admin_menu', 'sp_add_custom_box' );
add_action( 'save_post', 'sp_save_postdata', 1, 2 );
function sp_add_custom_box() {
global $sp_boxes;
if ( function_exists( 'add_meta_box' ) ) {
foreach ( array_keys( $sp_boxes ) as $box_name ) {
add_meta_box( $box_name, __( $box_name, 'sp' ), 'sp_post_custom_box', 'post', 'normal', 'high' );
} } }
function sp_post_custom_box ( $obj, $box ) {
global $sp_boxes;
static $sp_nonce_flag = false;
if ( ! $sp_nonce_flag ) {
echo_sp_nonce();
$sp_nonce_flag = true;
}
foreach ( $sp_boxes[$box['id']] as $sp_box ) {
echo field_html( $sp_box );
} }
function field_html ( $args ) {
switch ( $args[2] ) {
case 'textarea':
return text_area( $args );
case 'separame':
return sepa_1( $args );
case 'fin':
return sepa_2( $args );
case 'jqueryp':
return jqueryplus( $args );
case 'playermenu':
return menuplay( $args );
case 'menudata':
return menudatos( $args );
case 'checkbox':
case 'radio':
case 'button':
case 'text':
return text_button( $args );
case 'submit':
default:
return text_field( $args );
} }
function text_field ( $args ) {
global $post;
$args[2] = get_post_meta($post->ID, $args[0], true);
$args[1] = __($args[1], 'sp' );
$label_format =
'<label class="mtt" for="%1$s">%2$s</label>'
. '<input class="mt" type="text" id="%1$s" name="%1$s" value="%3$s" />';
return vsprintf( $label_format, $args );
}
function text_button ( $args ) {
$label_format = '<input type="button" class="button button-primary button-large mtmm" name="Checkbx" value="'.__("Generate data from IMDb","mundothemes").'" />';
return vsprintf( $label_format, $args );
}
function text_area ( $args ) {
global $post;
$args[2] = get_post_meta($post->ID, $args[0], true);
$args[1] = __($args[1], 'sp' );
$label_format =
'<label  class="mtt" for="%1$s">%2$s</label>'
. '<textarea class="mttt" name="%1$s">%3$s</textarea>';
return vsprintf( $label_format, $args );
}
function sepa_1 ( $args ) {
global $post;
$args[2] = get_post_meta($post->ID, $args[0], true);
$args[1] = __($args[1], 'sp' );
$label_format = '<div id="%1$s" class="separador">';
return vsprintf( $label_format, $args );
}
function sepa_2 ( $args ) {
global $post;
$args = "";
$label_format = '</div>';
return vsprintf( $label_format, $args );
}
function jqueryplus ( $args ) {
global $post;
$args = "";
$label_format = '
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js?ver=2.1.3"></script>
<script type="text/javascript" src=" '.get_stylesheet_directory_uri().'/includes/framework/js/idtabstbb.js"></script>
';
return vsprintf( $label_format, $args );
}
function menuplay ( $args ) {
global $post;
$args = "";
$label_format = '<div class="menus_mt_datos"><ul class="idTabs menuplayer">
<li><a href="#sepa1" class="selected">'. __('Option 1', 'mundothemes') .'</a></li>
<li><a href="#sepa2">'. __('Option 2', 'mundothemes') .'</a></li>
<li><a href="#sepa3">'. __('Option 3', 'mundothemes') .'</a></li>
<li><a href="#sepa4">'. __('Option 4', 'mundothemes') .'</a></li>
<li><a href="#sepa5">'. __('Option 5', 'mundothemes') .'</a></li>
<li><a href="#sepa6">'. __('Option 6', 'mundothemes') .'</a></li>
<li><a href="#sepa7">'. __('Option 7', 'mundothemes') .'</a></li>
<li><a href="#sepa8">'. __('Option 8', 'mundothemes') .'</a></li>
</ul></div>';
return vsprintf( $label_format, $args );
}
function menudatos ( $args ) {
global $post;
$args = "";
$label_format = '<div class="menus_mt_datos"><ul class="idTabs menuplayer">
<li><a href="#media" class="selected">'. __('Media', 'mundothemes') .'</a></li>
<li><a href="#imdb">'. __('IMDb', 'mundothemes') .'</a></li>
<li><a href="#tmdb">'. __('TMDb', 'mundothemes') .'</a></li>
</ul></div>';
return vsprintf( $label_format, $args );
}
function sp_save_postdata($post_id, $post) {
global $sp_boxes;
if ( ! wp_verify_nonce( $_POST['sp_nonce_name'], plugin_basename(__FILE__) ) ) {
return $post->ID; }
if ( 'page' == $_POST['post_type'] ) {
if ( ! current_user_can( 'edit_page', $post->ID ))
return $post->ID;
} else {
if ( ! current_user_can( 'edit_post', $post->ID ))
return $post->ID; }
foreach ( $sp_boxes as $sp_box ) {
foreach ( $sp_box as $sp_fields ) {
$my_data[$sp_fields[0]] =  $_POST[$sp_fields[0]];
} }
foreach ($my_data as $key => $value) {
if ( 'revision' == $post->post_type  ) {
return; }
$value = implode(',', (array)$value);
if ( get_post_meta($post->ID, $key, FALSE) ) {
update_post_meta($post->ID, $key, $value);
} else {
add_post_meta($post->ID, $key, $value);
}
if (!$value) {
delete_post_meta($post->ID, $key);
} } }
function echo_sp_nonce () {
echo sprintf(
'<input type="hidden" name="%1$s" id="%1$s" value="%2$s" />',
'sp_nonce_name',
wp_create_nonce( plugin_basename(__FILE__) )
);
}
if ( !function_exists('get_custom_field') ) {
function get_custom_field($field) {
global $post;
$custom_field = get_post_meta($post->ID, $field, true);
echo $custom_field; } }
function logo_admin_wpRafael() {  ?>
<style type="text/css">
h1 a {
<?php $logo = get_option('wpadmin-logo');if (!empty($logo)) { ?>
background-image: url(<?php echo $logo; ?>) !important;
<?php } else { ?>
background-image: url(<?php echo get_template_directory_uri(); ?>/images/logo_admin.png) !important;
<?php } ?>
background-size: 301px 51px !important; 
width: 301px !important;
height: 51px !important;
}
</style>
<?php  } 
add_action('login_head', 'logo_admin_wpRafael');
function core_grifus() {
}
add_action('admin_footer', 'core_grifus'); 


function mostrar_trailer($id) {
	if (!empty($id)) { 
		$val = str_replace(
			array("[","]",),
			array('<div class="youtube_id"><iframe width="600" height="450" src="//www.youtube.com/embed/','" frameborder="0" allowfullscreen></iframe></div>',),$id);
		    echo $val;
		} 
}
function mostrar_trailer_meta($id) {
	if (!empty($id)) { 
		$val = str_replace(
			array("[","]",),
			array('<meta itemprop="embedUrl" content="https://www.youtube.com/embed/','">',),$id);
		    echo $val;
		} 
}
