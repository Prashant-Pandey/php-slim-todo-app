<?php

use Slim\Csrf\Guard;

session_start();

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../generated-conf/config.php';


$app = new Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ],
]);



// Fetch DI Container
$container = $app->getContainer();

// Register Twig View helper
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__.'/../template/');

   $view->addExtension(new Slim\Views\TwigExtension(
       $container->router,
       $container->request->getUri()
   ));

    return $view;
};

// controllers
$container['AuthController'] = function ($container){
    return new \App\Controller\AuthController\AuthController($container);
};

$container['HomeController'] = function ($container){
    return new \App\Controller\HomeController\HomeController($container);
};

$container['TodoListController'] = function ($container){
    return new App\Controller\TodoListController\TodoListController($container);
};

$container['TestController'] = function ($container){
    return new \App\Controller\TestController\TestController;
};

$container['SetMessage'] = function ($container, $key, $value){
    $res = $container->view->getEnvironment()->addGlobal($key, $value);
    var_dump($res);
    return true;
};

$container['password_hash_algo'] = PASSWORD_BCRYPT;
$container['message_key'] = 'message';

// Services
$container['AuthService'] = function ($container){
    return new App\Service\AuthService\AuthService($container);
};

$container['TodoListService'] = function ($container){
    return new App\Service\TodoListService\TodoListService($container);
};

$container['ValidatorService'] = function ($container){
    return new App\Service\ValidatorService\ValidatorService($container);
};


require __DIR__ . '/../app/routes.php';