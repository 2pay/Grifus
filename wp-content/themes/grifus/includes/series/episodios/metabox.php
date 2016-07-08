<?php
function episodios_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}
function episodios_add_meta_box() {
	add_meta_box(
		'episodios-episodios',
		__( 'Episodes', 'mundothemes' ),
		'episodios_html',
		'episodes',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'episodios_add_meta_box' ); function episodios_html( $post) { wp_nonce_field( '_episodios_nonce', 'episodios_nonce' ); ?>
<p>
<input class="mt" type="text" name="ids" id="ids" value="<?php echo series_get_meta( 'ids' ); ?>" placeholder="<?php _e('TVShow ID: 1402','mundothemes'); ?>">
<input class="mt" type="text" name="temporada" id="temporada" value="<?php echo series_get_meta( 'temporada' ); ?>" placeholder="<?php _e('Number of season: 1','mundothemes'); ?>">
<input class="mt" type="text" name="episodio" id="episodio" value="<?php echo series_get_meta( 'episodio' ); ?>" placeholder="<?php _e('Number of episode: 4','mundothemes'); ?>">
<input type="button" class="button button-primary button-large mtmms" name="generarepis" value="<?php _e('Generate','mundothemes'); ?>">
<br>
<label class="mtt" for="id" style="font-weight: 300;"><a href="https://www.themoviedb.org/tv" target="_blank" rel="nofollow"><?php _e( 'Generate Data (TMDb)', 'mundothemes' ); ?></a> <span>https://www.themoviedb.org/tv/<b style="color:red">1402</b>-the-walking-dead/<b style="color:red">1</b>/episode/<b style="color:red">4</b></span></label>
</p>
<p>&nbsp;</p>
<hr>
<p>
<label class="mtt" for="name"><?php _e( 'Episode Title', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="name" id="name" value="<?php echo series_get_meta( 'name' ); ?>">
</p>
<p class="upmedia">
<label class="mtt" for="poster_serie"><?php _e( 'Poster Serie', 'mundothemes' ); ?></label><br>
<input class="mt upbb" type="text" name="poster_serie" id="poster_serie" value="<?php echo series_get_meta( 'poster_serie' ); ?>">
<input id="boton" class="up_images upaa button-primary" type="button" value="<?php _e('Upload', 'mundothemes'); ?>" />
</p>
<p class="upmedia">
<label class="mtt" for="img_episode"><?php _e( 'Featured image episode', 'mundothemes' ); ?></label><br>
<input class="mt upbb" type="text" name="img_episode" id="img_episode" value="<?php echo series_get_meta( 'img_episode' ); ?>">
<input id="boton" class="up_images upaa button-primary" type="button" value="<?php _e('Upload', 'mundothemes'); ?>" />
</p>
<p class="upmedia">
<label class="mtt" for="imagenes"><?php _e( 'Images', 'mundothemes' ); ?></label><br>
<textarea class="mttt upbb" name="imagenes" id="imagenes"><?php echo series_get_meta( 'imagenes' ); ?></textarea>
<input id="boton" class="up_images upaa button-primary" type="button" value="<?php _e('Upload', 'mundothemes'); ?>" />
</p>
<p>
<label class="mtt" for="air_date"><?php _e( 'Air date', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="air_date" id="air_date" value="<?php echo series_get_meta( 'air_date' ); ?>">
</p>
<p>
<label class="mtt" for="serie"><?php _e( 'Serie', 'mundothemes' ); ?></label><br>
<input class="mt" type="text" name="serie" id="serie" value="<?php echo series_get_meta( 'serie' ); ?>">
</p>
<p>
<label class="mtt" for="serie_mark"><h1><?php _e( 'IMPORTANT: Mark only if necessary', 'mundothemes' ); ?></h1></label>
<input type="radio" name="code_paginame" id="ab0" value="ab0" <?php echo ( series_get_meta( 'code_paginame' ) === 'ab0' ) ? 'checked' : ''; ?>>
<label for="ab0"><?php _e( 'This is the first episode of season.', 'mundothemes' ); ?></label><br>
<input type="radio" name="code_paginame" id="ab1" value="ab1" <?php echo ( series_get_meta( 'code_paginame' ) === 'ab1' ) ? 'checked' : ''; ?>>
<label for="ab1"><?php _e( 'This is the first episode of the first season.', 'mundothemes' ); ?></label><br>
<input type="radio" name="code_paginame" id="ab2" value="ab2" <?php echo ( series_get_meta( 'code_paginame' ) === 'ab2' ) ? 'checked' : ''; ?>>
<label for="ab2"><?php _e( 'This is the last episode of season.', 'mundothemes' ); ?></label><br>
<input type="radio" name="code_paginame" id="ab3" value="ab3" <?php echo ( series_get_meta( 'code_paginame' ) === 'ab3' ) ? 'checked' : ''; ?>>
<label for="ab3"><?php _e( 'This is the last episode of the last season.', 'mundothemes' ); ?></label><br>
</p>
<?php }
function episodios_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['episodios_nonce'] ) || ! wp_verify_nonce( $_POST['episodios_nonce'], '_episodios_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

if ( isset( $_POST['ids'] ) )
update_post_meta( $post_id, 'ids', esc_attr( $_POST['ids'] ) );
if ( isset( $_POST['temporada'] ) )
update_post_meta( $post_id, 'temporada', esc_attr( $_POST['temporada'] ) );
if ( isset( $_POST['episodio'] ) )
update_post_meta( $post_id, 'episodio', esc_attr( $_POST['episodio'] ) );
if ( isset( $_POST['air_date'] ) )
update_post_meta( $post_id, 'air_date', esc_attr( $_POST['air_date'] ) );
if ( isset( $_POST['name'] ) )
update_post_meta( $post_id, 'name', esc_attr( $_POST['name'] ) );
if ( isset( $_POST['poster_serie'] ) )
update_post_meta( $post_id, 'poster_serie', esc_attr( $_POST['poster_serie'] ) );
if ( isset( $_POST['img_episode'] ) )
update_post_meta( $post_id, 'img_episode', esc_attr( $_POST['img_episode'] ) );
if ( isset( $_POST['imagenes'] ) )
update_post_meta( $post_id, 'imagenes', esc_attr( $_POST['imagenes'] ) );
if ( isset( $_POST['serie'] ) )
update_post_meta( $post_id, 'serie', esc_attr( $_POST['serie'] ) );


if ( isset( $_POST['code_paginame'] ) )
update_post_meta( $post_id, 'code_paginame', esc_attr( $_POST['code_paginame'] ) );


}
add_action( 'save_post', 'episodios_save' );
function custom_admin_js3() { global $post_type; if( $post_type == 'episodes' ) { ?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js?ver=2.1.4"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/includes/framework/js/idtabstbb.js"></script>
<script>
	$('input[name=generarepis]').click(function() {
	var input = $('input[name=ids]').get(0).value;
	var temp = $('input[name=temporada]').get(0).value;
	var epis = $('input[name=episodio]').get(0).value;
	var imgplus = "?append_to_response=images";
	var adde = '/season/'+temp+'/episode/'+ epis + imgplus;
	var url = "https://api.themoviedb.org/3/tv/";
	var idioma = "&language=<?php echo get_option('tmdbidioma') ?>&include_image_language=<?php echo get_option('tmdbidioma')?>,null";
	var apikey = "&api_key=<?php echo get_option('tmdbkey')?>";
	// Send Request
    $.getJSON(url + input + adde + idioma + apikey, function(tmdbdata) {
    var valPlo = "";
    var valImg = "";
    var valBac = "";
    $.each(tmdbdata, function(key, val) {
        $('input[name=' + key + ']').val(val);

        if (key == "vote_count") {
            $('#serie_vote_count').val(val);
        }
        if (key == "vote_average") {
            $('#serie_vote_average').val(val);
        }
        if (key == "overview") {
            valPlo += "" + val + "";
        }
        if (key == "still_path") {
            valImg += "https://image.tmdb.org/t/p/w780" + val + "";
        }
        if (key == "images") {
            var imgt = "";
            $.each(tmdbdata.images.stills, function(i, item) {
                imgt += "https://image.tmdb.org/t/p/w300" + item.file_path + "\n";
            });
            $('textarea[name="imagenes"]').val(imgt);
        }
        if (key == "air_date") {
            $('#new-tag-episodeyear').val(val.slice(0, 4));
        }

        if (key == "crew") {
            var crew_d = crew_w = crew_a = "";
            $.each(tmdbdata.crew, function(i, item) {
                if (item.department == "Directing") {
                    crew_d += "" + item.name + ",";
                }
            });
            $('#new-tag-episodedirector').val(crew_d);
        }
        if (key == "guest_stars") {
            var star_a = "";
            $.each(tmdbdata.guest_stars, function(i, item) {
                star_a += "" + item.name + ", ";
            });

            $('#new-tag-episodegueststar').val(star_a);

        }
        $.getJSON(url + input + "?" + idioma + apikey, function(tmdbdata) {

            $.each(tmdbdata, function(key, item) {
                if (key == "name") {
                    $('#serie').val(item);
					$('#title').val(item + " " + temp + "x" + epis);
                }
                if (key == "poster_path") {
                    $('#poster_serie').val("https://image.tmdb.org/t/p/w185" + item);
                }
            });
        });

    });
    $('#content').val(valPlo);
    $('#img_episode').val(valImg);

    });
    });
</script>
<?php 
  } }
add_action('admin_footer', 'custom_admin_js3');