<?php

namespace Nbwdigital\Abcmedseg\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Nbwdigital\Abcmedseg\Traits\Login;

class UserController
{
    use Login;

    public function Login(Request $request, Response $response, $args)
    {
        $data = json_decode($request->getBody(), true);
        $result = $this->VerifyLogin($data);

        if ($result) {
            $response->getBody()->write("usuario existe");
            return $response;
        } else {
            $response->getBody()->write("usuario inexistente");
            return $response;
        }
    }


    public function CreateUser(Request $request, Response $response, $args)
    {
        $data = json_decode($request->getBody(), true);
        $result = $this->VerifyLogin($data);

        if ($result) {
            $response->getBody()->write("usuario criado");
            return $response;
        } else {
            $response->getBody()->write("usuario inexistente");
            return $response;
        }
    }
}
