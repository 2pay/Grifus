<?php
// Noticias
function noticias() {
	$labels = array(
		'name'                => _x( 'News', 'Post Type General Name', 'mundothemes' ),
		'singular_name'       => _x( 'New', 'Post Type Singular Name', 'mundothemes' ),
		'menu_name'           => __( 'News', 'mundothemes' ),
		'parent_item_colon'   => __( 'Parent Item:', 'mundothemes' ),
		'all_items'           => __( 'All News', 'mundothemes' ),
		'view_item'           => __( 'View news', 'mundothemes' ),
		'add_new_item'        => __( 'Add news', 'mundothemes' ),
		'add_new'             => __( 'Add news', 'mundothemes' ),
		'edit_item'           => __( 'Edit', 'mundothemes' ),
		'update_item'         => __( 'Update', 'mundothemes' ),
		'search_items'        => __( 'Search', 'mundothemes' ),
		'not_found'           => __( 'It was not found', 'mundothemes' ),
		'not_found_in_trash'  => __( 'Was found in the trash', 'mundothemes' ),
	);
	$rewrite = array(
		'slug'                => get_option('news'),
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'news', 'mundothemes' ),
		'description'         => __( 'Add news', 'mundothemes' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'comments' ),
		'taxonomies'          => array( 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-rss',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'noticias', $args );
}
add_action( 'init', 'noticias', 0 );