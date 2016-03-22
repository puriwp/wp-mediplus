<?php 

/**************************************************************************

Plugin Name:  Mediplus Plugins
Plugin URI:   
Description:  Package core for mediplus theme.
Version:      1.0
Author:       Minimal Themes
Author URI:   http://themeforest.net/user/minimalthemes
License:      GPLv2 or later

Text Domain:  mediplus
Domain Path:  

**************************************************************************/

foreach ( glob( dirname( __FILE__ ) . '/custom-post-type/*.php' ) as $file ) {
	require_once $file;
}

require_once dirname( __FILE__ ) . '/shortcode.php';