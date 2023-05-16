<?php include 'subir.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>subir archivo</title>
</head>
<body>

	<div class="contenedor">
		<h1 class="titulo">subir archivo</h1>
		<div class="contenedor">
		<form class="formulario" action="backend/subir.php" method="post" enctype="multipart/form-data">
			
			<label for="archivo">Seleciona tu archivo</label>
			<input type="file" name="file">

			<br><br><br>
			<input class="submit" name="guardar" type="submit" value="Subir archivo">



		</form>
        <br><br>
        <a href="contenido.php">Regresar</a>

		<br>
		
	
		</div>

</body>
</html>