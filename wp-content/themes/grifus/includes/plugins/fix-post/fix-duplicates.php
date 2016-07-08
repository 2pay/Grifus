<?php
function fix_duplicates_init() {
	$fix_duplicates_version = '1.0.3';
	$fix_duplicates_options = get_option( 'fix_duplicates_options' );
	if ( version_compare( $fix_duplicates_version, $fix_duplicates_options[ 'version' ], '>' ) ) {
		$fix_duplicates_options[ 'version' ] = $fix_duplicates_version;
		update_option( 'fix_duplicates_options', $fix_duplicates_options );
	}
	if ( is_admin() )
		require_once( 'fix-duplicates-admin.php' );
}
add_action( 'init', 'fix_duplicates_init', 0 );
?>