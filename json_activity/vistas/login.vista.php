<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contenido</title>
</head>
<body>
    <h1>Tarea JSON</h1>
    <!-- usuario registrado -->
    <div>
        <h3 >Inicia sesión</h3>	
        <form class="formulario_multiple" name="multi_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <input class="usuario" type="text" name="usuario" placeholder="Nombre">
            </div>

            <div class="form-group">
                <input class="password" type="password" name="password" placeholder="Password">
            </div>
            <input type="submit" value="Ingresar"/>
        </form>
    </div>

    <hr class="border">
    
    <!-- nuevo usuario -->
    <div>

    </div>
        <p class="texto-registrate">
			¿ Aun no tienes cuenta ?
			<a href="registro.php">Registrate</a>
		</p>
    </br>

</body>
</html>