<?php
// app/models/User.php
require_once __DIR__ . '/../../config/database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $email) {
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, $password]);
    }

    public function update($id, $name, $email) {
        $stmt = $this->db->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        return $stmt->execute([$name, $email, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
