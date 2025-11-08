<?php
use App\Repositories\UserRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
    $app->get('/', function (Request $request, Response $response, $args) {
        $response->getBody()->write("Hello world!");
        return $response;
    });

    $app->post('/login', [UserRepository::class, 'login']);

    $app->group('/users', function (RouteCollectorProxy $group) {
        $group->get('/', [UserRepository::class, 'queryAllUsers']);
    });
};