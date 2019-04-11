<?php
/**
 * @package			E-rizo
 * @author			RogerTM
 * @license			GPLv2
 * @since 			1.0
 */

/**
 * Installation process
 *
 * @since E-rizo 1.0
 */

include( '../constants.php' );

if ( isset( $_POST['do-install'] ) ) :
	$host 		= ( isset( $_POST['host-name'] ) && ! empty( $_POST['host-name'] ) ) ? $_POST['host-name'] : null;
	$database	= ( isset( $_POST['database-name'] ) && ! empty( $_POST['database-name'] ) ) ? $_POST['database-name'] : null;
	$user		= ( isset( $_POST['user-name'] ) && ! empty( $_POST['user-name'] ) ) ? $_POST['user-name'] : null;
	$password	= ( isset( $_POST['user-password'] ) && ! empty( $_POST['user-password'] ) ) ? $_POST['user-password'] : null;

	if ( ! $host
		|| ! $database
		|| ! $user
		|| ! $password ) :
		$location = 'http://'. HOST_NAME .'/'. SITE_URI .'/?i=error';
	else :
		$dir	= '../';
		$config = '../config.php';
		$data[] = "<?php\n";
		$data[] = "/**\n";
		$data[] = " * Configuration for database connection\n";
		$data[] = " */\n";
		$data[]	= '$host		= "'. $host .'";'."\n";
		$data[]	= '$database	= "'. $database .'";'."\n";
		$data[]	= '$user		= "'. $user .'";'."\n";
		$data[]	= '$password	= "'. $password .'";'."\n";
		$data[]	= '$dsn			= "mysql:host='. $host .';dbname='. $database .'";'."\n";
		$data[]	= '$options		= array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );'."\n";
		$data[] = "?>";
		opendir( $dir );
		file_put_contents( $config, $data );
		closedir( opendir( $dir ) );

		if ( ! is_readable( $dir ) ) :
			$location = 'http://'. HOST_NAME .'/'. SITE_URI .'/?r=false';
		elseif ( ! file_exists( $config ) ) :
			$location = 'http://'. HOST_NAME .'/'. SITE_URI .'/?f=false';
		else :
			if ( file_exists( $config ) ) :
				require( $config );
				try {
					$connection = new PDO( "mysql:host=$host;dbname=$database", $user, $password, $options );
					$query = file_get_contents( "init.sql" );
					$connection->exec( $query );
					$location = 'http://'. HOST_NAME .'/'. SITE_URI .'/?i=true';
				} catch( PDOException $error ) {
					echo $sql . "<br>" . $error->getMessage();
					$location = 'http://'. HOST_NAME .'/'. SITE_URI .'/?i=false&sql='.$error->getMessage();
				}
			endif;
		endif;
	endif;

	header( 'Location: '. $location );
	exit();
endif;
?>
