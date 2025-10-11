<?php
require __DIR__ ."/../../controllers/users-controller.php";

use App\Controllers\SessionController;
use App\Controllers\UsersController;

$sessionController = new SessionController();
$sessionController->validar("../login.php");

$usersController = new UsersController();

$status = $usersController->deleteUser($_POST);
if ($status) {
    header("Location: ../dashboard.php");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar usuario</title>
</head>
<body>
    <h1>Error al borrar</h1>
    <p>Se presentó un error al borrar los datos</p>
    <a href="../dashboard.php">Volver</a>
</body>
</html>