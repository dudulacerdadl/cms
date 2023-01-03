<?php

namespace Model;

require_once '../db/connection.php';

session_start();

new Notice();

class Notice
{
    /**
     * @var string
     */
    private $_name;
    /**
     * @var string
     */
    private $_email;
    /**
     * @var string
     */
    private $_password;

    /**
     * @var PDO
     */
    private $_conn;

    public function __construct()
    {
        $this->_conn = Connection::Conn();
        switch (filter_input(INPUT_POST, 'actionButton')) {
            case 'Cadastrar':
                $this->registerProcess();
                break;
            case 'Editar':
                $this->editProcess();
                break;
            default:
                $_SESSION['msg'] = 'Página não encontrada';
                header("Location: ../views/notice/new.php");
                break;
        }
    }

    protected function registerProcess()
    {
        try {
            $this->setName(filter_input(INPUT_POST, 'name'));
            $this->setEmail(filter_input(INPUT_POST, 'user'));
            $this->setPassword(filter_input(INPUT_POST, 'pass'));
        } catch (Exception $e) {
            $_SESSION['msg'] = $e->getMessage();
            header("Location: ../views/user/signup.php");
        }

        $email = $this->_conn->prepare("SELECT `email` FROM `users` WHERE email = '" . $this->getEmail() . "'");
        $email->execute();

        if (isset($email->fetch()['email'])) {
            $_SESSION['msg'] = 'E-mail já registrado';
            header("Location: ../views/user/signup.php");
            exit;
        }

        $query = $this->_conn->prepare(
            "INSERT INTO `users` (`name`, `email`, `password`, `created_at`, `updated_at`) "
            . "VALUES ('" . $this->getName() . "', '" . $this->getEmail() . "', '" . $this->getPassword() . "', now(), now());"
        );
        $query->execute();

        $result = $this->_conn->prepare("SELECT `id`, `email`, `name`, `password` FROM `users` WHERE email = '" . $this->getEmail() . "'");
        $result->execute();
        $results = $result->fetch();

        $_SESSION['id']       = $results['id'];
        $_SESSION['email']    = $results['email'];
        $_SESSION['name']     = $results['name'];
        $_SESSION['password'] = $results['password'];
        header("Location: ../views/user/home.php");
    }

    protected function editProcess()
    {
        try {
            $this->setName(filter_input(INPUT_POST, 'name'));
            $this->setEmail(filter_input(INPUT_POST, 'user'));
            $this->setPassword(filter_input(INPUT_POST, 'pass'));
        } catch (Exception $e) {
            $_SESSION['msg'] = $e->getMessage();
            header("Location: ../views/user/signup.php");
        }

        $query = $this->_conn->prepare(
            "UPDATE `users` SET
            `name` = '".$this->getName()."',
            `email` = '".$this->getEmail()."',
            `password` = '".$this->getPassword()."',
            `updated_at` = now()
            WHERE `id` = '".$_SESSION['id']."';"
        );
        $query->execute();

        $result = $this->_conn->prepare("SELECT `id`, `email`, `name`, `password` FROM `users` WHERE id = '" . $_SESSION['id'] . "'");
        $result->execute();
        $results = $result->fetch();

        $_SESSION['id']       = $results['id'];
        $_SESSION['email']    = $results['email'];
        $_SESSION['name']     = $results['name'];
        $_SESSION['password'] = $results['password'];
        header("Location: ../views/user/home.php");
    }

    /**
     *
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     *
     * @param  string $name
     * @return self
     */
    public function setName($name)
    {
        if (!is_string($name) || empty($name)) {
            throw new Exception("Usuário não encontrado");
        }

        $this->_name = $name;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     *
     * @param  string $email
     * @return self
     */
    public function setEmail($email)
    {
        if (!is_string($email) || empty($email)) {
            throw new Exception("E-mail não encontrado");
        }

        $this->_email = $email;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     *
     * @param  string $password
     * @return self
     */
    public function setPassword($password)
    {
        if (!is_string($password) || empty($password)) {
            throw new Exception("Senha não encontrada");
        }

        $this->_password = $password;
        return $this;
    }
}
