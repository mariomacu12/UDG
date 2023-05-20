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
    <h1 class="titulo">Datos desde el archivo JSON</h1>
    <hr class="border">
    
    <div> Nombre: <?php echo $nombre; ?></div>
    <div> Email: <?php echo $email; ?></div>
    <div> Fecha de nacimiento: <?php echo $fecha_nacimiento; ?></div>
    
    <!-- botones para los formatos -->
    <hr>
    <div>
        <h4>Guardar datos en otros formatos</h4>
        <form method="post" action="">
            <button type="submit" name="btnPDF">PDF</button>
        </form>
        <form method="post" action="">
            <button type="submit" name="btnWord">Word</button>
        </form>
        <form method="post" action="">
            <button type="submit" name="btnExcel">Excel</button>
        </form>
    </div>
</div>
</body>
</html>