<?php


namespace App\Service\TodoListService;

use Propel\Runtime\Exception\PropelException;
use App\Model\App\Model\{Todo, TodoQuery};
use function MongoDB\BSON\toJSON;

class TodoListService extends \App\Service\BaseService
{
    public function getTodoList($userId){
        $todoQ = TodoQuery::create()->filterByUname($userId)->find();
        if ($todoQ){
            return $this->filterTodoData($todoQ->toArray());
        }
        return false;
    }

    public function addTodo($userId, $title, $content){
        $todo = new Todo();
        $time = time();
        $todo->setUname($userId)
             ->setTitle($title)
             ->setContent($content)
             ->setDateofcreation($time)
             ->save();
        return $this->filterTodoData(array($todo->toArray()));
    }

    public function deleteTodo($id, $userId){
        $todoQ = TodoQuery::create()->filterByUname($userId)->findOneByTodoindex($id);
        $message = array();
        try {
            $todoQ->delete();
            array_push($message, ['success'=>true]);
        } catch (PropelException $e) {
            array_push($message, ['success'=>false]);
        }

        return json_encode($message);

    }

    public function filterTodoData(array $todos){
        $todoData = array();
        foreach ($todos as $todo) {
            unset($todo['Uname']);
            array_push($todoData,$todo);
        }
        return $todoData;
    }
}