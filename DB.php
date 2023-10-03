<?php
class DB
{
    public $db;
    public function __construct()
    {
        $hostName = "localhost";
        $userName = "admin";
        $password = "!Zawmyohtet123";
        $databaseName = "exam";
        $this->db = new mysqli($hostName, $userName, $password, $databaseName);
        if (!$this->db) {
            echo "Connected successfully";
        }
    }
    public function index($table)
    {
        $query = "SELECT * FROM $table";
        $data = $this->db->query($query);
        return $data;
    }
    public function store($table, $request)
    {
        $keys = "";
        $values = "";
        foreach ($request as $key => $value) {
            if ($key !== 'create') {
                $keys .= "`$key`, ";
                $values .= "'$value', ";
            }
        }
        $realkeys = substr($keys, 0, -2);
        $realvalues = substr($values, 0, -2);
        $query = "INSERT INTO $table($realkeys) VALUES($realvalues)";
        $data = $this->db->query($query);
        return $data;
    }
    public function show($table, $id)
    {
        $query = "SELECT * FROM $table WHERE id=$id";
        $data = $this->db->query($query);
        return $data;
    }
    public function update($table, $request, $id)
    {
        $name = $request['name'];
        $query = "UPDATE $table SET name='$name' WHERE id=$id";
        $data = $this->db->query($query);
        return $data;
    }
    public function delete($table, $id)
    {
        $query = "DELETE FROM $table WHERE id=$id";
        $data = $this->db->query($query);
        return $data;
    }
}