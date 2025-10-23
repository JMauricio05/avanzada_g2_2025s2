<?php

use App\Controllers\UsersController;
use Slim\App;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
    $app->get('/', function (Request $request, Response $response, $args) {
        $response->getBody()->write("Hello world!");
        return $response;
    });

    $app->group('/users', function (RouteCollectorProxy $group) {
        $group->get('/', function (Request $request, Response $response) {
            $usersController = new UsersController();
            $data = $usersController->index();
            $response->getBody()->write($data);
            return $response->withHeader('Content-Type', 'application/json');
        });

        $group->get('/{id}', function(Request $request, Response $response, $args){
            $id = $args['id'];
            $usersController = new UsersController();
            $data = $usersController->detail($id);
            $response->getBody()->write($data);
            return $response->withHeader('Content-Type', 'application/json');
        });

        $group->post('/', function(Request $request, Response $response){
            $bodyRequest = $request->getParsedBody();
            // $usersController = new UsersController();
            // $data = $usersController->detail($id);
            $response->getBody()->write(json_encode($bodyRequest));
            return $response->withHeader('Content-Type', 'application/json');
        });
    });

};