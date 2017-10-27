<?php

//add_filter( 'amp_post_template_file', 'aceify_amp_set_custom_template', 10, 3 );

function aceify_amp_set_custom_template( $file, $type, $post ) {
	if ( 'single' === $type ) {
		$file = get_stylesheet_directory() . '/templates/amp/single.php';
	}
	return $file;
}

add_filter( 'amp_post_template_data', 'aceify_amp_set_site_icon_url' );

function aceify_amp_set_site_icon_url( $data ) {
	// Ideally a 32x32 image
	$data[ 'site_icon_url' ] = get_stylesheet_directory_uri() . '/img/favicon-32x32.png';
	return $data;
}

?>