<?php

namespace Cms\Model;

class Route
{
    /**
     * @var array
     */
    private $_uri = [];

    /**
     * @var array
     */
    private $_controller = [];

    /**
     * @var array
     */
    private $_method = [];

    /**
     * @param string                             $uri
     * @param \Cms\Controller\AbstractController $controller
     * @param string                             $method
     */
    public function add(
        $uri,
        \Cms\Controller\AbstractController $controller,
        $method = null
    ) {
        $this->_uri[] = '/' . trim($uri, '/');

        if ($method != null) {
            $this->_controller[] = $controller;
            $this->_method[]     = $method . 'Action';
        }
    }

    public function submit()
    {
        $uriGetParams = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';

        foreach ($this->_uri as $key => $value) {
            if (preg_match("#^$value$#", $uriGetParams)) {
                $class = $this->_controller[$key];
                $method    = $this->_method[$key];
                $class->$method();
            }
        }
    }
}
