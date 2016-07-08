<?php
// Director
function tax_episode_director() {
	$labels = array(
		'name'                       => _x( 'Director', 'Taxonomy General Name', 'mundothemes' ),
		'singular_name'              => _x( 'Director', 'Taxonomy Singular Name', 'mundothemes' ),
		'menu_name'                  => __( 'Director', 'mundothemes' ),
	);
	$rewrite = array(
		'slug'                       => get_option('episodios-director'),
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
	register_taxonomy( 'episodedirector', array( 'episodes' ), $args );
}
add_action( 'init', 'tax_episode_director', 0 );


// Year
function tax_episode_year() {
	$labels = array(
		'name'                       => _x( 'Year', 'Taxonomy General Name', 'mundothemes' ),
		'singular_name'              => _x( 'Year', 'Taxonomy Singular Name', 'mundothemes' ),
		'menu_name'                  => __( 'Year', 'mundothemes' ),
	);
	$rewrite = array(
		'slug'                       => get_option('episodios-year'),
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
	register_taxonomy( 'episodeyear', array( 'episodes' ), $args );
}
add_action( 'init', 'tax_episode_year', 0 );


// Guest star
function tax_episode_guest_star() {
	$labels = array(
		'name'                       => _x( 'Guest Star', 'Taxonomy General Name', 'mundothemes' ),
		'singular_name'              => _x( 'Guest Star', 'Taxonomy Singular Name', 'mundothemes' ),
		'menu_name'                  => __( 'Guest Star', 'mundothemes' ),
	);
	$rewrite = array(
		'slug'                       => get_option('episodios-guest-star'),
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
	register_taxonomy( 'episodegueststar', array( 'episodes' ), $args );
}
add_action( 'init', 'tax_episode_guest_star', 0 );


