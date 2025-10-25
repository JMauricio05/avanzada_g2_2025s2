<?php
namespace App\Controllers\Repositories;

use App\Controllers\UsersController;
use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UsersControllerRepository
{
    public function index(Request $request, Response $response): ResponseInterface
    {
        $usersController = new UsersController();
        $data = $usersController->index();
        $state = empty($data) ? 204 : 200;
        $response->getBody()->write($data);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($state);
    }

    public function detail(Request $request, Response $response, $args): ResponseInterface
    {
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
    }

    public function create(Request $request, Response $response)
    {
        $bodyRequest = $request->getBody()->getContents();
        $dataRequest = json_decode($bodyRequest, true);
        $usersController = new UsersController();
        $data = $usersController->create($dataRequest);
        $response->getBody()->write($data);
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function update(Request $request, Response $response, $args)
    {
        $id = $args['id'];
        $bodyRequest = $request->getBody()->getContents();
        $dataRequest = json_decode($bodyRequest, true);
        $controller = new UsersController();
        $data = $controller->update($id, $dataRequest);
        $response->getBody()->write($data);
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function delete(Request $request, Response $response, $args)
    {
        try {
            $id = $args['id'];
            $controller = new UsersController();
            $data = $controller->delete($id);
            return $response->withHeader('Content-Type', 'application/json');
        } catch (Exception $ex) {
            $code = $ex->getCode();
            $state = listState[$code] ?? listState['default'];
            return $response->withStatus($state);
        }
    }

}