<?php
define( 'WP_USE_THEMES', false ); 
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

if(isset($_POST['emailAdmin'])){
	update_option( 'admin_email', $_POST['emailAdmin'] );
	update_option( 'blogname', $_POST['blognameC'] );
	echo json_encode(
		array( 	'sb' 	=> 'ok',
	));
}

