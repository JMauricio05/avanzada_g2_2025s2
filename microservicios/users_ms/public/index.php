<?php
// use Psr\Http\Message\ResponseInterface as Response;
// use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../app/Config/database.php';

$enpoints = require __DIR__ . '/../app/Endpoints/endpoints.php';
$token = require __DIR__.'/../app/Middleware/Token.php';

$app = AppFactory::create();

$token($app);

$enpoints($app);

// $app->get('/', function (Request $request, Response $response, $args) {
//     $response->getBody()->write("Hello world!");
//     return $response;
// });

$app->run();
