<?php

use App\Controllers\Repositories\UsersControllerRepository;
use App\Controllers\UsersController;
use Slim\App;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;

const listState = [
    1 => 404,
    2 => 409,
    'default' => 400
];

const codeValidation = require __DIR__ . '/../Middleware/CodeValidation.php';

return function (App $app) {
    $app->get('/', function (Request $request, Response $response, $args) {
        $response->getBody()->write("Hello world!");
        return $response;
    });

    $app->group('/users', function (RouteCollectorProxy $group) {

        $group->get('/', function (Request $request, Response $response) {
            $usersController = new UsersController();
            $data = $usersController->index();
            $state = empty($data) ? 204 : 200;
            $response->getBody()->write($data);
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus($state);
        });

        $group->get('/{id}', function (Request $request, Response $response, $args) {
            try {
                $id = $args['id'];
                $usersController = new UsersController();
                $data = $usersController->detail($id);
                $response->getBody()->write($data);
                return $response->withHeader('Content-Type', 'application/json');
            } catch (Exception $ex) {
                $code = $ex->getCode();
                $state = listState[$code] ?? listState['default'];
                return $response->withStatus($state);
            }
        });

        $group->post('/', function (Request $request, Response $response) {
            $bodyRequest = $request->getBody()->getContents();
            $dataRequest = json_decode($bodyRequest, true);
            $usersController = new UsersController();
            $data = $usersController->create($dataRequest);
            $response->getBody()->write($data);
            return $response->withHeader('Content-Type', 'application/json');
        });

        $group->put('/{id}', function (Request $request, Response $response, $args) {
            $id = $args['id'];
            $bodyRequest = $request->getBody()->getContents();
            $dataRequest = json_decode($bodyRequest, true);
            $controller = new UsersController();
            $data = $controller->update($id, $dataRequest);
            $response->getBody()->write($data);
            return $response->withHeader('Content-Type', 'application/json');
        });

        $group->delete('/{id}', function (Request $request, Response $response, $args) {
            try {
                $id = $args['id'];
                $controller = new UsersController();
                $data = $controller->delete($id);
                // $response->getBody()->write($data);
                return $response->withHeader('Content-Type', 'application/json');
            } catch (Exception $ex) {
                $code = $ex->getCode();
                $listState = [
                    1 => 404,
                    2 => 409,
                    'default' => 400
                ];
                $state = $listState[$code] ?? $listState['default'];
                // if ($code == 1) {
                //     $state = 404;
                // } else if ($code == 2) {
                //     $state = 409;
                // }
                return $response->withStatus($state);
            }
        })->add(function ($req, $handler) {
            $token = $req->getHeaderLine('Code-Validation');
            if ($token !== '789') {
                $res = new \Slim\Psr7\Response();
                $res
                    ->getBody()
                    ->write(json_encode(['msg' => 'error']));
                return $res->withStatus(401);
            }
            return $handler->handle($req);
        });

    });


    $app->group('/users-v2', function (RouteCollectorProxy $group) {
        //$group->get('/v2', UsersControllerRepository::class.':index');
        $group->get('/', [UsersControllerRepository::class, 'index']);
        $group->get('/{id}', [UsersControllerRepository::class, 'detail']);
        $group->post('/', [UsersControllerRepository::class, 'create']);
        $group->put('/{id}', [UsersControllerRepository::class, 'update']);
        $group->delete('/{id}', [UsersControllerRepository::class, 'delete'])
            ->add(codeValidation);
    });
};