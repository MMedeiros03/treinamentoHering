<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(0);

require __DIR__ . '/vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();
$app->setBasePath('/my_project');

$app->get('/api', function (Request $request, Response $response) {
    $response->getBody()->write("This is a Bitrix API");
    return $response;
});

$app->post("/login", [new Nbwdigital\Abcmedseg\Controller\UserController, 'Login']);
$app->post("/login", [new Nbwdigital\Abcmedseg\Controller\UserController, 'CreateUser']);

$app->run();
