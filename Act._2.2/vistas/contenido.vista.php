<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contenido</title>
</head>
<body>


	<div class="cookie_visita">
	 <h1><?php echo "Tu ultima visita fue: " . $visita ?></h1>
	 
    </div>

	

	<div class="contenedor">
		<h1 class="titulo">Bienvenido a tu sesion <?php echo $_COOKIE['nombre']?></h1>
	</div>


	<form class="formulario_multiple" name="multi_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			
	  <label for="cars">Cual color te gusta mas?</label><br><br>

      <select name="color" id="color" multiple>
      <option value="azul">Azul</option>
      <option value="rojo">Rojo</option>
      <option value="amarillo">Amarillo</option>
      <option value="blanco">Blanco</option>
	
      </select> 

	   <br><br><i name="submit" class="submit-btn" onclick="multi_form.submit()">Una vez elegido el color "PRESIONA AQUI"</i>

	    <?php
			$color_favorito = $_POST['color'];
			$tiempo = 90*60*24*60+time();
			
			
			setcookie('color', $color_favorito, $tiempo);
			
	    ?>

    </form>


	       <br>
		   <br>
		       <a href="index_json.php">Formulario a JSON</a>
		    <br>
		    <br>
		    <br>
		       <a href="index.subir.php">Subir imagen</a>
		    <br>
	        <br>
			<br>
				<a href="cookies_usuario.php">Ver mi información</a>
			<br>
			<br>
			<br>
				<a href="cerrar.php">Cerrar Sesion</a>
			   



</body>
</html>