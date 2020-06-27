<?php

namespace App\Controller\TodoListController;

use App\Controller\BaseController;

class TodoListController extends BaseController
{
    public function getTodoList($request, $response)
    {
        $userData = $this->container->AuthService->getUserDetails();
        $this->container->view->render($response, "todoList.twig");
    }

    public function getTodoJson($request, $response)
    {
        $userData = $this->container->AuthService->getUserDetails();
        return $response->withJson($this->container->TodoListService->getTodoList($userData));
    }

    public function addTodo($request, $response)
    {
        $todoTitle = $request->getParam('todoTitle');
        $todoContent = $request->getParam('todoContent');

        $userId = $this->container->AuthService->getUserDetails();
        return $response->withJson($this->container->TodoListService->addTodo($userId, $todoTitle, $todoContent));
    }

    public function deleteTodo($request, $response)
    {
        $todoId = $request->getParam('id');
        $userId = $this->container->AuthService->getUserDetails();
        $resJson = $this->container->TodoListService->deleteTodo($todoId, $userId);
        return $response->withJson($resJson);
    }


}