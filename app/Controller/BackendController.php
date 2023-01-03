<?php

namespace Cms\Controller;

use Cms\Model\Client;

session_start();

class BackendController
{
    public function profileAction()
    {
        include_once ROOT . "/app/View/Template/header.php";
        include_once ROOT . "/app/View/User/profile.php";
        include_once ROOT . "/app/View/Template/footer.php";
    }

    public function signinAction()
    {
        include_once ROOT . "/app/View/Template/header.php";
        include_once ROOT . "/app/View/User/signin.php";
        include_once ROOT . "/app/View/Template/footer.php";
    }

    public function signupAction()
    {
        include_once ROOT . "/app/View/Template/header.php";
        include_once ROOT . "/app/View/User/signup.php";
        include_once ROOT . "/app/View/Template/footer.php";
    }

    public function editAction()
    {
        include_once ROOT . "/app/View/Template/header.php";
        include_once ROOT . "/app/View/User/edit.php";
        include_once ROOT . "/app/View/Template/footer.php";
    }

    public function execAction()
    {
        new Client(
            filter_input(INPUT_POST, 'actionButton'),
            filter_input(INPUT_POST, 'user'),
            filter_input(INPUT_POST, 'pass'),
            filter_input(INPUT_POST, 'name')
        );
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
