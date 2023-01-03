<?php

namespace Cms\Model;

use Exception;

class Client
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $password;

    /**
     * @var \PDO
     */
    private $conn;

    /**
     * @param $button
     * @param $email
     * @param $password
     * @param $name
     */
    public function __construct(
        $button,
        $email,
        $password,
        $name = null
    ) {
        $this->conn = Connection::Conn();

        switch ($button) {
            case 'Entrar':
                $this->loginProcess($email, $password);
                break;
            case 'Registrar':
                $this->registerProcess($email, $password, $name);
                break;
            case 'Editar':
                $this->editProcess($email, $password, $name);
                break;
            default:
                $_SESSION['msg'] = 'Página não encontrada';
                header("Location: /admin/signin");
                break;
        }
    }

    protected function loginProcess($email, $password)
    {
        try {
            $this->setEmail($email);
            $this->setPassword($password);
        } catch (Exception $e) {
            $_SESSION['msg'] = $e->getMessage();
            header("Location: /admin/signin");
        }

        $result = $this->conn->prepare("SELECT `id`, `email`, `name`, `password` FROM `users` WHERE email = '" . $this->getEmail() . "'");
        $result->execute();
        $results = $result->fetch();

        if ($results['password'] != $this->getPassword()) {
            $_SESSION['msg'] = 'Senha incorreta';
            header("Location: /admin/signin");
        }

        $_SESSION['id']       = $results['id'];
        $_SESSION['email']    = $results['email'];
        $_SESSION['name']     = $results['name'];
        $_SESSION['password'] = $results['password'];
        header("Location: /admin/home");
    }

    protected function registerProcess($email, $password, $name)
    {
        try {
            $this->setName($name);
            $this->setEmail($email);
            $this->setPassword($password);
        } catch (Exception $e) {
            $_SESSION['msg'] = $e->getMessage();
            header("Location: /admin/signup");
        }

        $email = $this->conn->prepare("SELECT `email` FROM `users` WHERE email = '" . $this->getEmail() . "'");
        $email->execute();

        if (isset($email->fetch()['email'])) {
            $_SESSION['msg'] = 'E-mail já registrado';
            header("Location: /admin/signup");
            exit;
        }

        $query = $this->conn->prepare(
            "INSERT INTO `users` (`name`, `email`, `password`, `created_at`, `updated_at`) "
            . "VALUES ('" . $this->getName() . "', '" . $this->getEmail() . "', '" . $this->getPassword() . "', now(), now());"
        );
        $query->execute();

        $result = $this->conn->prepare("SELECT `id`, `email`, `name`, `password` FROM `users` WHERE email = '" . $this->getEmail() . "'");
        $result->execute();
        $results = $result->fetch();

        $_SESSION['id']       = $results['id'];
        $_SESSION['email']    = $results['email'];
        $_SESSION['name']     = $results['name'];
        $_SESSION['password'] = $results['password'];
        header("Location: /admin/home");
    }

    protected function editProcess($email, $password, $name)
    {
        try {
            $this->setName($name);
            $this->setEmail($email);
            $this->setPassword($password);
        } catch (Exception $e) {
            $_SESSION['msg'] = $e->getMessage();
            header("Location: /admin/signup");
        }

        $query = $this->conn->prepare(
            "UPDATE `users` SET
            `name` = '" . $this->getName() . "',
            `email` = '" . $this->getEmail() . "',
            `password` = '" . $this->getPassword() . "',
            `updated_at` = now()
            WHERE `id` = '" . $_SESSION['id'] . "';"
        );
        $query->execute();

        $result = $this->conn->prepare("SELECT `id`, `email`, `name`, `password` FROM `users` WHERE id = '" . $_SESSION['id'] . "'");
        $result->execute();
        $results = $result->fetch();

        $_SESSION['id']       = $results['id'];
        $_SESSION['email']    = $results['email'];
        $_SESSION['name']     = $results['name'];
        $_SESSION['password'] = $results['password'];
        header("Location: /admin/home");
    }

    /**
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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

        $this->name = $name;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
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

        $this->email = $email;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
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

        $this->password = $password;
        return $this;
    }
}
