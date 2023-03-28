<!DOCTYPE html>
    <html lang="en">
        <head>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="style.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Proyecto - Papeleria</title>
        </head>
        <body>
        <br>
            <header>
                <h1>TIENDA DE ARTÍCULOS DE PAPELERIA</h1>
                <h3>Ingresar categoria ⇒ </h3>
            </header>
            <div class="container">
                <form method="post" action="crear_categoria.php"><br>
                    <h1>INGRESO DE CATEGORIAS</h1>

                    <label class="form-label">ID<input type="text" name="id" class="form-control" placeholder="ID de la categoria" autocomplete="off"></label><br>
                
                    <label class="form-label">NOMBRE</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre de la categoria" autocomplete="off">

                    <label class="form-label">DESCRIPCION</label>
                    <input type="text" name="descripcion" class="form-control" placeholder="Descripcion de la categoria" autocomplete="off"><br>

                <button type="submit" class="e-button">Guardar Categoria</button>
                </form>
            </div><br>
            <nav>
                <a href="index.php" class="e-button">PÁGINA PRINCIPAL</a>
            </nav>
        </body>

<?php

if ($_POST) {

    $host = "localhost";
    $usuario = "Maria";
    $contraseña = "12345";
    $bbdd = "papeleria";

    $conexion = mysqli_connect($host, $usuario, $contraseña, $bbdd);

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    //INSERT PARA INGRESAR LOS DATOS
    $consulta = "INSERT INTO categorias (codigocat, nombre, descripcion) VALUES('$id', '$nombre', '$descripcion')";
    $resultado = mysqli_query($conexion, $consulta);

    echo "<table>";
    echo "<td><b> 🛆 La categoria " . $nombre . " ha sido CREADA CORRECTAMENTE</td></b>";
    echo ("</table>");

    mysqli_close($conexion);
}
?>

    </html>