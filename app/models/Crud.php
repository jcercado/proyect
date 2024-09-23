<?php
class Crud extends Model {
    
    public function getAll() {
        try {
            $stmt = $this->db->pdo->query("SELECT * FROM items");
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            $this->handleError($e, 'getAll');
            return false;
        }
    }

    public function getById($id) {
        try {
            $stmt = $this->db->pdo->prepare("SELECT * FROM items WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            $this->handleError($e, 'getById');
            return false;
        }
    }

    public function insert($data) {
        try {
            $stmt = $this->db->pdo->prepare("INSERT INTO items (name, description) VALUES (:name, :description)");
            $stmt->execute(['name' => $data['name'], 'description' => $data['description']]);
            return true;
        } catch (PDOException $e) {
            $this->handleError($e, 'insert');
            return false;
        }
    }

    public function update($id, $data) {
        try {
            $stmt = $this->db->pdo->prepare("UPDATE items SET name = :name, description = :description WHERE id = :id");
            $stmt->execute(['id' => $id, 'name' => $data['name'], 'description' => $data['description']]);
            return true;
        } catch (PDOException $e) {
            $this->handleError($e, 'update');
            return false;
        }
    }

    public function delete($id) {
        try {
            $stmt = $this->db->pdo->prepare("DELETE FROM items WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return true;
        } catch (PDOException $e) {
            $this->handleError($e, 'delete');
            return false;
        }
    }

    private function handleError(PDOException $e, $method) {
        // Verifica si es un error por falta de tabla
        if ($e->getCode() === '42S02') {
            echo "Error: La tabla 'items' no existe en la base de datos. Por favor, verifica que la tabla esté creada correctamente.";
        } else {
            echo "Ocurrió un error inesperado en el método $method. Por favor, intenta nuevamente más tarde.";
        }
        // Registrar el error en un archivo de log
        error_log($e->getMessage(), 3, '/path/to/error.log');
    }
}
