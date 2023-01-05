<?php

namespace Cms\Controller;

require_once ROOT . '/lib/Connection.php';

session_start();

class FrontendController
{
    /**
     * @var array
     */
    private $notices = [];

    public function indexAction()
    {
        $conn = new \Connection();
        $conn = $conn->Conn();
        $data = $conn->prepare('SELECT * FROM `notices`');
        $data->execute();

        $this->setNotices($data->fetchAll());

        include_once ROOT . "/app/View/Template/header.php";
        include_once ROOT . "/app/View/index.php";
        include_once ROOT . "/app/View/Template/footer.php";
    }

    /**
     * @return array
     */
    public function getNotices()
    {
        return $this->notices;
    }

    /**
     * @param  array  $notices
     * @return self
     */
    public function setNotices($notices)
    {
        $this->notices = $notices;
        return $this;
    }
}
