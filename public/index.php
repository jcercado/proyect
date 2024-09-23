<?php
require_once '../core/Database.php';
require_once '../core/Controller.php';
require_once '../core/Model.php';

// Autocarga de controladores y modelos
spl_autoload_register(function ($class) {
    $controllerFile = '../app/controllers/' . $class . '.php';
    $modelFile = '../app/models/' . $class . '.php';

    if (file_exists($controllerFile)) {
        require_once $controllerFile;
    } elseif (file_exists($modelFile)) {
        require_once $modelFile;
    }
});

// Obtener la URL y descomponerla
$url = isset($_GET['url']) ? $_GET['url'] : 'inicio';
$url = explode('/', rtrim($url, '/'));

// Definir controlador y método
$controllerName = isset($url[0]) ? ucfirst($url[0]) . 'Controller' : 'InicioController';
$method = isset($url[1]) ? $url[1] : 'index';
$params = array_slice($url, 2);

// Instanciar el controlador y ejecutar el método
if (file_exists("../app/controllers/$controllerName.php")) {
    $controller = new $controllerName();
    if (method_exists($controller, $method)) {
        call_user_func_array([$controller, $method], $params);
    } else {
        // Llamar al método error404 cuando el método no sea encontrado
        $controller = new InicioController();
        $controller->error404("Algo salio mal! Si el problema persiste, favor informar al Administrador Web.");
    }
} else {
    $controller = new InicioController();
    $controller->error404("Pagina no encontrada, favor contactarse con el Administrador Web.");
}
