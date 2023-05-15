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
			
			<label for="foto">Seleciona tu foto</label>
			<input type="file" name="imagen">

			<br><br><br>

			<label for="titulo">Titulo de la foto</label>
			<input type="text" name="titulo" id="titulo">

			<br><br><br>
			<input class="submit" name="guardar" type="submit" value="Subir Foto">

           
            <div class="mensaje">
	        <h1><?php echo $mensaje ?></h1>
            </div>


		</form>
        <br><br>
        <a href="contenido.php">Regresar</a>

		<br>
		
	
		</div>

</body>
</html>