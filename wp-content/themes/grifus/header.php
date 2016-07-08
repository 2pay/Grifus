<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="Generator" content="Grifus <?php recoger_version(); ?> and WordPress">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php $fb_admin = get_option('fb_id_admin');
    if (!empty($fb_admin)) { ?>
        <meta property="fb:admins" content="<?php echo $fb_admin; ?>"/>
    <?php } ?>
    <?php $fb_app = get_option('fb_id');
    if (!empty($fb_app)) { ?>
        <meta property="fb:app_id" content="<?php echo $fb_app; ?>"/>
    <?php } ?>
    <?php $favicon = get_option('general-favicon');
    if (!empty($favicon)) { ?>
        <link rel="shortcut icon" href="<?php echo $favicon; ?>" type="image/x-icon"/>
    <?php } else { ?>
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png"
              type="image/x-icon"/>
    <?php } ?>
    <title><?php wp_title('-', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <base href="<?php bloginfo('url'); ?>"/>
    <meta name="keywords" content="<?php wp_title('-', true, 'right'); ?>"/>
    <link rel="stylesheet" type="text/css"
          href="<?php echo get_template_directory_uri(); ?>/css/reset.css?ver=<?php recoger_version(); ?>"/>
    <link rel="stylesheet" type="text/css"
          href="<?php echo get_template_directory_uri(); ?>/css/scrollbar.css?ver=<?php recoger_version(); ?>"/>
    <link rel="stylesheet" type="text/css"
          href="<?php echo get_template_directory_uri(); ?>/css/icons/style.css?ver=<?php recoger_version(); ?>"/>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    <?php $css = get_option('activar-dark');
    if ($css == "true") { ?>
        <link rel="stylesheet" type="text/css"
              href="<?php echo get_template_directory_uri(); ?>/dark.style.css?ver=<?php recoger_version(); ?>"/>
    <?php } else { ?>
        <link rel="stylesheet" type="text/css"
              href="<?php echo get_template_directory_uri(); ?>/mt.min.css?ver=<?php recoger_version(); ?>"/>
    <?php } ?>
    <link rel="stylesheet" type="text/css"
          href="<?php echo get_template_directory_uri(); ?>/css/responsive.min.css?ver=<?php recoger_version(); ?>"/>
    <?php if (!function_exists('automatic_feed_links')) { ?>
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed"
              href="<?php bloginfo('rss2_url'); ?>"/>
        <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed"
              href="<?php bloginfo('atom_url'); ?>"/>
    <?php } ?>
    <?php if ($values = get_post_custom_values("fondo_player")) { ?>
        <meta property="og:image" content="<?php echo $values[0]; ?>" /><?php } ?>
    <?php if (is_single()) {
        $img = get_post_meta($post->ID, "imagenes", $single = true);
        fbimage($img);
    } ?>
    <?php wp_head(); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <?php $gwebmasters = get_option('analitica');
    if (!empty($gwebmasters)) echo stripslashes(get_option('analitica')); ?>
    <script type="text/javascript"
            src="<?php echo get_template_directory_uri(); ?>/js/jquery.idTabs.min.js?ver=<?php recoger_version(); ?>"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/paginador.js?ver=<?php recoger_version(); ?>"
            type="text/javascript"></script>
    <script
        src="<?php echo get_template_directory_uri(); ?>/js/owl.carousel.js?ver=<?php recoger_version(); ?>"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <?php $activar = get_option('activar_js');
    if ($activar == "true") {
        $js = get_option('code_js');
        if (!empty($js)) {
            echo '<script type="text/javascript">' . $js . '</script>';
        }
    } ?>
    <script>
        var timer = 0;
        var perc = 0;
        function updateProgress(percentage) {
            $('#pbar_innerdiv').css("width", percentage + "%");
            $('#pbar_innertext').text(percentage + "%");
        }
        function animateUpdate() {
            perc++;
            updateProgress(perc);
            if (perc < 100) {
                timer = setTimeout(animateUpdate, 550);
            }
        }
        $(document).ready(function () {
            $('#pbar_outerdiv').click(function () {
                clearTimeout(timer);
                perc = 0;
                animateUpdate();
            });
        });
        $(document).ready(function () {
            $("#arriba").click(function () {
                return $("html, body").animate({
                    scrollTop: 0
                }, 1250), !1
            })
        });
    </script>
    <?php $activar = get_option('activar_css');
    if ($activar == "true") {
        $css = get_option('code_css');
        if (!empty($css)) {
            echo '<style>' . $css . '</style>';
        }
    } ?>
    <?php $css = get_option('activar-dark');
    if ($css == "true") {
        if ($color = get_option('darkmain')) { ?>
            <style type="text/css">
                .buscaicon ul li a.buscaboton {
                    background-color: # <?php echo $color; ?>
                }

                .iteslid ul li a.selected, .filtro_y ul li a:hover {
                    background: # <?php echo $color; ?>
                }

                .news_home .noticias .new .fecha .mes, .categorias li:hover:before {
                    color: # <?php echo $color; ?>
                }

                #header .navegador .caja .menu li.current-menu-item a, #slider1 .item .imagens span.imdb b, #slider2 .item .imagens span.imdb b, .items .item .image span.imdb b, .items .item .boxinfo .typepost, #contenedor .contenido .header .buscador .imputo:before, .categorias li.current-cat:before {
                    color: # <?php echo $color; ?>
                }
            </style>
        <?php }
    } else { ?>
        <?php
        $color1 = get_option('colormain');
        $color2 = get_option('colorsecon');
        $color3 = get_option('headhover');
        $color4 = get_option('featuredcolor');
        if (get_option('colormain')) { ?>
            <style>
                #header .navegador, .rheader {
                    background: # <?php echo $color2; ?>;
                }

                #header .navegador .caja .menu li.current-menu-item a {
                    color: # <?php echo $color1; ?>;
                }

                #header .navegador .caja .menu li a:hover {
                    background: <?php echo $color3; ?>;
                }

                .buscaicon ul li a.buscaboton, .categorias li span, .iteslid ul li a.selected, .imdb_r .a span {
                    background-color: # <?php echo $color1; ?>;
                }

                .news_home .noticias .new .fecha .dia, #header .navegador .caja .menu ul li ul.sub-menu li a:before, .box_item h1 {
                    color: # <?php echo $color1; ?>;
                }
            </style>
        <?php }
    } ?>
