<?php

namespace Controller;

class FrontController
{
    static $instance;

    private $pdo;
    private $controller;
    private $action;
    private $params;

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct()
    {
        $this->pdo = new \PDO('mysql:host=127.0.0.1;dbname=test', 'root', '');

        $split =  explode('/', trim($_SERVER['REQUEST_URI'],'/'));
        $this->controller = '\\Controller\\'.ucfirst($split[0]) . 'Controller';
        $this->action = $split[1] . 'Action';
        $this->params = array_slice($split, 2);
    }

    public function route()
    {
        $controller = new $this->controller($this->pdo);
        $controller->{$this->action}(...$this->params);
    }

}