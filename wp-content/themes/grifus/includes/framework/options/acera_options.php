<?php  
// Grifus 4.0.0
// By Erick Meza erick@mundothemes.com
$options = array(
/*============================================================================*/
array("type" => "section","icon" => "acera-icon-home","title" => __( "Configuration", "mundothemes" ),"id" => "general","expanded" => "true"),
array("type" => "section","icon" => "acera-icon-home","title" => __( "Design and structure", "mundothemes" ),"id" => "general2","expanded" => "true"),
array("section" => "general", "type" => "heading","title" => __( "Initial Setup", "mundothemes" ),"id" => "general-config"),
array("section" => "general", "type" => "heading","title" => __( "API TMDb (new)", "mundothemes" ),"id" => "api-config"),
array("section" => "general", "type" => "heading","title" => __( "Slug Taxonomies (Movies)", "mundothemes" ),"id" => "taxonomias-config"),
array("section" => "general", "type" => "heading","title" => __( "Slug Taxonomies (TV Shows)", "mundothemes" ),"id" => "taxonomias-config-series"),
array("section" => "general", "type" => "heading","title" => __( "Ads Blocks", "mundothemes" ),"id" => "anuncios-config"),
array("section" => "general", "type" => "heading","title" => __( "Ads Fake Player", "mundothemes" ),"id" => "player-config"),
array("section" => "general", "type" => "heading","title" => __( "Important notice Website", "mundothemes" ),"id" => "notice-config"),
array("section" => "general2", "type" => "heading","title" => __( "Settings structure", "mundothemes" ),"id" => "structure-config"),
array("section" => "general2", "type" => "heading","title" => __( "Comments", "mundothemes" ),"id" => "comentarios-config"),
array("section" => "general2", "type" => "heading","title" => __( "Dark Style", "mundothemes" ),"id" => "dark-config"),
array("section" => "general2", "type" => "heading","title" => __( "Default style colors", "mundothemes" ),"id" => "white-config"),
array("section" => "general2", "type" => "heading","title" => __( "Developer area", "mundothemes" ),"id" => "dev-config"),
// Slug Series
array(
    "under_section" => "taxonomias-config-series", 
    "type" => "text", 
    "name" => __("TV Shows (Slug)","mundothemes"), 
    "id" => "tvshows-slug", 
    "default" => __("tvshows","mundothemes")
),
array(
    "under_section" => "taxonomias-config-series",
    "type" => "text", 
    "name" => __("Category","mundothemes"), 
    "id" => "tvshows-category", 
    "default" => __("tvshows-genre","mundothemes")
),
array(
    "under_section" => "taxonomias-config-series",
    "type" => "text", 
    "name" => __("Director","mundothemes"), 
    "id" => "tvshows-creator", 
    "default" => __("tvshows-creator","mundothemes")
),

array(
    "under_section" => "taxonomias-config-series",
    "type" => "text", 
    "name" => __("Cast","mundothemes"), 
    "id" => "tvshows-cast", 
    "default" => __("tvshows-cast","mundothemes")
),
array(
    "under_section" => "taxonomias-config-series",
    "type" => "text", 
    "name" => __("Studio","mundothemes"), 
    "id" => "tvshows-studio", 
    "default" => __("tvshows-studio","mundothemes")
),
array(
    "under_section" => "taxonomias-config-series",
    "type" => "text", 
    "name" => __("Networks","mundothemes"), 
    "id" => "tvshows-networks", 
    "default" => __("tvshows-networks","mundothemes")
),
array(
    "under_section" => "taxonomias-config-series",
    "type" => "text", 
    "name" => __("Release year","mundothemes"), 
    "id" => "tvshows-year", 
    "default" => __("tvshows-release-year","mundothemes")
),
array(
    "under_section" => "taxonomias-config-series",
    "type" => "text", 
    "name" => __("Episodes","mundothemes"), 
    "id" => "episodios-slug", 
    "default" => __("episode","mundothemes")
),
array(
    "under_section" => "taxonomias-config-series",
    "type" => "text", 
    "name" => __("Episodes Release year","mundothemes"), 
    "id" => "episodios-year", 
    "default" => __("episode-release-year","mundothemes")
),
array(
    "under_section" => "taxonomias-config-series",
    "type" => "text", 
    "name" => __("Episodes Director","mundothemes"), 
    "id" => "episodios-director", 
    "default" => __("episode-director","mundothemes")
),
array(
    "under_section" => "taxonomias-config-series",
    "type" => "text", 
    "name" => __("Episodes Guest star","mundothemes"), 
    "id" => "episodios-guest-star", 
    "default" => __("episode-guest-star","mundothemes")
),
// TMDb
array(
    "under_section" => "api-config",
    "type" => "checkbox",
    "name" => __("API TMDb","mundothemes"),
    "id" => array("tmdbapi"),
    "options" => array( __("Enable TMDb API?","mundothemes"), ), 
    "desc" => __("Config your <a href=\"https://www.themoviedb.org/account/\" target=\"_blank\">Themoviedb.org API</a>", "mundothemes"),
    "default" => array("not")),
array(
    "under_section" => "api-config", //Required
    "type" => "text", //Required
    "name" => __( "API Key", "mundothemes" ),  //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "tmdbkey", //Required
    "desc" => __( "Add the API Details from themoviedb.org", "mundothemes" ),
	"defaul" => "6b4357c41d9c606e4d7ebe2f4a8850ea"
),
array(
    "under_section" => "api-config", //Required
    "type" => "select", //Required
    "name" => __("Language API", "mundothemes"), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "tmdbidioma", //Required
    "options" => array("en","es","pt","ro","it","ru","ar","bg","bs","cs","da","de","el","fa","fi","fr","he","hr","hu","id","ja","ko","nl","pl","sk","sv","th","tr","zh"), //Required
    "desc" => __("Language Shortcode", "mundothemes"),
    "default" => "en"),
array(
    "under_section" => "api-config",
    "type" => "checkbox",
    "name" => __("Generate categories","mundothemes"),
    "id" => array("apigenero"),
    "options" => array( __("Allow to generate categories?","mundothemes"), ), 
    "desc" => __("This function automatically generates categories", "mundothemes"),
    "default" => array("checked")),
array(
    "under_section" => "dark-config",
    "type" => "checkbox",
    "name" => __("Dark Style","mundothemes"),
    "id" => array("activar-dark"),
    "options" =>array( __("want to activate the dark style?","mundothemes"), ), 
	"desc" => __("Mark the field to activate", "mundothemes"),
    "default" => array("not")
),
array(
    "under_section" => "dark-config", //Required
    "type" => "color", //Required
    "name" => __("Main color","mundothemes"), //Required
    "id" => "darkmain", //Required
    "desc" => __("Choose a color","mundothemes"),
    "default" => "6ba2e0"
),
// Ajuste inicial
array(
    "under_section" => "white-config", //Required
    "type" => "color", //Required
    "name" => __("Main color","mundothemes"), //Required
    "id" => "colormain", //Required
    "desc" => __("Choose a color","mundothemes"),
    "default" => "8BBDE0"
),
array(
    "under_section" => "white-config", //Required
    "type" => "color", //Required
    "name" => __("Secondary color","mundothemes"), //Required
    "id" => "colorsecon", //Required
    "desc" => __("Choose a color","mundothemes"),
    "default" => "262b36"
),
array(
    "under_section" => "white-config", //Required
    "type" => "color", //Required
    "name" => __("Hover color","mundothemes"), //Required
    "id" => "colorhover", //Required
    "desc" => __("Choose a color","mundothemes"),
    "default" => "1B1C22"
),
array(
    "under_section" => "white-config", //Required
    "type" => "color", //Required
    "name" => __("Featured color item","mundothemes"), //Required
    "id" => "featuredcolor", //Required
    "desc" => __("Choose a color","mundothemes"),
    "default" => "20242d"
),
array(
    "under_section" => "general-config",
    "type" => "image", //Required
    "placeholder" => __("Upload logo","mundothemes"),
    "name" => __("Upload logo","mundothemes"), //Required
    "id" => "general-logo", //Required
    "desc" => __("Add image logo, not to exceed 32px high","mundothemes"),
    "default" => ""),
array(
    "under_section" => "general-config",
    "type" => "image", //Required
    "placeholder" => __("Upload favicon","mundothemes"),
    "name" => __("Upload favicon","mundothemes"), //Required
    "id" => "general-favicon", //Required
    "desc" => __("Add favicon, preferably in .ico format","mundothemes"),
    "default" => ""),
array(
    "under_section" => "general-config",
    "type" => "image", //Required
    "placeholder" => __("wp-admin Logo","mundothemes"),
    "name" => __("Upload Admin Logo","mundothemes"), //Required
    "id" => "wpadmin-logo", //Required
    "desc" => __("Logo modify wp-admin, exact dimensions 301px * 51px ","mundothemes"),
    "default" => ""),
array(
    "under_section" => "general-config",
    "type" => "checkbox",
    "name" => __("TV Shows Module","mundothemes"),
    "id" => array("tvmodule"),
    "options" => array( __("Enable TV Shows Modulo?","mundothemes"), ), 
    "desc" => __("Check to activate", "mundothemes"),
    "default" => array("not")),
array(
    "under_section" => "general-config",
    "type" => "checkbox",
    "name" => __("SSL mode","mundothemes"),
    "id" => array("sslmode"),
    "options" => array( __("Enable SSL Mode?","mundothemes"), ), 
    "desc" => __("Activate only if necessary", "mundothemes"),
    "default" => array("not")),
array(
    "under_section" => "general-config", //Required
    "type" => "text", //Required
    "name" => __( "URL Add movie", "mundothemes" ),  //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "add_movie", //Required
    "placeholder" => __( "http://", "mundothemes" ),
    "desc" => __( "Add a link to the Add movie page", "mundothemes" ),
),
array(
    "under_section" => "general-config", //Required
    "type" => "text", //Required
    "name" => __( "URL Edit profile", "mundothemes" ),  //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "editar_perfil", //Required
    "placeholder" => __( "http://", "mundothemes" ),
    "desc" => __( "Add link to the page (Edit profile)", "mundothemes" ),
),
array(
    "under_section" => "taxonomias-config", //Required
    "type" => "text", //Required
    "name" => __("Year","mundothemes"), //Required
    "id" => "year", //Required
    "desc" => __("Caution: once defined this field can no longer edit it again", "mundothemes"),
    "default" => __("release-year","mundothemes")
),
array(
    "under_section" => "taxonomias-config", //Required
    "type" => "text", //Required
    "name" => __("Quality","mundothemes"), //Required
    "id" => "calidad", //Required
    "desc" => __("Caution: once defined this field can no longer edit it again", "mundothemes"),
    "default" => __("quality","mundothemes")
),
array(
    "under_section" => "taxonomias-config", //Required
    "type" => "text", //Required
    "name" => __("Directors","mundothemes"), //Required
    "id" => "director", //Required
    "desc" => __("Caution: once defined this field can no longer edit it again", "mundothemes"),
    "default" => __("director","mundothemes")
),
array(
    "under_section" => "taxonomias-config", //Required
    "type" => "text", //Required
    "name" => __("Star","mundothemes"), //Required
    "id" => "actor", //Required
    "desc" => __("Caution: once defined this field can no longer edit it again", "mundothemes"),
    "default" => __("star","mundothemes")
),
array(
    "under_section" => "taxonomias-config", //Required
    "type" => "text", //Required
    "name" => __("Cast","mundothemes"), //Required
    "id" => "elenco", //Required
    "desc" => __("Caution: once defined this field can no longer edit it again", "mundothemes"),
    "default" => __("cast","mundothemes")
),
array(
    "under_section" => "taxonomias-config", //Required
    "type" => "text", //Required
    "name" => __("News","mundothemes"), //Required
    "id" => "news", //Required
    "desc" => __("Caution: once defined this field can no longer edit it again", "mundothemes"),
    "default" => __("news","mundothemes")
),
array(
    "under_section" => "general-config",
    "type" => "checkbox",
    "name" => __("Module releases","mundothemes"),
    "id" => array("activar-estrenos"),
    "options" => array( __("Want to display the module releases?", "mundothemes"), ), 
    "desc" => __("Active to show", "mundothemes"),
    "default" => array("not")
	),
array(
    "under_section" => "general-config", //Required
    "type" => "text", //Required
    "name" => __("Module releases: filter by category","mundothemes"), //Required
    "id" => "estrenos_cat", //Required
    "placeholder" => __("Category ID Numeric","mundothemes"),
    "desc" => __("Category ID Numeric","mundothemes")
),
array(
    "under_section" => "general-config", //Required
    "type" => "text", //Required
    "name" => "reCAPTCHA Public Key", //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "public_key_rcth", //Required
    "placeholder" => "Public Key reCAPTCHA",
    "desc" => __("<a href=\"https://www.google.com/recaptcha/admin\" target=\"_blank\">Google reCAPTCHA</a>","mundothemes"),
    "default" => ""
),
array(
    "under_section" => "general-config", //Required
    "type" => "text", //Required
    "name" => "reCAPTCHA Private Key", //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "private_key_rcth", //Required
    "placeholder" => "Private Key reCAPTCHA",
    "desc" => __("<a href=\"https://www.google.com/recaptcha/admin\" target=\"_blank\">Google reCAPTCHA</a>","mundothemes"),
    "default" => ""
),
array(
    "under_section" => "general-config", //Required
    "type" => "textarea", //Required
    "name" => __( "Google Analytics code", "mundothemes" ), //Required
    "id" => "analitica", //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "desc" => __( "Make your tracking code Google Analytics.", "mundothemes" ),
    "default" => ""
),
array(
    "under_section" => "general-config", //Required
    "type" => "text", //Required
    "name" => __( "Facebook", "mundothemes" ), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "fb_url", //Required
    "placeholder" => "Facebook URL",
    "desc" => __( "", "mundothemes" ),
    "default" => ""
),
array(
    "under_section" => "general-config", //Required
    "type" => "text", //Required
    "name" => __( "Twitter", "mundothemes" ), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "twt_url", //Required
    "placeholder" => "Twitter URL",
    "desc" => __( "", "mundothemes" ),
    "default" => ""
),
array(
    "under_section" => "general-config", //Required
    "type" => "text", //Required
    "name" => __( "Google+", "mundothemes" ), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "gogl_url", //Required
    "placeholder" => "Google+ URL",
    "desc" => __( "", "mundothemes" ),
    "default" => ""
),
array(
    "under_section" => "general-config", //Required
    "type" => "text", //Required
    "name" => __( "Copyright Footer Text", "mundothemes" ), //Required
    "id" => "copyright_footer", //Required
	"placeholder" => " ".__( 'Powered by', 'mundothemes' )." WordPress & Moundothemes",
    "display_checkbox_id" => "toggle_checkbox_id",
    "desc" => __( "Your license allows you to modify the copyright", "mundothemes" ),
    "default" => ""
),
// Configuracion de comentarios
array(
    "under_section" => "comentarios-config",
    "type" => "checkbox",
    "name" => __("Enable comments on pages", "mundothemes"),
    "id" => array("activar-com-pages"),
    "options" => array( __("You want to display comments on the pages","mundothemes"), ), 
    "desc" => __("Active to show", "mundothemes"),
    "default" => array("not")
),
array(
    "under_section" => "comentarios-config",
    "type" => "checkbox",
    "name" => __("Facebook comments", "mundothemes"),
    "id" => array("activar-facebook"),
    "options" => array( __("Enable comments with facebook","mundothemes"), ), 
    "desc" => __("It is recommended to continue with the rest of the configuration", "mundothemes"),
    "default" => array("not")
),
array(
    "under_section" => "comentarios-config", //Required
    "type" => "text", //Required
    "name" => __( "Facebook App ID", "mundothemes" ), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "fb_id", //Required
    "placeholder" => "209955335852854",
    "desc" => __( "Add the ID of your facebook application", "mundothemes" ),
    "default" => ""
),
array(
    "under_section" => "comentarios-config", //Required
    "type" => "text", //Required
    "name" => __( "Facebook Profile ID admin", "mundothemes" ), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "fb_id_admin", //Required
    "placeholder" => "1623799548",
    "desc" => __( "Adds the id of your facebook profile to moderate comments", "mundothemes" ),
    "default" => ""
),
array(
    "under_section" => "comentarios-config", //Required
    "type" => "text", //Required
    "name" => __( "Facebook App language", "mundothemes" ), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "fb_idioma", //Required
    "placeholder" => "en_EN",
    "desc" => __( "Add the language code you want, (es_LA, ro_RO, pt_BR)", "mundothemes" ),
    "default" => ""
),
array(
    "under_section" => "comentarios-config", //Required
    "type" => "select", //Required
    "name" => __("Facebook Color Scheme", "mundothemes"), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "fb_color", //Required
    "options" => array("light", "dark"), //Required
    "desc" => __("Choose the color for the comment block", "mundothemes"),
    "default" => ""),
array(
    "under_section" => "comentarios-config", //Required
    "type" => "select", //Required
    "name" => __("Facebook Number of Posts", "mundothemes"), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "fb_numero", //Required
    "options" => array("5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15"), //Required
    "desc" => __("Select number of comments to display per publication", "mundothemes"),
    "default" => ""),
array(
    "under_section" => "comentarios-config",
    "type" => "checkbox",
    "name" => __("Manage comments Disqus", "mundothemes"),
    "id" => array("activar-disqus"),
    "options" => array( __("Enable comments Disqus","mundothemes"), ), 
    "desc" => __("Remember to add the shortname of your community with disqus", "mundothemes"),
    "default" => array("not")
),
array(
    "under_section" => "comentarios-config", //Required
    "type" => "text", //Required
    "name" => __( "Shorname Disqus", "mundothemes" ), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "disqus_id", //Required
    "placeholder" => "grifus",
    "desc" => __( "Add your community shortname Disqus", "mundothemes" ),
    "default" => ""
),
// bloques de anuncios disponibles
array(
    "under_section" => "anuncios-config",
    "type" => "checkbox",
    "name" => __("Block ad 728x90", "mundothemes"),
    "id" => array("activar-anuncio-728-90"),
    "options" => array( __("Show block 728x90 ad","mundothemes"), ), 
    "desc" => __("Active to show ad", "mundothemes"),
    "default" => array("not")
),
array(
    "under_section" => "anuncios-config", //Required
    "type" => "textarea", //Required
    "name" => __( "728x90 ad code", "mundothemes" ), //Required
    "id" => "anuncio-728-90", //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "desc" => __( "Add HTML code", "mundothemes" ),
    "default" => ""
),
array(
    "under_section" => "anuncios-config",
    "type" => "checkbox",
    "name" => __("Block ad 300x250", "mundothemes"),
    "id" => array("activar-anuncio-300-250"),
    "options" => array( __("Show block 300x250 ad","mundothemes"), ), 
    "desc" => __("Active to show ad", "mundothemes"),
    "default" => array("not")
),
array(
    "under_section" => "anuncios-config", //Required
    "type" => "textarea", //Required
    "name" => __( "300x250 ad code", "mundothemes" ), //Required
    "id" => "anuncio-300-250", //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "desc" => __( "Add HTML code", "mundothemes" ),
    "default" => ""
),
array(
    "under_section" => "anuncios-config",
    "type" => "checkbox",
    "name" => __("Block ad 468x60", "mundothemes"),
    "id" => array("activar-anuncio-468-60"),
    "options" => array( __("Show block 468x60 ad","mundothemes"), ), 
    "desc" => __("Active to show ad", "mundothemes"),
    "default" => array("not")
),
array(
    "under_section" => "anuncios-config", //Required
    "type" => "textarea", //Required
    "name" => __( "468x60 ad code", "mundothemes" ), //Required
    "id" => "anuncio-468-60", //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "desc" => __( "Add HTML code", "mundothemes" ),
    "default" => ""
),
// Reproductor falso
array(
    "under_section" => "player-config",
    "type" => "checkbox",
    "name" => __("Activate fake player", "mundothemes"),
    "id" => array("activar-fake"),
	"img_desc" => get_bloginfo('template_directory')."/images/img_desc/fakeplay.jpg",
    "options" => array( __("Active player to show false","mundothemes"), ), 
    "desc" => __("Now assign number of links you want to activate and add links", "mundothemes"),
    "default" => array("not")
),
array(
    "under_section" => "player-config",
    "type" => "checkbox",
    "name" => __("Show logo fake player", "mundothemes"),
    "id" => array("activar-fake-logo"),
    "options" => array( __("Activate logo on fake player","mundothemes"), ), 
    "desc" => __("Active to show", "mundothemes"),
    "default" => array("not")
),
array(
    "under_section" => "player-config",
    "type" => "image", //Required
    "placeholder" => __("Upload logo","mundothemes"),
    "name" => __("Custom logo fake Player","mundothemes"), //Required
    "id" => "img-fake-logo", //Required
    "desc" => __("Add image logo, not to exceed 32px high","mundothemes"),
    "default" => ""),
array(
    "under_section" => "player-config", //Required
    "type" => "select", //Required
    "name" => __("Number of active links", "mundothemes"), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "enlaces-fake", //Required
    "options" => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10"), //Required
    "desc" => __("Select the number of active links", "mundothemes"),
    "default" => ""),
array(
    "under_section" => "player-config", //Required
    "type" => "text", //Required
    "name" => __( "Link 1", "mundothemes" ), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "fake-link-1", //Required
    "placeholder" => __( "http://", "mundothemes" ),
    "default" => ""
),
array(
    "under_section" => "player-config", //Required
    "type" => "text", //Required
    "name" => __( "Link 2", "mundothemes" ), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "fake-link-2", //Required
    "placeholder" => __( "http://", "mundothemes" ),
    "default" => ""
),
array(
    "under_section" => "player-config", //Required
    "type" => "text", //Required
    "name" => __( "Link 3", "mundothemes" ), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "fake-link-3", //Required
    "placeholder" => __( "http://", "mundothemes" ),
    "default" => ""
),
array(
    "under_section" => "player-config", //Required
    "type" => "text", //Required
    "name" => __( "Link 4", "mundothemes" ), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "fake-link-4", //Required
    "placeholder" => __( "http://", "mundothemes" ),
    "default" => ""
),
array(
    "under_section" => "player-config", //Required
    "type" => "text", //Required
    "name" => __( "Link 5", "mundothemes" ), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "fake-link-5", //Required
    "placeholder" => __( "http://", "mundothemes" ),
    "default" => ""
),
array(
    "under_section" => "player-config", //Required
    "type" => "text", //Required
    "name" => __( "Link 6", "mundothemes" ), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "fake-link-6", //Required
    "placeholder" => __( "http://", "mundothemes" ),
    "default" => ""
),
array(
    "under_section" => "player-config", //Required
    "type" => "text", //Required
    "name" => __( "Link 7", "mundothemes" ), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "fake-link-7", //Required
    "placeholder" => __( "http://", "mundothemes" ),
    "default" => ""
),
array(
    "under_section" => "player-config", //Required
    "type" => "text", //Required
    "name" => __( "Link 8", "mundothemes" ), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "fake-link-8", //Required
    "placeholder" => __( "http://", "mundothemes" ),
    "default" => ""
),
array(
    "under_section" => "player-config", //Required
    "type" => "text", //Required
    "name" => __( "Link 9", "mundothemes" ), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "fake-link-9", //Required
    "placeholder" => __( "http://", "mundothemes" ),
    "default" => ""
),
array(
    "under_section" => "player-config", //Required
    "type" => "text", //Required
    "name" => __( "Link 10", "mundothemes" ), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "fake-link-10", //Required
    "placeholder" => __( "http://", "mundothemes" ),
    "default" => ""
),
array(
    "under_section" => "mega-config",
    "type" => "checkbox",
    "name" => __("Show downloads Mega","mundothemes"),
    "id" => array("activar-mega"),
    "options" => array( __("Show button to route the fake page of Mega","mundothemes"), ), 
    "desc" => __("Once activated the button will appear on the contents page", "mundothemes"),
    "default" => array("not")),
array(
    "under_section" => "mega-config", //Required
    "type" => "text", //Required
    "name" => __( "URL to redirect page", "mundothemes" ), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "mega-url", //Required
    "placeholder" => __( "http://", "mundothemes" ),
    "desc" => __("Add a link to redirect to the fake page of mega", "mundothemes"),
    "default" => ""
),
array(
    "under_section" => "dev-config", //Required
    "type" => "textarea", //Required
    "name" => __( "Extra integration code", "mundothemes" ), //Required
    "id" => "code_integracion", //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "desc" => __( "Make your HTML integration with the theme code.", "mundothemes" ),
    "default" => ""
),
array(
    "under_section" => "dev-config",
    "type" => "checkbox",
    "name" => __("Active custom CSS","mundothemes"),
    "id" => array("activar_css"),
    "options" =>array( __("Want to enable custom CSS code?","mundothemes"), ), 
	"desc" => __("Enable custom CSS code", "mundothemes"),
    "default" => array("not")),
array(
    "under_section" => "dev-config", //Required
    "type" => "textarea", 
    "name" => __( "Add custom CSS", "mundothemes" ), //Required
    "id" => "code_css", //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "desc" => __( "Add only CSS code", "mundothemes" ),
),
array(
    "under_section" => "dev-config",
    "type" => "checkbox",
    "name" => __("Active custom Java Script","mundothemes"),
    "id" => array("activar_js"),
    "options" =>array( __("Want to enable custom Java Script code?","mundothemes"), ), 
	"desc" => __("Enable custom Java Script code", "mundothemes"),
    "default" => array("not")
),
array(
    "under_section" => "dev-config", //Required
    "type" => "textarea", 
    "name" => __( "Add custom Java Script", "mundothemes" ), //Required
    "id" => "code_js", //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "desc" => __( "Add only Java Script code", "mundothemes" ),
),
### Configuracion de Notificaciones 
array(
    "under_section" => "notice-config",
    "type" => "checkbox",
    "name" => __("Activate module", "mundothemes"),
    "id" => array("activar_notice"),
	"img_desc" => get_bloginfo('template_directory')."/images/img_desc/aviso.jpg",
    "options" => array( __("You want to activate the notices module?","mundothemes"), ), 
    "desc" => __("Active to display module", "mundothemes"),
    "default" => array("not")
),
array(
    "under_section" => "notice-config", //Required
    "type" => "textarea", 
    "name" => __( "Add notice", "mundothemes" ), //Required
    "id" => "notice", //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "desc" => __( "Add notice, this field accepts HTML", "mundothemes" ),
),

array(
    "under_section" => "notice-config", //Required
    "type" => "color", //Required
    "name" => __("Notice Background color","mundothemes"), //Required
    "id" => "color_notice", //Required
    "desc" => __("Choose a color","mundothemes"),
    "default" => "81ad53"
),
array(
    "under_section" => "notice-config", //Required
    "type" => "text", //Required
    "name" => __( "Cookie name", "mundothemes" ), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "cookie_name", //Required
    "placeholder" =>  __( "Cookie name", "mundothemes" ),
    "desc" => __( "Add name cookie, rename each time you make a new notice", "mundothemes" ),
    "default" => "cookiename"
),
array(
    "under_section" => "notice-config", //Required
    "type" => "select", //Required
    "name" => __("Cookie expiration", "mundothemes"), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "cookie_exp", //Required
    "options" => array("1", "7", "15", "30", "60", "180", "365"), //Required
    "desc" => __("Select the number of days for Cookie", "mundothemes"),
    "default" => "7"),
array(
    "under_section" => "structure-config",
    "type" => "checkbox",
    "name" => __("Movie player","mundothemes"),
    "id" => array("activar-phb"),
	"img_desc" => get_bloginfo('template_directory')."/images/img_desc/medio_player.jpg",
    "options" => array( __("Move player in the middle of content?","mundothemes"), ), 
    "desc" => __("Check to reposition the player", "mundothemes"),
    "default" => array("not")),
array(
    "under_section" => "structure-config",
    "type" => "checkbox",
    "name" => __("News homepage", "mundothemes"),
    "id" => array("news_home"),
    "options" => array( __("Enable news homepage?","mundothemes"), ), 
    "desc" => __("Check to activate the function.", "mundothemes"),
    "default" => array("not")),
array(
    "under_section" => "structure-config",
    "type" => "checkbox",
    "name" => __("Widgets Home", "mundothemes"),
    "id" => array("widget_home"),
    "options" => array( __("To enable Widgets Home page?","mundothemes"), ), 
    "desc" => __("Check to activate the function.", "mundothemes"),
    "default" => array("not")),
array(
    "under_section" => "structure-config",
    "type" => "checkbox",
    "name" => __("Widgets Taxonomy", "mundothemes"),
    "id" => array("widget_tax"),
    "options" => array( __("To enable Widgets Taxonomy page?","mundothemes"), ), 
    "desc" => __("Check to activate the function.", "mundothemes"),
    "default" => array("not")),
array(
    "under_section" => "structure-config",
    "type" => "checkbox",
    "name" => __("Widgets Category", "mundothemes"),
    "id" => array("widget_cat"),
    "options" => array( __("To enable Widgets Category page?","mundothemes"), ), 
    "desc" => __("Check to activate the function.", "mundothemes"),
    "default" => array("not")),
array(
    "under_section" => "structure-config",
    "type" => "checkbox",
    "name" => __("Widgets Single Post", "mundothemes"),
    "id" => array("widget_single"),
    "options" => array( __("To enable Widgets single post?","mundothemes"), ), 
    "desc" => __("Check to activate the function.", "mundothemes"),
    "default" => array("not")),
array(
    "under_section" => "structure-config",
    "type" => "checkbox",
    "name" => __("Widgets Single TV Shows", "mundothemes"),
    "id" => array("widget_single_tv"),
    "options" => array( __("To enable Widgets single Tv Shows?","mundothemes"), ), 
    "desc" => __("Check to activate the function.", "mundothemes"),
    "default" => array("not")),
array(
    "under_section" => "structure-config", //Required
    "type" => "select", //Required
    "name" => __("Slider box items", "mundothemes"), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "nu-items-slider", //Required
	"img_desc" => get_bloginfo('template_directory')."/images/img_desc/random.jpg",
    "options" => array("20", "30", "40", "50"), //Required
    "desc" => __("select the number of items to display on the slider boxes", "mundothemes"),
    "default" => "20"),
array(
    "under_section" => "structure-config", //Required
    "type" => "select", //Required
    "name" => __("Sidebar related TVShows", "mundothemes"), //Required
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "nu-items-tv", //Required
    "options" => array("5", "6", "7", "8","9","10","11","12","13","14","15","16","17","18","19","20"), //Required
    "desc" => __("select the number of items to display on the sidebar tvhows single", "mundothemes"),
    "default" => "10"),
array(
    "under_section" => "structure-config",
    "type" => "checkbox",
    "name" => __("Infinite scroll", "mundothemes"),
    "id" => array("activar-scroll"),
    "options" => array( __("To enable Infinite Scroll?","mundothemes"), ), 
    "desc" => __("Check to activate the function.", "mundothemes"),
    "default" => array("not")),
array(
    "under_section" => "structure-config", //Required
    "type" => "radio_image", //Required
    "name" => __("Items Home page", "mundothemes"), //Required
    "show_labels" => "false",
    "image_src" => array(get_bloginfo('template_directory') . "/images/item_1.png", get_bloginfo('template_directory') . "/images/item_2.png"), //Required
    "image_size" => array("30"),
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "item_home", //Required
    "options" => array("item_1", "item_2"), //Required
	"desc" => __("Grid or list", "mundothemes"),
    "default" => "item_1"),
array(
    "under_section" => "structure-config", //Required
    "type" => "radio_image", //Required
    "name" => __("Items Category Page", "mundothemes"), //Required
    "show_labels" => "false",
    "image_src" => array(get_bloginfo('template_directory') . "/images/item_1.png", get_bloginfo('template_directory') . "/images/item_2.png"), //Required
    "image_size" => array("30"),
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "item_category", //Required
    "options" => array("item_1", "item_2"), //Required
	"desc" => __("Grid or list", "mundothemes"),
    "default" => "item_1"),
array(
    "under_section" => "structure-config", //Required
    "type" => "radio_image", //Required
    "name" => __("Items Taxonomie Page", "mundothemes"), //Required
    "show_labels" => "false",
    "image_src" => array(get_bloginfo('template_directory') . "/images/item_1.png", get_bloginfo('template_directory') . "/images/item_2.png"), //Required
    "image_size" => array("30"),
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "item_tax", //Required
    "options" => array("item_1", "item_2"), //Required
	"desc" => __("Grid or list", "mundothemes"),
    "default" => "item_1"),
array(
    "under_section" => "structure-config", //Required
    "type" => "radio_image", //Required
    "name" => __("Items Search Page", "mundothemes"), //Required
    "show_labels" => "false",
    "image_src" => array(get_bloginfo('template_directory') . "/images/item_1.png", get_bloginfo('template_directory') . "/images/item_2.png"), //Required
    "image_size" => array("30"),
    "display_checkbox_id" => "toggle_checkbox_id",
    "id" => "item_search", //Required
    "options" => array("item_1", "item_2"), //Required
	"desc" => __("Grid or list", "mundothemes"),
    "default" => "item_1"),
    );
?>