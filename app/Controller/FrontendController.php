<?php

namespace Cms\Controller;

class FrontendController extends AbstractController
{
    public function indexAction()
    {
        $data = $this->getConn()->prepare('SELECT * FROM `notices`');
        $data->execute();

        $this->render(
            'index',
            'Início',
            [
                'news' => $data->fetchAll(),
            ]
        );
    }
}
