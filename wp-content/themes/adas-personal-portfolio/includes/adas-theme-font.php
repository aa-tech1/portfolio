<?php

function adas_personal_portfolio_enqueue_assets() {
	// Include the file.
	require_once get_theme_file_path( '/includes/wptt-webfont-loader.php' );
	
	// Load the webfont.
	wp_enqueue_style(
		'Poppins',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' ),array(),'1.0.0'
	);
}
add_action( 'wp_enqueue_scripts', 'adas_personal_portfolio_enqueue_assets' );