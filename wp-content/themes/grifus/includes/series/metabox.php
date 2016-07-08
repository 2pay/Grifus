<?php
function series_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}
function series_add_meta_box() {
	add_meta_box(
		'series-series',
		__( 'TVShows Info', 'mundothemes' ),
		'series_html',
		'tvshows',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'series_add_meta_box' ); function series_html( $post) { wp_nonce_field( '_series_nonce', 'series_nonce' ); ?>
<p>
<input class="mt" type="text" name="id" id="id" value="<?php echo series_get_meta( 'id' ); ?>">
<input type="button" class="button button-primary button-large mtmm" name="generartv" value="<?php _e('Generate','mundothemes'); ?>">
<br>
<label class="mtt" for="id" style="font-weight: 300;"><a href="https://www.themoviedb.org/tv" target="_blank" rel="nofollow"><?php _e( 'Generate Data (TMDb)', 'mundothemes' ); ?></a> <span>https://www.themoviedb.org/tv/<b style="color:red">456</b>-the-simpsons</span></label>
</p>
<p>&nbsp;</p>
<div class="menus_mt_datos">
<ul class="idTabs menuplayer">
<li><a href="#datatv" class="selected"><?php _e('Data','mundothemes'); ?></a></li>
<li><a href="#mediatv"><?php _e('Media','mundothemes'); ?></a></li>
</ul>
</div>
<div id="datatv" class="separador">
<!-- ######################### -->
<p>
<label class="mtt" for="first_air_date"><?php _e( 'Firt air date', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="first_air_date" id="first_air_date" value="<?php echo series_get_meta( 'first_air_date' ); ?>">
</p>
<p>
<label class="mtt" for="last_air_date"><?php _e( 'Last air date', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="last_air_date" id="last_air_date" value="<?php echo series_get_meta( 'last_air_date' ); ?>">
</p>
<p>
<label class="mtt" for="number_of_episodes"><?php _e( 'Number of episodes', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="number_of_episodes" id="number_of_episodes" value="<?php echo series_get_meta( 'number_of_episodes' ); ?>">
</p>
<p>
<label class="mtt" for="number_of_seasons"><?php _e( 'Number of seasons', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="number_of_seasons" id="number_of_seasons" value="<?php echo series_get_meta( 'number_of_seasons' ); ?>">
</p>
<p>
<label class="mtt" for="original_name"><?php _e( 'Original Name', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="original_name" id="original_name" value="<?php echo series_get_meta( 'original_name' ); ?>">
</p>
<p>
<label class="mtt" for="status"><?php _e( 'Status', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="status" id="status" value="<?php echo series_get_meta( 'status' ); ?>">
</p>
<p>
<label class="mtt" for="serie_vote_average"><?php _e( 'Vote Average', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="serie_vote_average" id="serie_vote_average" value="<?php echo series_get_meta( 'serie_vote_average' ); ?>">
</p>
<p>
<label class="mtt" for="serie_vote_count"><?php _e( 'Vote Count', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="serie_vote_count" id="serie_vote_count" value="<?php echo series_get_meta( 'serie_vote_count' ); ?>">
</p>
<p>
<label class="mtt" for="episode_run_time"><?php _e( 'Episode runtime', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="episode_run_time" id="episode_run_time" value="<?php echo series_get_meta( 'episode_run_time' ); ?>">
</p>
<p>
<label class="mtt" for="homepage"><?php _e( 'Home Page', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="homepage" id="homepage" value="<?php echo series_get_meta( 'homepage' ); ?>">
</p>
<p>
<label class="mtt" for="popularity"><?php _e( 'Popularity', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="popularity" id="popularity" value="<?php echo series_get_meta( 'popularity' ); ?>">
</p>
<p>
<label class="mtt" for="type"><?php _e( 'Type', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="type" id="type" value="<?php echo series_get_meta( 'type' ); ?>">
</p>
<!-- ######################### -->
</div>

<div id="mediatv" class="separador">
<!-- ######################### -->
<p class="upmedia">
<label class="mtt" for="poster_url"><?php _e( 'Poster', 'mundothemes' ); ?></label><br>
<input class="mt upbb" type="text" name="poster_url" id="poster_url" value="<?php echo series_get_meta( 'poster_url' ); ?>">
<input id="boton" class="up_images upaa button-primary" type="button" value="<?php _e('Upload', 'mundothemes'); ?>" />
</p>
<p class="upmedia">
<label class="mtt" for="fondo_player"><?php _e( 'Backdrop', 'mundothemes' ); ?></label><br>
<input class="mt upbb" type="text" name="fondo_player" id="fondo_player" value="<?php echo series_get_meta( 'fondo_player' ); ?>">
<input id="boton" class="up_images upaa button-primary" type="button" value="<?php _e('Upload', 'mundothemes'); ?>" />
</p>	
<p class="upmedia">
<label class="mtt" for="imagenes"><?php _e( 'Images', 'mundothemes' ); ?></label><br>
<textarea class="mttt upbb" name="imagenes" id="imagenes"><?php echo series_get_meta( 'imagenes' ); ?></textarea>
<input id="boton" class="up_images upaa button-primary" type="button" value="<?php _e('Upload', 'mundothemes'); ?>" />
</p>	
<p>
<label class="mtt" for="youtube_id"><?php _e( '[Yotube] Opening video', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="youtube_id" id="youtube_id" value="<?php echo series_get_meta( 'youtube_id' ); ?>">
</p>
<!-- ######################### -->
</div>
<?php  }
function series_save( $post_id ) {
if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
if ( ! isset( $_POST['series_nonce'] ) || ! wp_verify_nonce( $_POST['series_nonce'], '_series_nonce' ) ) return;
if ( ! current_user_can( 'edit_post', $post_id ) ) return;
if ( isset( $_POST['id'] ) )
update_post_meta( $post_id, 'id', esc_attr( $_POST['id'] ) );
if ( isset( $_POST['poster_url'] ) )
update_post_meta( $post_id, 'poster_url', esc_attr( $_POST['poster_url'] ) );
if ( isset( $_POST['fondo_player'] ) )
update_post_meta( $post_id, 'fondo_player', esc_attr( $_POST['fondo_player'] ) );
if ( isset( $_POST['imagenes'] ) )
update_post_meta( $post_id, 'imagenes', esc_attr( $_POST['imagenes'] ) );
if ( isset( $_POST['youtube_id'] ) )
update_post_meta( $post_id, 'youtube_id', esc_attr( $_POST['youtube_id'] ) );
if ( isset( $_POST['number_of_episodes'] ) )
update_post_meta( $post_id, 'number_of_episodes', esc_attr( $_POST['number_of_episodes'] ) );
if ( isset( $_POST['number_of_seasons'] ) )
update_post_meta( $post_id, 'number_of_seasons', esc_attr( $_POST['number_of_seasons'] ) );
if ( isset( $_POST['original_name'] ) )
update_post_meta( $post_id, 'original_name', esc_attr( $_POST['original_name'] ) );
if ( isset( $_POST['status'] ) )
update_post_meta( $post_id, 'status', esc_attr( $_POST['status'] ) );
if ( isset( $_POST['serie_vote_average'] ) )
update_post_meta( $post_id, 'serie_vote_average', esc_attr( $_POST['serie_vote_average'] ) );
if ( isset( $_POST['serie_vote_count'] ) )
update_post_meta( $post_id, 'serie_vote_count', esc_attr( $_POST['serie_vote_count'] ) );
if ( isset( $_POST['episode_run_time'] ) )
update_post_meta( $post_id, 'episode_run_time', esc_attr( $_POST['episode_run_time'] ) );
if ( isset( $_POST['homepage'] ) )
update_post_meta( $post_id, 'homepage', esc_attr( $_POST['homepage'] ) );
if ( isset( $_POST['first_air_date'] ) )
update_post_meta( $post_id, 'first_air_date', esc_attr( $_POST['first_air_date'] ) );
if ( isset( $_POST['last_air_date'] ) )
update_post_meta( $post_id, 'last_air_date', esc_attr( $_POST['last_air_date'] ) );
if ( isset( $_POST['popularity'] ) )
update_post_meta( $post_id, 'popularity', esc_attr( $_POST['popularity'] ) );
if ( isset( $_POST['type'] ) )
update_post_meta( $post_id, 'type', esc_attr( $_POST['type'] ) );
}
add_action( 'save_post', 'series_save' );
function custom_admin_js2() { 
global $post_type; if( $post_type == 'tvshows' ) {	?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js?ver=2.1.4"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/includes/framework/js/idtabstbb.js"></script>
<script>
	$('input[name=generartv]').click(function() {
	var input = $('input[name=id]').get(0).value;
	var url = "https://api.themoviedb.org/3/tv/";
	var agregar = "?append_to_response=images,trailers";
	var idioma = "&language=<?php echo get_option('tmdbidioma') ?>&include_image_language=<?php echo get_option('tmdbidioma')?>,null";
	var apikey = "&api_key=<?php echo get_option('tmdbkey')?>";
	// Send Request
    $.getJSON(url + input + agregar + idioma + apikey, function(tmdbdata) {
    var valPlo = "";
    var valImg = "";
    var valBac = "";
    $.each(tmdbdata, function(key, val) {
        $('input[name=' + key + ']').val(val);

        if (key == "name") {
            $('#title').val(val);
        }
        if (key == "vote_count") {
            $('#serie_vote_count').val(val);
        }
        if (key == "vote_average") {
            $('#serie_vote_average').val(val);
        }
        if (key == "overview") {
            valPlo += "" + val + "";
        }
        if (key == "poster_path") {
            valImg += "https://image.tmdb.org/t/p/w185" + val + "";
        }
        if (key == "backdrop_path") {
            valBac += "https://image.tmdb.org/t/p/w780" + val + "";
        }
        <?php $api = get_option('apigenero'); if ($api == "true") { ?>
        if (key == "genres") {
            var genr = "";
            $.each(tmdbdata.genres, function(i, item) {
                genr += "" + item.name + ", ";
                genr1 = item.name;
                $('input[name=newtvshows_categories]').val(genr1);
                $('#tvshows_categories-add-submit').trigger('click');
                $('#tvshows_categories-add-submit').prop("disabled", false);
                $('input[name=newtvshows_categories]').val("");
            });
            $('input[name=' + key + ']').val(genr);
        }
        <?php } ?>
        if (key == "images") {
            var imgt = "";
            $.each(tmdbdata.images.backdrops, function(i, item) {
                imgt += "https://image.tmdb.org/t/p/w300" + item.file_path + "\n";
            });
            $('textarea[name="imagenes"]').val(imgt);
        }
        if (key == "first_air_date") {
            $('#new-tag-tvyear').val(val.slice(0, 4));
        }
        if (key == "created_by") {
            var crea = "";
            $.each(tmdbdata.created_by, function(i, item) {
                crea += item.name + ",";
            });
            $('#new-tag-tvcreator').val(crea);
        }
        if (key == "production_companies") {
            var pro = "";
            $.each(tmdbdata.production_companies, function(i, item) {
                pro += item.name + ",";
            });
            $('#new-tag-tvstudio').val(pro);
        }
        if (key == "networks") {
            var net = "";
            $.each(tmdbdata.networks, function(i, item) {
                net += item.name + ",";
            });
            $('#new-tag-tvnetworks').val(net);
        }
        $.getJSON(url + input + "/credits?" + apikey, function(tmdbdata) {
            $.each(tmdbdata, function(key, val) {
                if (key == "cast") {
                    var valCast = "";
                    $.each(tmdbdata.cast, function(i, item) {
                        valCast += "" + item.name + ", "; //
                    });
                    $('#new-tag-tvcast').val(valCast);
                }
            });
            $.getJSON(url + input + "/videos?" + apikey, function(tmdbdata) {
                $.each(tmdbdata, function(key, val) {
                    var videomt = "";
                    $.each(tmdbdata.results, function(i, item) {
                        videomt += "[" + item.key + "]";
                    });
                    $('#youtube_id').val(videomt.slice(0, 13));
                });
            });
        });
    });
    $('#content').val(valPlo);
    $('#poster_url').val(valImg);
    $('#fondo_player').val(valBac);
    });
    });
</script>
<?php 
  } }
add_action('admin_footer', 'custom_admin_js2');
function mostrar_trailer_tv($id) {
	if (!empty($id)) { 
		$val = str_replace(
			array("[","]",),
			array('<div class="youtube_id_tv"><iframe width="600" height="450" src="//www.youtube.com/embed/','" frameborder="0" allowfullscreen></iframe></div>',),$id);
		echo $val;
		} else {
			echo '<div class="nodata">'. __('No data available','mundothemes') .'</div>'; 
		}
}
