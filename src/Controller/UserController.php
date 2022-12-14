<?php

namespace Nbwdigital\Abcmedseg\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Nbwdigital\Abcmedseg\Repository\UserRepository;
use Nbwdigital\Abcmedseg\Repository\Authentication;

class UserController
{
    
    public function Login(Request $request, Response $response, $args)
    {
        $data = json_decode($request->getBody(), true);

        $user = new UserRepository();
        $authentication = new Authentication();

        $result = $user->VerifyLogin($data);

        if ($result) {

            $token = [
                "token" => $authentication->GenerateJWT($data)
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
        $user = new UserRepository();

        $result =  $user->GetAll();
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
        $user = new UserRepository();
        $result =  $user->GetById($args['id']);
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

    public function DeleteUser(Request $request, Response $response, $args)
    {
        // $validateAuthentication = $this->GenerateJWT($request->getHeader());
        $user = new UserRepository();
        $result =  $user->Delete($args['id']);
        if ($result) {
            $response->getBody()->write("usuario deletado");
            return $response;
        } else {
            $response->getBody()->write("usuario n??o existe");
            return $response;
        }
    }

    public function CreateUser(Request $request, Response $response, $args)
    {
        $user = new UserRepository();
        $data = json_decode($request->getBody(), true);
        $result =  $user->Add($data);

        if ($result) {
            $response->getBody()->write("usuario criado");
            return $response;
        } else {
            $response->getBody()->write("usuario n??o cadastado");
            return $response;
        }
    }

    // public function SearchUser(Request $request, Response $response, $args)
    // {
    //     $query = $args['query'];
    //     $result =  Search::Search($query);

    //     if ($result) {
    //         $response->getBody()->write(json_encode($result));
    //         return $response;
    //     } else {
    //         $response->getBody()->write("usuario n??o cadastado");
    //         return $response;
    //     }
    // }
}
