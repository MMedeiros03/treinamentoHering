<?php

namespace Nbwdigital\Abcmedseg\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Nbwdigital\Abcmedseg\Repository\ProductRepository;

class ProductController
{

    public function GetAllProducts(Request $request, Response $response, $args)
    {

        $product = new ProductRepository();

        $result =  $product->GetAll();
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

    public function GetProduct(Request $request, Response $response, $args)
    {
        $product = new ProductRepository();

        $result =  $product->GetById($args['id']);
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

    public function DeleteProduct(Request $request, Response $response, $args)
    {
        // $validateAuthentication = $this->GenerateJWT($request->getHeader());
        $product = new ProductRepository();
        $result = $product->Delete($args['id']);
        if ($result) {
            $response->getBody()->write("usuario deletado");
            return $response;
        } else {
            $response->getBody()->write("usuario não existe");
            return $response;
        }
    }

    public function CreateProduct(Request $request, Response $response, $args)
    {
        $data = json_decode($request->getBody(), true);
        $product = new ProductRepository();
        $result =  $product->Add($data);

        if ($result) {
            $response->getBody()->write("produto criado");
            return $response;
        } else {
            $response->getBody()->write("produto não cadastado");
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
    //         $response->getBody()->write("usuario não cadastado");
    //         return $response;
    //     }
    // }
}
