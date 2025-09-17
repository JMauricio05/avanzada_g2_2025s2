<?php
session_start();

if (empty($_SESSION["user"])){
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

$sql = "select * from users";

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

    <?php

    $result = $conexDb->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div>';
            echo 'Usuario: '.$row['userName'] .'<br>';
            echo 'Pwd: '.$row['password'];
            echo '</div><br>';
        }
    } else {

    }
    ?>
    <br>
    <a href="cerrar-sesion.php">Cerrar sesion</a>
</body>

</html>