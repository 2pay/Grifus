<?php
	register_taxonomy 
	( get_option('director'), 'post', array(
	/* ============================================= */
	'hierarchical' => false,  'label' => __( 'Directors', 'mundothemes' ),
	'query_var' => true, 'rewrite' => true)
	);
	register_taxonomy 
	( get_option('actor'), 'post', array(
	/* ============================================= */
	'hierarchical' => false,  'label' => __( 'Stars', 'mundothemes' ),
	'query_var' => true, 'rewrite' => true)
	);
	register_taxonomy 
	( get_option('elenco'), 'post', array(
	/* ============================================= */
	'hierarchical' => false,  'label' => __( 'Cast', 'mundothemes' ),
	'query_var' => true, 'rewrite' => true)
	);
	register_taxonomy 
	( get_option('year'), 'post', array(
	/* ============================================= */
	'hierarchical' => false,  'label' => __( 'Year', 'mundothemes' ),
	'query_var' => true, 'rewrite' => true)
	);
	register_taxonomy 
	( get_option('calidad'), 'post', array(
	/* ============================================= */
	'hierarchical' => false,  'label' => __( 'Quality', 'mundothemes' ),
	'query_var' => true, 'rewrite' => true)
	);
/* end filtros */