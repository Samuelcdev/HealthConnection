<?php
class Router
{
    private $controller;
    private $method;

    public function __construct()
    {
        $this->machtRoute();
    }

    public function machtRoute()
    {
        $url = explode('/', URL);

        $controllerName = !empty($url[1]) ? $url[1] : 'Page';
        $this->method = !empty($url[2]) ? $url[2] : 'index';
        $this->controller = $controllerName . "Controller";

        // Buscar solo en Controllers/ (no subcarpetas)
        $controllerFile = __DIR__ . "/Controllers/{$this->controller}.php";

        if (!file_exists($controllerFile)) {
            die("❌ Error: No se encontró el controlador '{$this->controller}'");
        }

        require_once($controllerFile);
    }


    public function run()
    {
        $database = new Database();
        $connection = $database->getConnection();
        $controller = new $this->controller($connection);
        $method = $this->method;
        $controller->$method();
    }
}