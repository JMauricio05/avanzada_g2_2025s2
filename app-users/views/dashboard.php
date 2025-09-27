<?php
require __DIR__ ."/../controllers/session-controller.php";

use App\Controllers\SessionController;

$sessionController = new SessionController();
$sessionController->validar("login.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <h1>Hola desde inicio</h1>
    <a href="operaciones/logout.php">Cerrar sesión</a>


</body>
</html>