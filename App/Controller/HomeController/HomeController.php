<?php

namespace App\Controller\HomeController;

use App\Controller\BaseController;

class HomeController extends BaseController {
    public function index($request, $response){
        return $this->container->view->render($response, 'home.twig');
    }
}