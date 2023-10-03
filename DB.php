<?php
class DB
{
    public $db;

    public function __construct()
    {
        $hostName = "localhost";
        $userName = "admin";
        $password = "!Zawmyohtet123"; // Enclose the password in quotes
        $databaseName = "exam";
        try {
            $this->db = new PDO("mysql:host=$hostName;dbname=$databaseName", $userName, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if (!$this->db) {
                echo "Connected successfully";
            }
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}