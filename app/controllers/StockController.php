<?php

class StockController extends Controller
{
    public function index()
    {
        $stock = $this->model('Stock'); // Usamos $this->model() para cargar el modelo
        $data = $stock->getAll();
        $this->view('stock/index', ['data' => $data],'Stock');
    }

    public function create()
    {
        $this->view('stock/create');
    }

    private function sanitize($data)
    {
        return htmlspecialchars(strip_tags($data));
    }

    public function store()
    {
        $name = $this->sanitize($_POST['name']);
        $quantity = $this->sanitize($_POST['quantity']);

        if (!empty($name) && !empty($quantity)) {
            $stock = $this->model('Stock'); // Usamos $this->model() para cargar el modelo
            $stock->insert(['name' => $name, 'quantity' => $quantity]);
            header("Location: /stock");
        } else {
            $this->view('stock/create', ['error' => 'Todos los campos son obligatorios']);
        }
    }

    public function edit($id)
    {
        $stock = $this->model('Stock'); // Usamos $this->model() para cargar el modelo
        $data = $stock->getById($id);
        $this->view('stock/edit', ['data' => $data]);
    }

    public function update($id)
    {
        $stock = $this->model('Stock'); // Usamos $this->model() para cargar el modelo
        $stock->update($id, $_POST);
        header("Location: /stock");
    }

    public function delete($id)
    {
        $stock = $this->model('Stock'); // Usamos $this->model() para cargar el modelo
        $stock->delete($id);
        header("Location: /stock");
    }
}
