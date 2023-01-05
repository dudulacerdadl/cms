<?php

namespace Cms\Controller;

class FrontendController extends AbstractController
{
    public function indexAction()
    {
        $data = $this->getConnection()->operation(
            'select',
            [
                'table' => 'notices',
                'params' => ['*'],
                'where' => null,
                'whereParams' => null,
                'whereValues' => null,
            ]
        );

        $this->render(
            'index',
            'Início',
            [
                'news' => $data->fetchAll(),
            ]
        );
    }
}
