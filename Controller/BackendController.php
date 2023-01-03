<?php

namespace Controller;
use Model\Client;

class BackendController
{
    public function profileAction()
    {
        include_once ROOT . "/View/Template/header.php";
        include_once ROOT . "/View/User/profile.php";
        include_once ROOT . "/View/Template/footer.php";
    }

    public function signinAction()
    {
        include_once ROOT . "/View/Template/header.php";
        include_once ROOT . "/View/User/signin.php";
        include_once ROOT . "/View/Template/footer.php";
    }

    public function signinExecAction()
    {
        $client = new Client(
            filter_input(INPUT_POST, 'actionButton'),
            filter_input(INPUT_POST, 'user'),
            filter_input(INPUT_POST, 'pass')
        );
    }

    public function signupAction()
    {
        include_once ROOT . "/View/Template/header.php";
        include_once ROOT . "/View/User/signup.php";
        include_once ROOT . "/View/Template/footer.php";
    }

    public function signoutAction()
    {
        unset(
            $_SESSION['id'],
            $_SESSION['name'],
            $_SESSION['email'],
            $_SESSION['password']
        );
        $_SESSION['msg'] = "Deslogado com sucesso!";

        header("Location: /admin/signin");
    }
}
