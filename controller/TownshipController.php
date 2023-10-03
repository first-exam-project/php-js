<?php
require_once('../DB.php');
class TownshipController extends DB
{
    protected $table = "townships";
    public function index()
    {
        $query = "SELECT $this->table.id,$this->table.name,$this->table.region_id,regions.name as region_name FROM $this->table left join regions on regions.id = $this->table.region_id";
        $stmt = $this->db->query($query);
        $data = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
    public function store($request)
    {
        $stmt = $this->db->prepare("INSERT INTO $this->table (name,region_id) VALUES (:name,:region_id)");
        $stmt->bindParam(":name", $request['name']);
        $stmt->bindParam(":region_id", $request['region_id']);
        if ($stmt->execute()) {
            header('Location: http://localhost:8000/Township');
        } else {
            echo "500 internal server error!";
        }
    }

    public function show($id)
    {
        $query = "SELECT $this->table.name,$this->table.region_id FROM $this->table WHERE id = :id";
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
        $stmt = $this->db->prepare("UPDATE $this->table SET name=:name,region_id=:region_id WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $request['name']);
        $stmt->bindParam(':region_id', $request['region_id']);
        if ($stmt->execute()) {
            header('Location: http://localhost:8000/Township');
        } else {
            echo "500 internal server error!";
        }
    }

    public function delete($id)
    {
        $query = "DELETE FROM $this->table WHERE id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            header('Location: http://localhost:8000/Township');
        } else {
            echo "500 internal server error!";
        }
    }
}