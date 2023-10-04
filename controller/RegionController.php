<?php
require_once('../DB.php');
class RegionController extends DB
{
    protected $table = "regions";
    public function index()
    {
        $query = "SELECT regions.name,regions.id FROM regions";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function store($request)
    {
        $stmt = $this->db->prepare("INSERT INTO $this->table (name) VALUES (:name)");
        $stmt->bindParam(":name", $request['name']);
        if ($stmt->execute()) {
            header('Location: http://localhost:8000/Region');
        } else {
            echo "500 internal server error!";
        }
    }

    public function show($id)
    {
        $query = "SELECT $this->table.name,$this->table.id FROM $this->table WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_OBJ);
        } else {
            echo "500 internal server error!";
        }
    }

    public function update($request, $id)
    {
        $stmt = $this->db->prepare("UPDATE $this->table SET name=:name WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $request['name']);
        if ($stmt->execute()) {
            header('Location: http://localhost:8000/Region');
        } else {
            echo "500 internal server error!";
        }
    }

    public function delete($id)
    {
        $query = "DELETE FROM $this->table WHERE id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            header('Location: http://localhost:8000/Region');
        } else {
            echo "500 internal server error!";
        }
    }
}