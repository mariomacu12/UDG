<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mi info</title>
</head>
<body>

	

	<div class="contenedor">
		<h1 class="titulo">Esta es tu información</h1>
	  	 
		<p> Tu nombre es <?php echo $_COOKIE['nombre']?>, tu correo eléctronico es: <?php echo $_COOKIE['correo']?> <br>
			tu fecha de nacimiento es <?php echo $_COOKIE['fecha_nacimiento']?>

  <br><br>Has elegido el color: <?php echo $_COOKIE['color']?>


  <br><br>"Esta información se ha guardado en COOKIES"

		</p>

	</div>

	<br>
			<br>
				<a href="contenido.php">Regresar</a>
			<br>
			<br>
			<br>
				<a href="cerrar.php">Cerrar Sesion</a>
			   
</body>
</html>