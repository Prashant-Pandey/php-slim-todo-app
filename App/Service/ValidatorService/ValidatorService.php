<?php


namespace App\Service\ValidatorService;


class ValidatorService extends \App\Service\BaseService
{
    public function checkNullOrBlank($str){
        if ($str&&trim($str)!=""){
            return true;
        }
        return false;
    }

}