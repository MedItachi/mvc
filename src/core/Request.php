<?php

namespace App\core;


class Request
{
    public function __construct()
    {

        echo $this->getMethod();
    }

    public function getUrl()
    {
        $url = rtrim($_SERVER["REQUEST_URI"], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        return explode('/', $url);
    }

    public function isPost()
    {
        return $this->getMethod() == "get";
    }

    public function isGet()
    {
        return $this->getMethod() == "post";
    }
    public function getMethod()
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }
    public function Body()
    {
        $body = [];

        if ($this->isGet()) {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->isPost()) {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}
