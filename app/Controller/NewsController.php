<?php

namespace Cms\Controller;

use Cms\Model\News;

class NewsController extends AbstractController
{
    public function openAction()
    {
        $this->render(
            'News/content',
            'Notícia - ' . filter_input(INPUT_POST, 'title'),
            [
                'title'   => filter_input(INPUT_POST, 'title'),
                'author'  => filter_input(INPUT_POST, 'author'),
                'content' => filter_input(INPUT_POST, 'content'),
                'date'    => filter_input(INPUT_POST, 'date'),
            ]
        );
    }

    public function newAction()
    {
        $this->render('News/new', 'Registrar Notícia');
    }

    public function editAction()
    {
        $this->render(
            'News/edit',
            'Editar Notícia',
            [
                'id'      => filter_input(INPUT_POST, 'id'),
                'title'   => filter_input(INPUT_POST, 'title'),
                'author'  => filter_input(INPUT_POST, 'author'),
                'content' => filter_input(INPUT_POST, 'content'),
            ]
        );
    }

    public function execAction()
    {
        new News(
            $this->getConnection(),
            filter_input(INPUT_POST, 'actionButton'),
            filter_input(INPUT_POST, 'title'),
            filter_input(INPUT_POST, 'author'),
            filter_input(INPUT_POST, 'content'),
            filter_input(INPUT_POST, 'id')
        );
    }
}
