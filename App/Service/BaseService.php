<?php


namespace App\Service;


class BaseService
{
    protected $container;
    public function __construct($container)
    {
        $this->container = $container;
    }

}