<?php

namespace Cms\Controller;

session_start();

require_once ROOT . '/lib/Connection.php';

abstract class AbstractController
{
    /**
     * @var \PDO
     */
    protected $conn;

    /**
     * @var \PDO
     */
    protected $connSqlite;

    public function __construct()
    {
        $conn = new \Connection();
        $this->setConn($conn->Conn());
        $this->setConnSqlite($conn->ConnSqlite());
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
     * @return \PDO
     */
    public function getConn()
    {
        return $this->conn;
    }

    /**
     * @param  \PDO   $conn
     * @return self
     */
    public function setConn($conn)
    {
        $this->conn = $conn;
        return $this;
    }

    /**
     * @return \PDO
     */
    public function getConnSqlite()
    {
        return $this->connSqlite;
    }

    /**
     * @param  \PDO   $connSqlite
     * @return self
     */
    public function setConnSqlite($connSqlite)
    {
        $this->connSqlite = $connSqlite;
        return $this;
    }
}
