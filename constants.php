<?php
/**
 * @package		E-rizo
 * @author		La Espina
 * @license		GPLv2
 * @since 		1.0
 */

/**
 * Host name
 */
define( 'HOST_NAME', $_SERVER['HTTP_HOST'] );

/**
 * Site URi
 */
define( 'SITE_URI', trim(dirname($_SERVER['PHP_SELF']), '/\\') );

/**
 * Install directory
 */
define( 'INSTALL_DIR', 'install' );

/**
 * Game Name
 */
define( 'GAME_NAME', 'E-rizo' );
?>
