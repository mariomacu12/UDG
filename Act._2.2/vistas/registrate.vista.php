<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crea una cuenta</title>
</head>
<body>
<div class="contenedor">
		<h1 class="titulo">Regístrate</h1>
		
		<hr class="border">

		<form class="formulario" name="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<div class="form-group">
				<input class="usuario" type="text" name="usuario" placeholder="Nombre">
			</div>

			<div class="form-group">
				<input class="email" type="email" name="email" placeholder="Correo Eléctronico">
			</div>

			<div class="form-group">
				<input class="fecha_nacimiento" type="date" name="fecha_nacimiento" placeholder="Fecha de nacimiento">
			</div>

			<div class="form-group">
			<input class="password" type="password" name="password" placeholder="Contraseña">
				<i class="submit-btn" onclick="login.submit()">BOTON AQUI</i>
			</div>


			<?php
			$nombre = $_POST['usuario'];
			$correo = $_POST['email'];
			$fecha_nacimiento= $_POST['fecha_nacimiento'];
			$tiempo = 90*60*24*60+time();
			
			
			setcookie('nombre', $nombre, $tiempo);
			setcookie('correo', $correo, $tiempo);
			setcookie('fecha_nacimiento', $fecha_nacimiento, $tiempo);
			?>
			
			
		

		</form>

		<p class="texto-registrate">
			¿ Ya tienes cuenta ?
			<a href="inicio_sesion.php">Iniciar Sesión</a>
		</p>

	</div>
</body>
</html>