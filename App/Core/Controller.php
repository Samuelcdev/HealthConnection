<?php
class Controller
{
    protected function render($folder, $path, $parameters = [], $layout = '')
    {
        if (!empty($paremeters)) {
            extract($paremeters);
        }

        ob_start();
        require_once(__DIR__ . '/../Views/' . $folder . '/' . $path . '.view.php');
        $content = ob_get_clean();

        require_once(__DIR__ . '/../Views/layouts/' . $layout . '.layout.php');
    }
}