<?php


namespace App\Middleware;


use Slim\Csrf\Guard;

class BaseMiddleware
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    protected function guard() {
        return $this->container->get(Guard::class);
    }
}