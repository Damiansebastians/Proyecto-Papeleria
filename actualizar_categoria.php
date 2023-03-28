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
                <h3>Actualizar categoria ⇒ </h3>
            </header>
            <div class="container">
                <form method="post" action="actualizar_categoria.php"><br>
                <select class="form-select" name="categorias">
                    <option>Seleccione Categoria</option>

                <?php

                $host = "localhost";
                $usuario = "Maria";
                $contraseña = "12345";
                $bbdd = "papeleria";

                $conexion = mysqli_connect($host, $usuario, $contraseña, $bbdd);

                $consulta = "SELECT nombre FROM categorias";
                $resultado = mysqli_query($conexion, $consulta);

                while ($fila = mysqli_fetch_row($resultado)) {
                    echo ('<option value="' . $fila[0] . '">' . $fila[0] . '</option>');
                }
                ?>
                </select><br><br>
                
                    <h1>INGRESO DE NUEVOS VALORES</h1>
                    <div class="row">
                    <div class="col-md-6 col-lg-8 mb-4">
                    <label class="form-label">Ingresar nuevo ID</label>
                    <input type="text" name="id" class="form-control" placeholder="ID de la categoria" autocomplete="off">
                    </div>
                    <div class="col-md-6 col-lg-8 mb-4">
                    <label class="form-label">Ingresar nuevo NOMBRE</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre de la categoria" autocomplete="off">
                    </div>
                    <div class="col-md-6 col-lg-8 mb-4">
                    <label class="form-label">Ingresar nueva DESCRIPCION</label>
                    <input type="text" name="descripcion" class="form-control" placeholder="Descripcion de la categoria" autocomplete="off"><br>
                    </div>
                    </div>
                    <div class="col-md-12 mb-3">
                    <button type="submit" class="e-button">Actualizar Categoria</button>
                </form>
            </div><br><br>
            <nav>
                <a href="index.php" class="e-button">PÁGINA PRINCIPAL</a>
            </nav>
        </body>

<?php

if ($_POST) {

    $categorias = $_POST['categorias'];
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    //INSERT PARA INGRESAR LOS DATOS
    $consulta2 = "UPDATE categorias SET codigocat='$id', nombre='$nombre', descripcion='$descripcion' WHERE NOMBRE='$categorias' ";
    $resultado = mysqli_query($conexion, $consulta2);

    echo "<table>";
    echo "<td><b> 🛆 La categoria " . $nombre . " ha sido ACTUALIZADA CORRECTAMENTE</td></b>";
    echo ("</table>");

    mysqli_close($conexion);
}
?>

    </html>