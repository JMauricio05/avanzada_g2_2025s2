<?php
//require __DIR__ . "/../controllers/session-controller.php";
require __DIR__ . "/../controllers/users-controller.php";

use App\Controllers\SessionController;
use App\Controllers\UsersController;

$sessionController = new SessionController();
$sessionController->validar("login.php");

$usersController = new UsersController();
$users = $usersController->getUsers();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../public/css/cards.css">
</head>

<body>
    <h1>Hola desde inicio</h1>
    <a href="operaciones/logout.php">Cerrar sesión</a>
    <br>
    <h2>Lista de usuarios</h2>
    <br>
    <!-- <a href="users-form.php">Crear usuario</a> -->
    <br>
    <section class="cards">
        <div class="card-user">
            <img class="icono" src="../public/res/user.svg" />
            <div class="id">Nuevo usuario</div>
            <div class="name">
                <a href="users-form.php">Crear usuario</a>
            </div>
        </div>
        <?php
        foreach ($users as $user) {
            echo '<div class="card-user">';
            echo '  <img class="icono" src="../public/res/user.svg" />';
            echo '  <div class="id">ID: ' . $user->get('id') . '</div>';
            echo '  <div class="name">Nombre: ' . $user->get('userName') . '</div>';
            echo '  <div class="btns">';
            echo '      <a href="users-form.php?cod=' . $user->get('id') . '">';
            echo '          <img class="icono" src="../public/res/editar.svg" />';
            echo '      </a>';
            echo '  </div>';
            echo '</div>';
        }
        if (count($users) == 0) {
            echo '<div>No hay usuarios regitrados</div>';
        }
        ?>
    </section>

</body>

</html>