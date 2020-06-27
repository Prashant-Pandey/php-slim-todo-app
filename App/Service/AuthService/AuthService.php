<?php


namespace App\Service\AuthService;


use App\Model\App\Model\{Login, LoginQuery};
use App\Service\BaseService;

class AuthService extends BaseService
{
    public function loginService($username, $password){
        // can use password_verify()
        try {
            $loginQ = LoginQuery::create()->filterByUname($username)->findOne();
            if ($loginQ&&password_verify($password,$loginQ->getPass())){
                $_SESSION['userId'] = $username;
                return true;
            }
            return false;
        }catch (\Exception $err){
            return false;
        }
    }

    public function signupService($username, $password){
        $login = new Login();
        $login->setUname($username);
        $login->setPass(password_hash($password, $this->container->password_hash_algo));
        $login->save();
        $_SESSION['userId'] = $username;
        return $login->getUname();
    }

    public function isUserExists($username){
        $loginQ = LoginQuery::create()->filterByUname($username)->findOne();
        return $loginQ;
    }

    public function isLoggedIn(){
        return isset($_SESSION['userId']);
    }

    public function getUserDetails(){
        return $_SESSION['userId'];
    }

    public function logoutService(){
        unset($_SESSION['userId']);
    }
}