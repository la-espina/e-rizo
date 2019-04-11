<?php
/**
 * @package 	E-rizo
 * @author 		La Espina
 * @license 	GPLv2
 * @since 		1.0
 */

/**
 * Get some CONSTANTS
 */
require( 'constants.php' );

/**
 * Let's got for configuration file, if not exists, then create a new one
 *
 * @since E-rizo 1.0
 */
if ( file_exists( 'config.php' ) ) :
	require( 'config.php' );
else:
	// This is a new installation
	header( 'Location: http://'. HOST_NAME .'/'. SITE_URI .'/'. INSTALL_DIR );
	exit();
endif;
?>
