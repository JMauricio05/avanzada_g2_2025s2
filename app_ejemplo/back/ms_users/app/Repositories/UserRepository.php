<?php
namespace App\Repositories;

use App\Controllers\UsersController;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserRepository
{

    private $codesError = [
        1 => 401,
        'default' => 400
    ];

    public function login(Request $request, Response $response)
    {
        try {
            $body = $request->getBody()->getContents();
            $data = json_decode($body, true);
            $controller = new UsersController();
            $user = $controller->login($data['user'], $data['pwd']);
            $response
                ->withHeader('Content-Type', 'application/json')
                ->getBody()
                ->write($user);
            return $response;
        } catch (Exception $ex) {
            $status =  $this->codesError[$ex->getCode()] ?? $this->codesError['default'];
            return $response->withStatus($status);
        }
    }

}