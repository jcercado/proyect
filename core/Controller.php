<?php

class Controller
{
    // Método para cargar vistas
    public function view($view, $data = [], $title = 'Mi Aplicación')
    {
        // Extraer variables del array $data para usarlas en la vista
        extract($data);

        // Almacenar la ruta completa de la vista
        $viewPath = '../app/views/' . $view . '.php';

        // Verificar si la vista existe
        if (file_exists($viewPath)) {
            ob_start(); // Iniciar almacenamiento en buffer de salida
            require $viewPath; // Cargar la vista
            $content = ob_get_clean(); // Obtener el contenido del buffer y limpiarlo

            // Cargar la plantilla base
            $this->loadLayout($content, $title);
        } else {
            $this->error404("Vista '$view' no encontrada.");
        }
    }

    // Método para cargar modelos
    public function model($model)
    {
        $modelPath = '../app/models/' . $model . '.php';

        if (file_exists($modelPath)) {
            require_once $modelPath;
            return new $model();
        } else {
            $this->error404("Modelo '$model' no encontrado.");
        }
    }

    // Método para cargar la plantilla base
    private function loadLayout($content, $title)
    {
        $layoutPath = '../app/views/layouts/base.php';

        if (file_exists($layoutPath)) {
            require $layoutPath;
        } else {
            echo "Plantilla base no encontrada.";
        }
    }

    // Método para manejar errores 404
    public function error404($message = 'Página no encontrada')
    {
        // Cargar la vista de error 404 si existe
        $this->view('errors/404', ['message' => $message]);
    }
}
