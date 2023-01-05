<?php

namespace Cms\Controller;

session_start();

require_once ROOT . '/lib/Connection.php';

abstract class AbstractController
{
    /**
     * @var mixed
     */
    protected $connection;

    public function __construct()
    {
        $conn = new \Connection();
        $this->setConnection($conn);
    }

    /**
     * @param $pagePath
     * @param $pageTitle
     */
    public function render(
        $pagePath,
        $pageTitle = 'CMS - Sistema de Gerenciamento',
        $params = []
    ) {
        include_once ROOT . "/app/View/Template/head.php";
        include_once ROOT . "/app/View/Template/header.php";
        include_once ROOT . "/app/View/$pagePath.php";
        include_once ROOT . "/app/View/Template/footer.php";
    }

    /**
     * @return mixed
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param  $connection
     * @return self
     */
    public function setConnection($connection)
    {
        $this->connection = $connection;
        return $this;
    }
}
