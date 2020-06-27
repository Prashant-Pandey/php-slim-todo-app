<?php
namespace App\Controller\TestController;
use App\Model\App\Model\LoginQuery;
class TestController
{
    public function index($request, $response){
        $colJobs = LoginQuery::create()->find();
        $arrJobs = $colJobs->toArray();
        $text = print_r($arrJobs, true);
        return $text;
    }

}