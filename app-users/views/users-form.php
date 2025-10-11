<?php
$id = empty($_GET['cod']) ? null : $_GET['cod'];
$titulo = 'Registar usuarios';
$action = 'operaciones/crear-usuario.php';
if (!empty($id)) {
    $titulo = 'Modificar usuario';
    $action = 'operaciones/editar-usuario.php';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
</head>

<body>
    <h1><?php echo $titulo; ?></h1>
    <a href="dashboard.php">Volver</a>
    <br>
    <form action="<?php echo $action; ?>" method="post">
        <?php
        if (!empty($id)) {
            echo '<input type="hidden" name="id" value="' . $id . '">';
        }
        ?>
        <fieldset>
            <legend><?php echo $titulo; ?></legend>
            <div>
                <label for="user">Usuario</label>
                <input type="text" name="user" id="user">
            </div>
            <div>
                <label for="pwd">Password</label>
                <input type="password" name="pwd" id="pwd">
            </div>
        </fieldset>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>