<?php


$app->group('', function () use($container){
    $this->get('/', 'HomeController:index')->setName('home');
    $this->post('/login', 'AuthController:login')->setName('login');
    $this->post('/signup', 'AuthController:signup')->setName('signup');
})->add(new App\Middleware\AuthValidatorMiddleware\NoAuthValidatorMiddleware($container));

$app->group('', function (){
    $this->get('/logout', 'AuthController:logout')->setName('logout');
    $this->get('/todo', 'TodoListController:getTodoList')->setName('getTodoList');
    $this->get('/todo/list/json', 'TodoListController:getTodoJson')->setName('getTodoJson');
    $this->post('/todo/add', 'TodoListController:addTodo')->setName('addTodo');
    $this->post('/todo/delete', 'TodoListController:deleteTodo')->setName('deleteTodo');
})->add(new App\Middleware\AuthValidatorMiddleware\AuthValidatorMiddleware($container));

$app->get('/test', 'TestController:index');

// host: localhost, uname: root, pass: database: todolistdatabase

//C:\Users\Prashant\Desktop\Projects\PHPProjects\TodoList\App
///
///login
///logout
///todo
///todo/list/json
///todo/add
///todo/delete

