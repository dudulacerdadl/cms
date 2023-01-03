<?php

namespace Controller;

use Model\Connection;

class FrontendController
{
    /**
     * @var array
     */
    private $_notices = [];

    public function indexAction()
    {
        $conn = Connection::Conn();
        $data = $conn->prepare('SELECT * FROM `notices`');
        $data->execute();

        $this->setNotices($data->fetchAll());

        include_once ROOT . "/View/Template/header.php";
        include_once ROOT . "/View/index.php";
        include_once ROOT . "/View/Template/footer.php";
    }

    /**
     * @return array
     */
    public function getNotices()
    {
        return $this->_notices;
    }

    /**
     * @param  array  $notices
     * @return self
     */
    public function setNotices($notices)
    {
        $this->_notices = $notices;
        return $this;
    }
}
