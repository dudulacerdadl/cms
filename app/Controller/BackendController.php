<?php

namespace Cms\Controller;

use Cms\Model\Client;

require_once ROOT . '/lib/Connection.php';

session_start();

class BackendController
{
    /**
     * @var array
     */
    private $notices = [];

    public function profileAction()
    {
        $conn = new \Connection();
        $conn = $conn->Conn();
        $data = $conn->prepare('SELECT * FROM `notices`');
        $data->execute();

        $this->setNotices($data->fetchAll());

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

    /**
     *
     * @return array
     */
    public function getNotices()
    {
        return $this->notices;
    }

    /**
     *
     * @param  array  $notices
     * @return self
     */
    public function setNotices($notices)
    {
        $this->notices = $notices;
        return $this;
    }
}
