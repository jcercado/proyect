<?php

class CrudController extends Controller {
    public function index() {
        $crud = $this->model('Crud'); // Usamos $this->model() para cargar el modelo
        $data = $crud->getAll();
        $this->view('crud/index', ['data' => $data]);
    }

    public function create() {
        $this->view('crud/create');
    }

    private function sanitize($data) {
        return htmlspecialchars(strip_tags($data));
    }
    
    public function store() {
        $name = $this->sanitize($_POST['name']);
        $description = $this->sanitize($_POST['description']);
    
        if (!empty($name) && !empty($description)) {
            $crud = $this->model('Crud'); // Usamos $this->model() para cargar el modelo
            $crud->insert(['name' => $name, 'description' => $description]);
            header("Location: /crud");
        } else {
            // Manejar errores
            $this->view('crud/create', ['error' => 'Todos los campos son obligatorios']);
        }
    }

    public function edit($id) {
        $crud = $this->model('Crud'); // Usamos $this->model() para cargar el modelo
        $data = $crud->getById($id); // Debe ser un objeto stdClass
        $this->view('crud/edit', ['data' => $data]); // Asegúrate de que 'data' es un objeto
    }

    public function update($id) {
        $crud = $this->model('Crud'); // Usamos $this->model() para cargar el modelo
        $crud->update($id, $_POST);
        header("Location: /crud");
    }

    public function delete($id) {
        $crud = $this->model('Crud'); // Usamos $this->model() para cargar el modelo
        $crud->delete($id);
        header("Location: /crud");
    }
}
