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
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $scriptName = dirname($_SERVER['SCRIPT_NAME']);

        if (strpos($requestUri, $scriptName) === 0) {
            $requestUri = substr($requestUri, strlen($scriptName));
        }

        $url = explode('/', trim($requestUri, '/'));

        $controllerName = !empty($url[0]) ? $url[0] : 'Page';
        $this->method = !empty($url[1]) ? $url[1] : 'index';
        $this->controller = $controllerName . "Controller";

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

        if (!method_exists($controller, $method)) {
            die("Error: no se encontro el metodo '{$method}' en '{$this->controller}'");
        }

        $controller->$method();
    }
}