</head>
<body id="bodyplus">
<?php grifus_users(); ?>
<div class="rheader">
    <div class="box">
        <div class="left">
            <a class="rclic"><b class="icon-bars"></b></a>
        </div>
        <div class="rmenus">
            <?php
            /* menu navegador */
            if (get_option('edd_sample_theme_license_key')) {
                function_exists('wp_nav_menu') && has_nav_menu('menu_navegador');
                wp_nav_menu(array('theme_location' => 'menu_navegador', 'container' => '', 'menu_class' => ''));
            }
            ?>
        </div>
        <div class="right">
            <a class="rclic2"><b class="icon-search"></b></a>
        </div>
        <div class="rbuscar">
            <form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
                <div class="textar">
                    <input class="buscar" type="text" placeholder="<?php _e('Search..', 'mundothemes'); ?>" name="s"
                           id="s" value="<?php echo $_GET['s'] ?>">
                </div>
            </form>
        </div>
        <div class="center">
            <?php $logo = get_option('general-logo');
            if (!empty($logo)) { ?>
                <A href="<?php bloginfo('url'); ?>/"><img src="<?php echo $logo; ?>"
                                                          alt="<?php bloginfo('name') ?>"/></a>
            <?php } else { ?>
                <A href="<?php bloginfo('url'); ?>/"><img
                        src="<?php echo get_template_directory_uri(); ?>/images/logo.png"
                        alt="<?php bloginfo('name') ?>"/></a>
            <?php } ?>
        </div>
    </div>
