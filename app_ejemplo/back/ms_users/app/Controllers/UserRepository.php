<?php
namespace App\Controllers;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserRepository{

    public function login(Request $request, Response $response) {
        try {
            $body = $request->getBody()->getContents();
            $data = json_decode($body, true);
            
        } catch(Exception $ex){

        }
    }

}