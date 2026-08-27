<?php

class Controller
{
    protected function view(string $view, array $data = [], string $layout = 'layouts/main'): void
    {
        extract($data);

        $viewPath = __DIR__ . "/../app/views/{$view}.php";
        if (!file_exists($viewPath)) {
            die("Vista no encontrada: {$view}");
        }

        // Capturamos el contenido de la vista
        ob_start();
        require_once $viewPath;
        $content = ob_get_clean();

        // Lo inyectamos dentro del layout
        $layoutPath = __DIR__ . "/../app/views/{$layout}.php";
        if (!file_exists($layoutPath)) {
            die("Layout no encontrado: {$layout}");
        }
        require_once $layoutPath;
    }
}