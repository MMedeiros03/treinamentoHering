<?php

namespace Nbwdigital\Abcmedseg\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Nbwdigital\Abcmedseg\Traits\Login;
use Nbwdigital\Abcmedseg\Traits\Authentication;
use Nbwdigital\Abcmedseg\Traits\Search;

class UserController
{
    use Login;
    use Authentication;
    use Search;

    public function Login(Request $request, Response $response, $args)
    {
        $data = json_decode($request->getBody(), true);

        $result = $this->VerifyLogin($data);

        if ($result) {

            $token = [
                "token" => $this->GenerateJWT($data)
            ];
            $response->getBody()->write(json_encode($token));
            return $response;
        } else {
            $response->getBody()->write("usuario inexistente");
            return $response;
        }
    }

    public function GetAllUsers(Request $request, Response $response, $args)
    {
        $result = $this->GetAll();
        $resultJson = json_encode($result);
        if ($result) {
            $response->getBody()->write($resultJson);
            header('Content-type: application/json');
            return $response;
        } else {
            $response->getBody()->write("usuario inexistente");
            return $response;
        }
    }

    public function GetUser(Request $request, Response $response, $args)
    {
        $result = $this->GetById($args['id']);
        $resultJson = json_encode($result);
        if ($result) {
            $response->getBody()->write($resultJson);
            header('Content-type: application/json');
            return $response;
        } else {
            $response->getBody()->write("usuario inexistente");
            return $response;
        }
    }

    public function DeleteUsers(Request $request, Response $response, $args)
    {
        // $validateAuthentication = $this->GenerateJWT($request->getHeader());
        $result = $this->Delete($args['id']);
        if ($result) {
            $response->getBody()->write("usuario deletado");
            return $response;
        } else {
            $response->getBody()->write("usuario não existe");
            return $response;
        }
    }

    public function CreateUser(Request $request, Response $response, $args)
    {
        $data = json_decode($request->getBody(), true);
        $result = $this->Add($data);

        if ($result) {
            $response->getBody()->write("usuario criado");
            return $response;
        } else {
            $response->getBody()->write("usuario não cadastado");
            return $response;
        }
    }

    public function SearchUser(Request $request, Response $response, $args)
    {
        $query = $args['query'];
        $result = $this->Search($query);

        if ($result) {
            $response->getBody()->write(json_encode($result));
            return $response;
        } else {
            $response->getBody()->write("usuario não cadastado");
            return $response;
        }
    }
}
