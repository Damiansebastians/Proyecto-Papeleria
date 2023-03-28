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
                <h3>Ver y eliminar categorias existentes ⇒ </h3>
            </header>
            <div class="container">
                <form method="post" action="eliminar_categorias.php"><br>
                    <h1>LISTADO DE CATEGORIAS</h1>
                <select class="form-select" name="categorias">
                    <option>Seleccione Categoria</option>

                <?php

                $host = "localhost";
                $usuario = "Maria";
                $contraseña = "12345";
                $bbdd = "papeleria";

                $conexion = mysqli_connect($host, $usuario, $contraseña, $bbdd);

                //MEDIANTE CONSULTA, OBTENGO LOS NOMBRES DE LOS PRODUCTOS
                $consulta = "SELECT nombre FROM categorias";
                $resultado = mysqli_query($conexion, $consulta);

                while ($fila = mysqli_fetch_row($resultado)) {
                    echo ('<option value="' . $fila[0] . '">' . $fila[0] . '</option>');
                }
                ?>
                </select>
                <button type="submit" class="e-button">ELIMINAR CATEGORIA SELECCIONADA</button>
                </form>
            </div><br><br>
            <nav>
                <a href="index.php" class="e-button">PÁGINA PRINCIPAL</a>
            </nav>
        </body>

<?php

if ($_POST) {

    $categorias = $_POST["categorias"];

    $consulta2 = "DELETE FROM categorias WHERE nombre ='$categorias'";
    $resultado2 = mysqli_query($conexion, $consulta2);

    echo "<table>";
    echo "<td><b> 🛆 La categoria " . $categorias . " ha sido ELIMINADA CORRECTAMENTE</td></b>";
    echo ("</table>");

    
    mysqli_close($conexion);
}

?>

    </html>