<?php

namespace Cms\Controller;

class FrontendController extends AbstractController
{
    /**
     * @var array
     */
    private $notices = [];

    public function indexAction()
    {
        $data = $this->getConn()->prepare('SELECT * FROM `notices`');
        $data->execute();

        $this->setNotices($data->fetchAll());

        $this->render('index', 'Início');
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
