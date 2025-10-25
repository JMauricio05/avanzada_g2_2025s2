<?php

use Slim\Psr7\Response;

return function ($req, $handler) {
    $token = $req->getHeaderLine('Code-Validation');
    if ($token !== '789') {
        $res = new Response();
        $res
            ->getBody()
            ->write(json_encode(['msg' => 'error']));
        return $res->withStatus(401);
    }
    return $handler->handle($req);
};