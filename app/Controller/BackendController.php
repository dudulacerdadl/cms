<?php

namespace Cms\Controller;

use Cms\Model\User;

class BackendController extends AbstractController
{
    public function profileAction()
    {
        $data = $this->getConnection()->operation(
            'select',
            [
                'table'       => 'notices',
                'params'      => ['*'],
                'where'       => null,
                'whereParams' => null,
                'whereValues' => null,
            ]
        );

        $this->render(
            'User/profile',
            'Home',
            [
                'news' => $data->fetchAll(),
            ]
        );
    }

    public function signinAction()
    {
        $this->render('User/signin', 'Login');
    }

    public function signupAction()
    {
        $this->render('User/signup', 'Register');
    }

    public function editAction()
    {
        $this->render('User/edit', 'Editar');
    }

    public function execAction()
    {
        new User(
            $this->getConnection(),
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
