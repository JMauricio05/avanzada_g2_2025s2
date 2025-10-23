<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'grupo_2_avanzada',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
// Opcional: activar Eloquent como ORM global
$capsule->setAsGlobal();
// Inicializa Eloquent
$capsule->bootEloquent();


use App\Controllers\UsuariosController;

$app = AppFactory::create();

$app->get('/', callable: function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->get('/sumar', callable: function (Request $req, Response $resp) {
    $suma = 2 + 2;
    $resp->getBody()->write("La suma es $suma");
    return $resp;
});

$app->get('/multiplicar', function (Request $request, Response $response) {
    $multiplicar = 5 * 4;
    $response->getBody()->write("La multiplicación es $multiplicar");
    return $response;
});

$app->get('/saludar', function (Request $request, Response $response) {
    $params = $request->getQueryParams();
    $nombre = $params['nombre'];
    $response->getBody()->write("Hola $nombre");
    return $response;
});

$app->get('/sumar2', function (Request $request, Response $response) {
    $params = $request->getQueryParams();
    $num1 = $params['num1'];
    $num2 = $params['num2'];
    //$result = $num1+$num2;
    $controller = new UsuariosController();
    $result = $controller->sumar($num1, $num2);
    //$response->getBody()->write("El resultado es: $result");
    $response->getBody()->write(json_encode($result));
    return $response->withHeader('Content-Type', 'application/json');
    //return $response;
});

$app->get('/users', function(Request $request, Response $response){
    $controller = new UsuariosController();
    $usuarios = $controller->consultarUsuarios();
    $response->getBody()->write($usuarios);
    return $response->withHeader('Content-Type', 'application/json');
});

$app->run();