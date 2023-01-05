<?php

namespace Cms\Model;

use Exception;

class User
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
     * @var mixed
     */
    private $conn;

    /**
     * @param $conn
     * @param $button
     * @param $email
     * @param $password
     * @param $name
     */
    public function __construct(
        $conn,
        $button,
        $email,
        $password,
        $name = null
    ) {
        $this->conn = $conn;

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
            case 'Deletar':
                $this->deleteProcess();
                break;
            default:
                $_SESSION['msg'] = 'Página não encontrada';
                header("Location: /admin/signin");
                break;
        }
    }

    /**
     * @param $email
     * @param $password
     */
    protected function loginProcess(
        $email,
        $password
    ) {
        try {
            $this->setEmail($email);
            $this->setPassword($password);
        } catch (Exception $e) {
            $_SESSION['msg'] = $e->getMessage();
            header("Location: /admin/signin");
        }

        $result = $this->conn->operation(
            'select',
            [
                'table'       => 'users',
                'params'      => ['id', 'email', 'name', 'password'],
                'where'       => true,
                'whereParams' => 'email',
                'whereValues' => $this->getEmail(),
            ]
        );

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

    /**
     * @param $email
     * @param $password
     * @param $name
     */
    protected function registerProcess(
        $email,
        $password,
        $name
    ) {
        try {
            $this->setName($name);
            $this->setEmail($email);
            $this->setPassword($password);
        } catch (Exception $e) {
            $_SESSION['msg'] = $e->getMessage();
            header("Location: /admin/signup");
        }

        $email = $this->conn->operation(
            'select',
            [
                'table'       => 'users',
                'params'      => ['email'],
                'where'       => true,
                'whereParams' => 'email',
                'whereValues' => $this->getEmail(),
            ]
        );

        if (isset($email->fetch()['email'])) {
            $_SESSION['msg'] = 'E-mail já registrado';
            header("Location: /admin/signup");
            exit;
        }

        $this->conn->operation(
            'insert',
            [
                'table'  => 'users',
                'params' => ['name', 'email', 'password', 'created_at', 'updated_at'],
                'values' => [$this->getName(), $this->getEmail(), $this->getPassword(), date("Y-m-d H:i:s"), date("Y-m-d H:i:s")],
            ]
        );

        $result = $this->conn->operation(
            'select',
            [
                'table'       => 'users',
                'params'      => ['id', 'email', 'name', 'password'],
                'where'       => true,
                'whereParams' => 'email',
                'whereValues' => $this->getEmail(),
            ]
        );

        $results = $result->fetch();

        $_SESSION['id']       = $results['id'];
        $_SESSION['email']    = $results['email'];
        $_SESSION['name']     = $results['name'];
        $_SESSION['password'] = $results['password'];
        header("Location: /admin/home");
    }

    /**
     * @param $email
     * @param $password
     * @param $name
     */
    protected function editProcess(
        $email,
        $password,
        $name
    ) {
        try {
            $this->setName($name);
            $this->setEmail($email);
            $this->setPassword($password);
        } catch (Exception $e) {
            $_SESSION['msg'] = $e->getMessage();
            header("Location: /admin/signup");
        }

        $this->conn->operation(
            'update',
            [
                'table'  => 'users',
                'id'     => $_SESSION['id'],
                'params' => ['name', 'email', 'password', 'updated_at'],
                'values' => [$this->getName(), $this->getEmail(), $this->getPassword(), date("Y-m-d H:i:s")],
            ]
        );

        $result = $this->conn->operation(
            'select',
            [
                'table'       => 'users',
                'params'      => ['id', 'email', 'name', 'password'],
                'where'       => true,
                'whereParams' => 'id',
                'whereValues' => $_SESSION['id'],
            ]
        );

        $results = $result->fetch();

        $_SESSION['id']       = $results['id'];
        $_SESSION['email']    = $results['email'];
        $_SESSION['name']     = $results['name'];
        $_SESSION['password'] = $results['password'];
        header("Location: /admin/home");
    }

    protected function deleteProcess()
    {
        $this->conn->operation(
            'delete',
            [
                'table' => 'users',
                'id'    => $_SESSION['id'],
            ]
        );

        unset(
            $_SESSION['id'],
            $_SESSION['name'],
            $_SESSION['email'],
            $_SESSION['password']
        );
        $_SESSION['msg'] = "Usuário excluido com sucesso!";

        header("Location: /admin/signin");
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
