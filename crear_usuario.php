<!DOCTYPE html>
    <html lang="en">
        <head>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="style.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
            </script>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Proyecto - Papeleria</title>
        </head>
        <body>
        <br>
            <header>
                <h1>TIENDA DE ARTÍCULOS DE PAPELERIA</h1>
                <h3>Crear usuario ⇒ </h3>
            </header>
            <div class="container">
                <form method="post" action="crear_usuario.php"><br>
                    <h1>REGISTRO DE USUARIOS</h1>
                
                    <div class="row">
                        <div class="col-md-6 mb-3">

                            <label class="form-label">NOMBRE</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre de usuario" autocomplete="off" required >

                            <label class="form-label" for="pass1">CONTRASEÑA</label>
                            <input type="password" name="contraseña" id="password1" class="form-control" placeholder="Contraseña de usuario" autocomplete="off" required>

                            <label class="form-label" for="pass2">CONFIRMAR CONTRASEÑA</label>
                            <input type="password" id="password2" class="form-control" placeholder="Confirmar Contraseña" autocomplete="off" required><br>

                            <div id="passwordMismatch" style="color:red;display:none;">🛆 Las contraseñas no coinciden 🛆</div><br>

                            <button type="submit" class="e-button" id="submitBtn" disabled>REGISTRARSE</button>
                    </div>
                        </div>
                </form>
            </div><br>

            <script>
                const password1 = document.getElementById('password1');
                const password2 = document.getElementById('password2');
                const passwordMismatch = document.getElementById('passwordMismatch');
                const submitBtn = document.getElementById('submitBtn');

                function validatePasswords() {
                    if (password1.value !== password2.value) {
                    passwordMismatch.style.display = 'block';
                    submitBtn.disabled = true;
                    } else {
                    passwordMismatch.style.display = 'none';
                    submitBtn.disabled = false;
                    }
                }

                password1.addEventListener('input', validatePasswords);
                password2.addEventListener('input', validatePasswords);
            </script>

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

    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];

    //INSERT PARA INGRESAR LOS DATOS
    $consulta = "INSERT INTO usuarios (nombre_usuario, contraseña_usuario) VALUES('$nombre', '$contraseña')";
    $resultado = mysqli_query($conexion, $consulta);

    echo "<table>";
    echo "<td><b> 🛆 El usuario " . $nombre . " ha sido CREADO CORRECTAMENTE</td></b>";
    echo ("</table>");

    mysqli_close($conexion);
}
?>

    </html>