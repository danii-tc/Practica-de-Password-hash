
<?php
    session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilitos.css" type="text/css">
    <title>Login</title>
</head>
<body>
    <div class="titulo">
        <h1>Login</h1>
        <br>
    </div>
    <form method="POST" action="" class="login">
        <label for="user">Nombre de usuario:</label>
        <br>
        <input type="text" name="user" id="user" required>
        <br><br>
        <label for="pass">Contraseña:</label>
        <br>
        <input type="password" name="pass" id="pass" required>
        <br><br>
        <button type="submit" name="login">Login</button>
        <br><br>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) { 
        // guardar valores
        $u = strval($_POST['user']); 
        $p = strval($_POST['pass']);
        $user = 0;
        if (isset($_SESSION['user_reg'])) {
            foreach ($_SESSION['user_reg'] as $us) {
                if ($us['user'] === $u) {
                    if (password_verify($p, $us['pass'])) {
                        $user = 1;
                        $_SESSION['user_act'] = $us['name'];
                        break;
                    }
                }
            }
        }
        if ($user) {
            header("Location: principal.php");
            exit(); 
        } else {
            echo "<p>Usuario o contraseña incorrectos</p>";
        }
    }
    ?>
    <br>
    <div class="btn">
        <a href="registro.php">
            <button type="button">Registrarse</button>
        </a>
    </div>
</body>
</html>
