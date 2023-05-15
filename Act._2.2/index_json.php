<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Ingresa tus datos para guardarlos en un archivo JSON</h1>


<form name="form_jason" action="guardar_json.php" method="POST">
			<div>
                <label for="nombre"></label>
				<input type="text" name="nombre" placeholder="Nombre">
			</div>

			<div>
                <label for="apellido"></label>
				<input type="text" name="apellido" placeholder="Apellido">
			</div>

			<div>
                <label for="edad"></label>
				<input type="text" name="edad" placeholder="Edad">
			</div>

            <div>
				<input type="submit" name="submit" value="Guardar">
			</div>

	
			
			</form>
</body>
</html>