<?php
session_start();

if (empty($_SESSION["user"])) {
    header("Location: index.html");
}

$hostDb = "localhost";
$nameDb = "grupo_2_avanzada";
$userDb = "root";
$pwdDb = "";

$conexDb = new mysqli(
    $hostDb,
    $userDb,
    $pwdDb,
    $nameDb
);

if ($conexDb->connect_error) {
    die("Error de conexion db" . $conexDb->connect_error);
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h1>Hola <?php echo $_SESSION['user']; ?></h1>
    <form action="db/crear-usuario.php" method="post">
        <fieldset>
            <legend>Crear usuario</legend>
            <div>
                <label for="user">Usuario:</label>
                <input type="text" name="user" id="user" required>
            </div>
            <div>
                <label for="pwd">Contrasenia:</label>
                <input type="password" name="pwd" id="pwd" required>
            </div>
            <div>
                <button type="submit">Crear</button>
            </div>
        </fieldset>
    </form>
    <?php
    
    $sql = "select * from users";
    $result = $conexDb->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div>';
            echo 'Usuario: ' . $row['userName'] . '<br>';
            echo 'Pwd: ' . $row['password'];
            echo '<a href="db/borrar-usuario.php?cod='.$row['id'].'">borrar</a>';
            echo '</div><br>';
        }
    } else {

    }
    ?>
    <br>
    <a href="cerrar-sesion.php">Cerrar sesion</a>
</body>

</html>