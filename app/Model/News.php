<?php

namespace Cms\Model;

use Exception;

class News
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $content;

    /**
     * @var mixed
     */
    private $conn;

    /**
     * @param $conn
     * @param $button
     * @param $title
     * @param $author
     * @param $content
     * @param $id
     */
    public function __construct(
        $conn,
        $button,
        $title,
        $author,
        $content,
        $id = null
    ) {
        $this->conn = $conn;

        switch ($button) {
            case 'Cadastrar':
                $this->registerProcess($title, $author, $content);
                break;
            case 'Editar':
                $this->editProcess($title, $author, $content, $id);
                break;
            case 'Deletar':
                $this->deleteProcess($id);
                break;
            default:
                $_SESSION['msg'] = 'Página não encontrada';
                header("Location: /news/new");
                break;
        }
    }

    /**
     * @param $title
     * @param $author
     * @param $content
     */
    protected function registerProcess(
        $title,
        $author,
        $content
    ) {
        try {
            $this->setTitle($title);
            $this->setAuthor($author);
            $this->setContent($content);
        } catch (Exception $e) {
            $_SESSION['msg'] = $e->getMessage();
            header("Location: /news/new");
        }

        $this->conn->operation(
            'insert',
            [
                'table'  => 'notices',
                'params' => ['title', 'author', 'content', 'created_at', 'updated_at'],
                'values' => [$this->getTitle(), $this->getAuthor(), $this->getContent(), date("Y-m-d H:i:s"), date("Y-m-d H:i:s")],
            ]
        );

        header("Location: /admin/home");
    }

    /**
     * @param $title
     * @param $author
     * @param $content
     * @param $id
     */
    protected function editProcess(
        $title,
        $author,
        $content,
        $id
    ) {
        try {
            $this->setTitle($title);
            $this->setAuthor($author);
            $this->setContent($content);
        } catch (Exception $e) {
            $_SESSION['msg'] = $e->getMessage();
            header("Location: /news/edit");
        }

        $this->conn->operation(
            'update',
            [
                'table'  => 'notices',
                'id'     => $id,
                'params' => ['title', 'author', 'content', 'updated_at'],
                'values' => [$this->getTitle(), $this->getAuthor(), $this->getContent(), date("Y-m-d H:i:s")],
            ]
        );

        header("Location: /admin/home");
    }

    /**
     * @param $id
     */
    protected function deleteProcess($id)
    {
        $this->conn->operation(
            'delete',
            [
                'table'  => 'notices',
                'id'     => $id,
            ]
        );

        header("Location: /admin/home");
    }

    /**
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     *
     * @param  string $title
     * @return self
     */
    public function setTitle($title)
    {
        if (!is_string($title) || empty($title)) {
            throw new Exception("Título não encontrado");
        }

        $this->title = $title;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     *
     * @param  string $author
     * @return self
     */
    public function setAuthor($author)
    {
        if (!is_string($author) || empty($author)) {
            throw new Exception("Autor não encontrado");
        }

        $this->author = $author;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     *
     * @param  string $content
     * @return self
     */
    public function setContent($content)
    {
        if (!is_string($content) || empty($content)) {
            throw new Exception("Conteúdo não encontrado");
        }

        $this->content = $content;
        return $this;
    }
}
