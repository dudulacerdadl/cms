<?php

namespace Cms\Controller;

use Cms\Model\Notice;

session_start();

class NoticeController
{
    public function openAction()
    {
        $title   = filter_input(INPUT_POST, 'title');
        $author  = filter_input(INPUT_POST, 'author');
        $content = filter_input(INPUT_POST, 'content');
        $date    = filter_input(INPUT_POST, 'date');

        include_once ROOT . "/app/View/Template/header.php";
        include_once ROOT . "/app/View/Notice/content.php";
        include_once ROOT . "/app/View/Template/footer.php";
    }

    public function newAction()
    {
        include_once ROOT . "/app/View/Template/header.php";
        include_once ROOT . "/app/View/Notice/new.php";
        include_once ROOT . "/app/View/Template/footer.php";
    }

    public function editAction()
    {
        $id      = filter_input(INPUT_POST, 'id');
        $title   = filter_input(INPUT_POST, 'title');
        $author  = filter_input(INPUT_POST, 'author');
        $content = filter_input(INPUT_POST, 'content');

        include_once ROOT . "/app/View/Template/header.php";
        include_once ROOT . "/app/View/Notice/edit.php";
        include_once ROOT . "/app/View/Template/footer.php";
    }

    public function execAction()
    {
        new Notice(
            filter_input(INPUT_POST, 'actionButton'),
            filter_input(INPUT_POST, 'title'),
            filter_input(INPUT_POST, 'author'),
            filter_input(INPUT_POST, 'content'),
            filter_input(INPUT_POST, 'id')
        );
    }
}
