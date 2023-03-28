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
                <h3>Login de usuarios ⇒ </h3>
            </header>
            <div class="container">
                <form method="post" action="login.php"><br>
                    <h1>INGRESO DE USUARIOS</h1>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ingrese usuario</label>
                            <input type="text" name="usuario" class="form-control" autocomplete="off"><br>
                            <label class="form-label">Ingrese contraseña</label>
                            <input type="password" name="contraseña" class="form-control" autocomplete="off"><br>
                            <button type="submit" class="e-button">LOGIN</button>
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

    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];
    $consulta = "SELECT * FROM usuarios WHERE nombre_usuario LIKE '$usuario' AND contraseña_usuario ='$contraseña'";

    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        
        echo "<table>";
        echo "<tr><td><b> 🛆 Usuario logueado CORRECTAMENTE </b></td></tr>";
        echo "<tr><td><b> ⇒ ⇒ Será redirigido al MENU PRINCIPAL... </b></td></tr>";
        echo "</table>";
        
        //creamos las cookies
        setcookie("usuario",$usuario, time()+(60*60*20*30));
        setcookie("contraseña",$contraseña, time()+(60*60*20*30));

        // SESSION
        //session_start();
        //$_SESSION['usuario'] = $usuario;
        
        //PASAR POR HEADER
        echo "<script>
            setTimeout(function() {
                location.href = 'index.php';
            }, 4000);
            </script>";
        

    } else {
        echo "<table>";
        echo "<td><b> 🛆 Usuario incorrecto o no registrado en el sistema</td></b>";
        echo ("</table>");
    }

    mysqli_close($conexion);
}
?>

    </html>