<?php
require __DIR__ ."/../../controllers/users-controller.php";

use App\Controllers\UsersController;

$usersController = new UsersController();

$user = $usersController->validarUsuario($_POST);
if(!empty($user)){
    header("Location: ../dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
    <h1>Sesión invalida</h1>
    <br>
    <a href="../login.php">Volver a inicio</a>
</body>
</html>