<?php

class Router
{
    private array $routes = [];

    public function get(string $path, string $controller, string $method): void
    {
        $this->routes['GET'][$path] = [$controller, $method];
    }

    public function post(string $path, string $controller, string $method): void
    {
        $this->routes['POST'][$path] = [$controller, $method];
    }

    public function resolve(): void
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path = str_replace('/jersx-web/public', '', $path);
        $path = $path === '' ? '/' : $path;

        $method = $_SERVER['REQUEST_METHOD'];

        if (!isset($this->routes[$method][$path])) {
            http_response_code(404);
            echo "404 - Página no encontrada";
            return;
        }

        [$controllerName, $action] = $this->routes[$method][$path];

        $controllerFile = __DIR__ . "/../app/controllers/{$controllerName}.php";

        if (!file_exists($controllerFile)) {
            http_response_code(500);
            echo "Error: controlador {$controllerName} no encontrado.";
            return;
        }

        require_once $controllerFile;

        $controllerInstance = new $controllerName();
        $controllerInstance->$action();
    }
}