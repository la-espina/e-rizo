<?php
/**
 * @package		E-rizo
 * @author		La Espina
 * @license		GPLv2
 * @since 		1.0
 */
?>
<?php include( '../templates/header.php' ) ?>
			<div class="jumbotron my-5">
				<div class="text-center">
					<h1><?php echo GAME_NAME ?></h1>
					<p class="lead">Asistente de instalación</p>
				</div>
				<?php
				if ( isset( $_GET['i'] ) && $_GET['i'] == 'true' ) :
				?>
				<div class="alert alert-success" role="alert">
					<h4 class="alert-heading">Bien hecho!</h4>
					<p>La instalación ha sido realizada con éxito, ya puedes comenzar a jugar</p>
					<p><a href="#" class="btn btn-success">Comenzar a jugar</a></p>
				</div>
				<?php else : ?>
				<form action="install.php" method="post">
					<div class="form-group">
						<label for="host-name">Nombre del servidor</label>
						<small class="form-text text-muted">Normalmente <code>localhost</code></small>
						<input id="host-name" type="text" name="host-name" class="form-control">
					</div>
					<div class="form-group">
						<label for="database-name">Nombre de la base de datos</label>
						<small class="form-text text-muted">La base de datos debe estar previamente creada</small>
						<input id="database-name" type="text" name="database-name" class="form-control">
					</div>
					<div class="form-group">
						<label for="user-name">Nombre del usuario de la base de datos</label>
						<input id="user-name" type="text" name="user-name" class="form-control">
					</div>
					<div class="form-group">
						<label for="user-password">Contraseña del usuario de la base de datos</label>
						<input id="user-password" type="password" name="user-password" class="form-control">
					</div>
					<input type="submit" name="do-install" value="Instalar" class="btn btn-primary">
				</form>
			<?php endif; ?>
			</div>
<?php include( '../templates/footer.php' ) ?>
