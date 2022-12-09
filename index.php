<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(0);


header('Content-Type: application/json');


require __DIR__ . '/vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();
$app->setBasePath('/treinamentoHering');

$app->get('/api', function (Request $request, Response $response) {
    $response->getBody()->write("This is a Bitrix API");
    return $response;
});

$app->post("/login", [new Nbwdigital\Abcmedseg\Controller\UserController, 'Login']);

$app->post("/createAccount", [new Nbwdigital\Abcmedseg\Controller\UserController, 'CreateUser']);

$app->get("/getUsers", [new Nbwdigital\Abcmedseg\Controller\UserController, 'GetAllUsers']);

$app->get("/getUser/{id}", [new Nbwdigital\Abcmedseg\Controller\UserController, 'GetUser']);

$app->delete("/deleteUser/{id}", [new Nbwdigital\Abcmedseg\Controller\UserController, 'DeleteUsers']);

$app->get("/search/q={query}", [new Nbwdigital\Abcmedseg\Controller\UserController, 'SearchUser']);


$app->run();
