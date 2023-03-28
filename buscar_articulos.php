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
                <h3>Buscar un artículo ⇒ </h3>
            </header>
            <div class="container">
                <form method="post" action="buscar_articulos.php"><br>
                    <h1>BUSQUEDA DE ARTÍCULOS</h1>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ingrese nombre del artículo</label>
                            <input type="text" name="busqueda" class="form-control" autocomplete="off"><br>
                            <button type="submit" class="e-button">CONSULTAR</button>
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

    $host = "localhost";
    $usuario = "Maria";
    $contraseña = "12345";
    $bbdd = "papeleria";

    $conexion = mysqli_connect($host, $usuario, $contraseña, $bbdd);

    $busqueda = $_POST["busqueda"];
    $consulta = "SELECT codigo, nombre, unidades, precio, codigocat, foto FROM articulos WHERE Nombre LIKE '%$busqueda%'";

    //CON EL RESULTADO, CREAMOS LA TABLA A MOSTRAR
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        echo "<table align='center' border='2' width='45%'>";
        echo "<tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Unidades</th>
        <th>Precio</th>
        <th>Código Cat</th>
        <th>Foto</th>
        </tr>";

        while ($fila = mysqli_fetch_row($resultado)) {
            echo "<tr>";
            echo "<td>" . $fila[0] . "</td>";
            echo "<td>" . $fila[1] . "</td>";
            echo "<td>" . $fila[2] . "</td>";
            echo "<td>" . $fila[3] . "</td>";
            echo "<td>" . $fila[4] . "</td>";
            echo "<td>" . $fila[5] . "</td>";
            echo "</tr>";
        } {
            echo "</table>";
        }
    } else {
        echo "<table>";
        echo "<td><b> 🛆 No se ha encontrado artículo con el nombre ingresado</td></b>";
        echo ("</table>");
    }

    mysqli_close($conexion);
}
?>

    </html>