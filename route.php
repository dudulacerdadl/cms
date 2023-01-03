<?php

class Route
{
    private $_uri = [];
    private $_controller = [];
    private $_method = [];

    /**
     * @param mixed $uri
     * @return void
     */
    public function add($uri, $controller = null, $method = null)
    {
        $this->_uri[] = '/' . trim($uri, '/');

        if ($method != null) {
            $this->_controller[] = $controller;
            $this->_method[] = $method . 'Action';
        }
    }

    public function submit()
    {
        $uriGetParams = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';

        foreach ($this->_uri as $key => $value) {
            if (preg_match("#^$value$#", $uriGetParams)) {
                if (is_string($this->_controller[$key])) {
                    $useMethod = $this->_controller[$key];
                    $class = new $useMethod();
                    $method = $this->_method[$key];
                    $class->$method();
                    continue;
                }

                call_user_func($this->_controller[$key]);
            }
        }
    }
}