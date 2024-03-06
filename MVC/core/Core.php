<?php
class Core
{
    public function run($routes)
    {
        $url = '/';
        isset($_GET['url']) ? $url .= $_GET['url'] : '';
        ($url != '/') ? $url = rtrim($url, '/') : $url;
        $routerFound = false;
        foreach ($routes as $path => $controller) {
            // + para números e - para strings
            $pattern = '#^' . preg_replace('/{id}/', '(\w+)', $path) . '$#';
            if (preg_match($pattern, $url, $matches)) {
                //Tira o valor da primeira posição
                array_shift($matches);
                $routerFound = true;
                [$currentController, $action] = explode('@', $controller);
                //Aspas dupla para interpretar a variável
                require_once __DIR__ . "/../contollers/$currentController.php";
                $newController = new $currentController();
                $newController->$action($matches);
            }
        }
        if (!$routerFound) {
            require_once __DIR__ . "/../contollers/NotFoundController.php";
            $controller = new NotFoundController();
            $controller->index();
        }
    }
}
