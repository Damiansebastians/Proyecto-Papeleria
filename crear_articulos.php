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
                <h3>Ingresar artículos ⇒ </h3>
            </header><br>
            <div class="container">
                <form method="post" action="crear_articulos.php">
                <h1>INGRESO DE ARTÍCULOS</h1>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">ID</label>
                                <input type="text" name="id" class="form-control" placeholder="Código del artículo">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">CATEGORÍA</label>
                            <select class="form-select" name="categoria" aria-label="Default select example">
                    <option>Seleccione Categoría</option>
                    <?php
                    $host = "localhost";
                    $usuario = "Maria";
                    $contraseña = "12345";
                    $bbdd = "papeleria";

                    $conexion = mysqli_connect($host, $usuario, $contraseña, $bbdd);

                    $consulta = "SELECT codigocat, nombre FROM categorias";
                    $resultado = mysqli_query($conexion, $consulta);

                    while ($fila = mysqli_fetch_row($resultado)) {
                        echo ('<option value="' . $fila[0] . '">' . $fila[0] . " - " . $fila[1] . '</option>');
                    }
                    ?>
                </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">NOMBRE</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre del artículo" autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">PRECIO</label>
                            <input type="text" name="precio" class="form-control" placeholder="Precio del artículo" autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">UNIDADES</label>
                            <input type="number" name="unidades" class="form-control" placeholder="Unidades del artículo" autocomplete="off">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">FOTO</label>
                            <input type="file" name="foto" class="form-control" placeholder="Foto del artículo">
                        </div>
                        <div class="col-md-12 mb-3"><br>
                            <button type="submit" class="e-button">Ingresar artículo</button>
                        </div>
                    </div>
                </form>
            </div><br>
            <nav>
                <a href="index.php" class="e-button">PÁGINA PRINCIPAL</a>
            </nav>
        </body>

<?php

if ($_POST) {

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];
    $unidades = $_POST['unidades'];
    $foto = $_POST['foto'];

    //INSERT PARA INGRESAR LOS DATOS
    $consulta2 = "INSERT INTO articulos (codigo, nombre, unidades, precio, codigocat, foto) VALUES('$id', '$nombre', '$unidades', '$precio' ,'$categoria', '<img src=\"img/$foto\">')";
    $resultado = mysqli_query($conexion, $consulta2);

    echo "<table>";
    echo "<td><b> 🛆 El artículo " . $nombre . " ha sido CREADO CORRECTAMENTE</td></b>";
    echo ("</table>");

    mysqli_close($conexion);
}
?>

    </html>