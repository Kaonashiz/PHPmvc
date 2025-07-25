<?php
require_once '../core/Database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllUsers() {
        return $this->db->query("SELECT * FROM USERS");
    }
}
