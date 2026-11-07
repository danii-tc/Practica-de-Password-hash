<?php   
    session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css" type="text/css">
    <title> </title>
</head>
<body>
    <div class="titulo">
        <h1>Registro</h1>
    </div>
    <div class="texto">
        <p>Completa el formulario de registro</p>
    </div>
    <form method="POST" action="">
        <label for="string">Nombre:</label>
        <br>
        <input type="string" step="any" name="nom" id="nom" required>
        <br><br>
        <label for="user">Nombre de usuario:</label>
        <br>
        <input type="string" step="any" name="us" id="us" required>
        <br><br>
        <label for="pass">Contraseña:</label>
        <br>
        <input type="string" step="any" name="pass" id="pass" required>
        <br><br>
        <label for="pass_cf">Confirmación de contraseña:</label>
        <br>
        <input type="string" step="any" name="con" id="con" required>
        <br><br>
        <button type="submit" name="registrar">Registrar</button>
        <br><br>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registrar'])) {
        // guardar valores
        $n = strval($_POST['nom']); 
        $u = strval($_POST['us']); 
        $p = strval($_POST['pass']); 
        $c = strval($_POST['con']); 
        if ( (strlen($p) >= 6) && ($p == $p) ){
            // hacer el registro
            if (isset($_SESSION['user_reg']) && in_array($u, array_column($_SESSION['user_reg'], 'user'))) {
                echo "<p>El nombre de usuario ' $u ' no esta disponible</p>";
            } else {
                $datos = ['name' => $n, 'user' => $u, 'pass' => $p];
                // Guardamos en una lista de usuarios dentro de la sesión
                $_SESSION['user_reg'][] = $datos;
                echo "<p>Se registró correctamente el usuario</p>";
            }
        }else{
            echo "<p>Revisa que tu contraseña y la confirmación coincidan y que incluya al menos 6 caracteres.</p>";
        }
    }
    ?>
    <br>
    <div class="btn">
        <a href="login.php">
            <button type="button">Ir al login</button>
        </a>
    </div>
</body>
</html>
