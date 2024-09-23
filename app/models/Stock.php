<?php
class Stock extends Model {
    public function getAll() {
        try {
            $stmt = $this->db->pdo->query("SELECT * FROM stock_items");
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            $this->handleError($e, 'getAll');
            return false;
        }
    }

    public function getById($id) {
        try {
            $stmt = $this->db->pdo->prepare("SELECT * FROM stock_items WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            $this->handleError($e, 'getById');
            return false;
        }
    }

    public function insert($data) {
        try {
            $stmt = $this->db->pdo->prepare("INSERT INTO stock_items (name, quantity, description) VALUES (:name, :quantity, :description)");
            $stmt->execute(['name' => $data['name'], 'quantity' => $data['quantity'], 'description' => $data['description']]);
        } catch (PDOException $e) {
            $this->handleError($e, 'insert');
            return false;
        }
    }

    public function update($id, $data) {
        try {
            $stmt = $this->db->pdo->prepare("UPDATE stock_items SET name = :name, quantity = :quantity, description = :description WHERE id = :id");
            $stmt->execute(['id' => $id, 'name' => $data['name'], 'quantity' => $data['quantity'], 'description' => $data['description']]);
        } catch (PDOException $e) {
            $this->handleError($e, 'update');
            return false;
        }
    }

    public function delete($id) {
        try {
            $stmt = $this->db->pdo->prepare("DELETE FROM stock_items WHERE id = :id");
            $stmt->execute(['id' => $id]);
        } catch (PDOException $e) {
            $this->handleError($e, 'delete');
            return false;
        }
    }

    private function handleError(PDOException $e) {
        // Verifica si es un error por falta de tabla
        if ($e->getCode() === '42S02') {
            echo "Error: La tabla 'stock_items' no existe en la base de datos. Por favor, verifica que la tabla esté creada correctamente.";
        } else {
            echo "Ocurrió un error inesperado. Por favor, intenta nuevamente más tarde.";
        }
        // También puedes registrar el error en un archivo de log si lo deseas
        error_log($e->getMessage(), 3, '/path/to/error.log');
    }
}
