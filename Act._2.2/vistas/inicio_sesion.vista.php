<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia Sesión</title>
</head>
<body>
	<div class="contenedor">
		<h1 class="titulo">Iniciar Sesión</h1>
		
		<hr class="border">

		<form class="formulario" name="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<div class="form-group">
			<input class="usuario" type="text" name="usuario" placeholder="Nombre" value="norma">
			</div>

			<div class="form-group">
			<input class="password" type="password" name="password" placeholder="Password" value="norma">
				<i class="submit-btn" onclick="login.submit()">BOTON AQUI</i>
			</div>

			
		</form>

		<p class="texto-registrate">
			¿ Aun no tienes cuenta ?
			<a href="registrate.php">Regístrate</a>
		</p>

	</div>
</body>
</html>