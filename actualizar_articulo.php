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
        <h3>Actualizar artículos ⇒ </h3>
    </header>
    <div class="container">
        <div class="row">
            <form method="post" action="actualizar_articulo.php">
                <h1>INGRESO DE NUEVOS VALORES</h1><br>
                <div class="col-md-12 mb-2">
                <label class="form-label">Artículo a actualizar</label>
                <select class="form-select" name="articulos">
                    <option>Seleccione articulo</option>

                    <?php

                    $host = "localhost";
                    $usuario = "Maria";
                    $contraseña = "12345";
                    $bbdd = "papeleria";

                    $conexion = mysqli_connect($host, $usuario, $contraseña, $bbdd);

                    //MEDIANTE CONSULTA, OBTENGO LOS NOMBRES DE LOS ARTICULOS
                    $consulta = "SELECT nombre FROM articulos";
                    $resultado = mysqli_query($conexion, $consulta);

                    while ($fila = mysqli_fetch_row($resultado)) {
                        echo ('<option value="' . $fila[0] . '">' . $fila[0] . '</option>');
                    }
                    ?>
                </select></div>

                <div class="col-md-6 mb-2">
                    <label class="form-label">Ingresar nuevo ID</label>
                    <input type="text" name="id" class="form-control" placeholder="ID del articulo" autocomplete="off">
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label">Ingresar nuevo NOMBRE</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre del articulo" autocomplete="off">
                </div><br>
                <div class="col-md-6 mb-2">
                    <label class="form-label">Ingresar nueva UNIDADES</label>
                    <input type="text" name="unidades" class="form-control" placeholder="Unidades del articulo" autocomplete="off">
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label">Ingresar nuevo PRECIO</label>
                    <input type="text" name="precio" class="form-control" placeholder="Precio del articulo" autocomplete="off">
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label">Ingresar nueva FOTO</label>
                    <input type="file" name="foto" class="form-control" placeholder="Foto del articulo">
                </div>
                <div class="col-md-6 mb-2">
                <label class="form-label">Ingresar nueva CATEGORIA</label>
                <select class="form-select" name="categoria">
                    <option>Seleccione Categoria</option>

                    <?php

                    $host = "localhost";
                    $usuario = "Maria";
                    $contraseña = "12345";
                    $bbdd = "papeleria";

                    $conexion = mysqli_connect($host, $usuario, $contraseña, $bbdd);

                    $consulta = "SELECT codigocat, nombre FROM categorias";
                    $resultado = mysqli_query($conexion, $consulta);

                    while ($fila = mysqli_fetch_row($resultado)) {
                        echo '<option value="' . $fila[0] . '">' . $fila[0] . ' - ' . $fila[1] . '</option>';
                    }
                    ?>
                </select><br>
                </div>
                    <button type="submit" class="e-button">ACTUALIZAR ARTÍCULO</button>
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
    $articulos = $_POST['articulos'];

    //INSERT PARA INGRESAR LOS DATOS
    $consulta2 = "UPDATE articulos SET codigo='$id', nombre='$nombre', unidades='$unidades', codigocat='$categoria', precio='$precio', foto='<img src=\"img/$foto\">' WHERE nombre='$articulos' ";
    $resultado = mysqli_query($conexion, $consulta2);

    echo "<table>";
    echo "<td><b> 🛆 El articulo " . $nombre . " ha sido ACTUALIZADO CORRECTAMENTE</td></b>";
    echo ("</table>");

    mysqli_close($conexion);
}
?>

</html>