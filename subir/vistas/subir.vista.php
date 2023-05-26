<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir</title>
</head>
<body>
    <div>
        <h1>Subiendo archivo</h1>
        <form method="post" enctype="multipart/form-data">
            <div>
                <label for="archivo">Selecciona un archivo</label>
                <input type="file" name="archivo"/>
            </div>
            <button type="submit" name="upload">Subir</button>
        </form>
    </div>
</body>
</html>