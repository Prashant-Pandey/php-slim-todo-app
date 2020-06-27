<?php


namespace App\Middleware\AuthValidatorMiddleware;


class NoAuthValidatorMiddleware extends \App\Middleware\BaseMiddleware
{
    public function __invoke($request, $response, $next)
    {
        $auth = $this->container->AuthService;
        var_dump(isset($_SESSION['userId']));
        if ($auth->isLoggedIn()){
            return $response->withRedirect($this->container->router->pathFor('getTodoList'));
        }

        $response = $next($request, $response);
        return $response;
    }
}