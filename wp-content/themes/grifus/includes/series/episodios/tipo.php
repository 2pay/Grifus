<?php
// Register Series
function episodios() {

	$labels = array(
		'name'                => _x( 'Episode', 'Post Type General Name', 'mundothemes' ),
		'singular_name'       => _x( 'Episodes', 'Post Type Singular Name', 'mundothemes' ),
		'menu_name'           => __( 'Episodes', 'mundothemes' ),
		'name_admin_bar'      => __( 'Episodes', 'mundothemes' ),
	);
	$rewrite = array(
		'slug'                => get_option('episodios-slug'),
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'Episode', 'mundothemes' ),
		'description'         => __( 'Episode manage', 'mundothemes' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail','comments' ),
		'taxonomies'          => array(  ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-controls-play',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => false,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'episodes', $args );
}
add_action( 'init', 'episodios', 0 );


// Metadatos y taxonomias
include('metabox.php');
include('taxonomia.php');