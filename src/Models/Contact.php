<?php

namespace App\Models;

use PDO;

class Contact {
    private $name;
    private $email;
    private $message;
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function save() {
        $query = "INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':message', $this->message);
        
        return $stmt->execute();
    }

    public function getAllContacts() {
        $query = "SELECT id, name, email, message, created_at FROM contacts ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}