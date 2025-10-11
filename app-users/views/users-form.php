<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registar usuarios</title>
</head>
<body>
    <h1>Registar usuarios</h1>
    <a href="dashboard.php">Volver</a>
    <br>
    <form action="operaciones/crear-usuario.php" method="post">
        <fieldset>
            <legend>Registar usuario</legend>
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