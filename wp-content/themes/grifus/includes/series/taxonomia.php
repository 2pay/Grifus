<?php

// Creator
function tax_tv_creator() {
	$labels = array(
		'name'                       => _x( 'Creator', 'Taxonomy General Name', 'mundothemes' ),
		'singular_name'              => _x( 'Creator', 'Taxonomy Singular Name', 'mundothemes' ),
		'menu_name'                  => __( 'Creator', 'mundothemes' ),
	);
	$rewrite = array(
		'slug'                       => get_option('tvshows-creator'),
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'tvcreator', array( 'tvshows' ), $args );
}
add_action( 'init', 'tax_tv_creator', 0 );
// Stars
function tax_tv_cast() {
	$labels = array(
		'name'                       => _x( 'Cast', 'Taxonomy General Name', 'mundothemes' ),
		'singular_name'              => _x( 'Cast', 'Taxonomy Singular Name', 'mundothemes' ),
		'menu_name'                  => __( 'Cast', 'mundothemes' ),
	);
	$rewrite = array(
		'slug'                       => get_option('tvshows-cast'),
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'tvcast', array( 'tvshows' ), $args );
}
add_action( 'init', 'tax_tv_cast', 0 );
// Studio
function tax_tv_studio() {
	$labels = array(
		'name'                       => _x( 'Studio', 'Taxonomy General Name', 'mundothemes' ),
		'singular_name'              => _x( 'Studio', 'Taxonomy Singular Name', 'mundothemes' ),
		'menu_name'                  => __( 'Studio', 'mundothemes' ),
	);
	$rewrite = array(
		'slug'                       => get_option('tvshows-studio'),
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'tvstudio', array( 'tvshows' ), $args );
}
add_action( 'init', 'tax_tv_studio', 0 );
// Neworks
function tax_tv_networks() {
	$labels = array(
		'name'                       => _x( 'Networks', 'Taxonomy General Name', 'mundothemes' ),
		'singular_name'              => _x( 'Networks', 'Taxonomy Singular Name', 'mundothemes' ),
		'menu_name'                  => __( 'Networks', 'mundothemes' ),
	);
	$rewrite = array(
		'slug'                       => get_option('tvshows-networks'),
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'tvnetworks', array( 'tvshows' ), $args );
}
add_action( 'init', 'tax_tv_networks', 0 );
// Year Serie
function tax_tv_year() {
	$labels = array(
		'name'                       => _x( 'Year', 'Taxonomy General Name', 'mundothemes' ),
		'singular_name'              => _x( 'Year', 'Taxonomy Singular Name', 'mundothemes' ),
		'menu_name'                  => __( 'Year', 'mundothemes' ),
	);
	$rewrite = array(
		'slug'                       => get_option('tvshows-year'),
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'tvyear', array( 'tvshows' ), $args );
}
add_action( 'init', 'tax_tv_year', 0 );