</div>
<div id="header" class="">
    <div id="cabeza" class="navegador">
        <div class="<?php global $post_type;
        if ($post_type == 'tvshows') {
            if (is_single()) { ?>tvshows_single <?php }
        }
        global $post_type;
        if ($post_type == 'episodes') {
            if (is_single()) { ?>tvshows_single <?php }
        } ?>caja">
            <div class="logo">
                <?php $logo = get_option('general-logo');
                if (!empty($logo)) { ?>
                    <A href="<?php bloginfo('url'); ?>/"><img src="<?php echo $logo; ?>"
                                                              alt="<?php bloginfo('name') ?>"/></a>
                <?php } else { ?>
                    <A href="<?php bloginfo('url'); ?>/"><img
                            src="<?php echo get_template_directory_uri(); ?>/images/logo.png"
                            alt="<?php bloginfo('name') ?>"/></a>
                <?php } ?>
            </div>
            <div class="menu">
                <?php
                /* menu navegador */
                if (get_option('edd_sample_theme_license_key')) {
                    function_exists('wp_nav_menu') && has_nav_menu('menu_navegador');
                    wp_nav_menu(array('theme_location' => 'menu_navegador', 'container' => '', 'menu_class' => ''));
                }
                ?>
            </div>
            <div class="buscaicon">
                <ul>
                    <?php if ($dato = get_option('fb_url')) { ?>
                        <li><a class="share_social"><i class="icon-share22"></i></a>
                            <ul>
                                <li><a href="<?php echo $dato; ?>" target="_blank" class="fbk">Facebook</a></li>
                                <?php if ($dato = get_option('twt_url')) { ?>
                                    <li><a href="<?php echo $dato; ?>" target="_blank" class="twtr">Twitter</a>
                                    </li><?php } ?>
                                <?php if ($dato = get_option('gogl_url')) { ?>
                                    <li><a href="<?php echo $dato; ?>" target="_blank" class="gge">Google +</a>
                                    </li><?php } ?>
                            </ul>
                        </li>
                    <?php } ?>
                    <li><a class="buscaboton"><i class="icon-search"></i></a></li>
                </ul>
            </div>
            <div class="usermenuadmin">
                <?php global $user_ID;
                if ($user_ID) : ?>
                    <?php if (current_user_can('level_10')) : ?>
                        <a href="<?php bloginfo('url'); ?>/wp-admin/post-new.php"
                           target="_blank"><?php _e('Add new post', 'mundothemes'); ?></a>
                    <?php endif; ?>
                <?php endif; ?>
                <?php $active = get_option('users_can_register');
                if ($active == "1") { ?>
                    <?php if (is_user_logged_in()) { ?>
                        <?php if ($url = get_option('editar_perfil')) { ?>
                            <a href="<?php echo $url; ?>"><?php _e('Edit profile', 'mundothemes'); ?></a>
                        <?php } else { ?>
                            <a href="<?php bloginfo('url'); ?>/wp-admin/profile.php"><?php _e('Edit profile', 'mundothemes'); ?></a>
                        <?php } ?>
                        <a href="<?php echo wp_logout_url(); ?>"><?php _e('Logout', 'mundothemes'); ?></a>
                    <?php } else { ?>
                        <a href="javascript:void(0)"
                           onclick="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'"><?php _e('Login / Registration', 'mundothemes'); ?></a>
                    <?php } ?>
                <?php } else { ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div id="contenedor">
    <div class="<?php global $post_type;
    if ($post_type == 'tvshows') {
        if (is_single()) { ?>tvshows_single <?php }
    }
    global $post_type;
    if ($post_type == 'episodes') {
        if (is_single()) { ?>tvshows_single <?php }
    } ?>contenido">
        <?php grifus_alertas_user(); ?>
        <div class="buscaformulario">
            <form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
                <input type="text" placeholder="<?php _e('Search..', 'mundothemes'); ?>" name="s" id="s"
                       value="<?php echo $_GET['s'] ?>">
            </form>
        </div>