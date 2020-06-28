<?php


namespace App\Controller\AuthController;

use App\Controller\BaseController;

class AuthController extends BaseController
{

    public function login($request, $response)
    {
        $auth = $this->container->AuthService;
        if ($auth->isUserExists($request->getParam('loginUserId')) &&
            $auth->loginService($request->getParam('loginUserId'),
                $request->getParam('loginPassword'))) {
            return $response->withRedirect($this->container->router->pathFor('getTodoList'));
        } else {
            // show error
//            $this->container->setMessage($this->container, $this->container->message_key, 'User does not exists, please sign up');
            $this->container->view->getEnvironment()->addGlobal($this->container->message_key, 'User does not exists, please sign up');
            return $this->container->view->render($response, 'home.twig');
        }

    }

    public function signup($request, $response)
    {
        $auth = $this->container->AuthService;
        if (!$auth->isUserExists($request->getParam('signupUserId')) &&
            $auth->signupService($request->getParam('signupUserId'),
                $request->getParam('signupPassword'))) {
            return $response->withRedirect($this->container->router->pathFor('getTodoList'));
        } else {
            // show error
            $this->container->view->getEnvironment()->addGlobal($this->container->message_key, 'User already exists, please login');
            return $this->container->view->render($response, 'home.twig');
        }
    }

    public function logout($request, $response)
    {
        try {
            $auth = $this->container->AuthService;
            $auth->logoutService();
            return $response->withRedirect($this->container->router->pathFor('home'));
        }catch (\Exception $err){
            return $response->withJson($err);
        }
    }
}