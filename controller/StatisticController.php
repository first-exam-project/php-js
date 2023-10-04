<?php
require_once "../DB.php";
require_once "../controller/TownshipController.php";
class StatisticController extends DB
{
    protected $table = "statistics";
    public function index()
    {
        $query = "SELECT statistics.id,statistics.crime,statistics.sentenced,statistics.escaped,townships.name as township_name FROM $this->table left join townships on townships.id = statistics.township_id";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function store($request)
    {

        $township = new TownshipController();
        $data = $township->show($request['township_id']);
        $region = $data->region_id;
        $query = "INSERT INTO $this->table (`crime`, `sentenced`, `escaped`,`township_id`,`region_id`) VALUES (:crime, :sentenced, :escaped, :township_id, :region_id)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":crime", $request['crime']);
        $stmt->bindParam(":sentenced", $request['sentenced']);
        $stmt->bindParam(":escaped", $request['escaped']);
        $stmt->bindParam(":township_id", $request['township_id']);
        $stmt->bindParam(":region_id", $region);
        if ($stmt->execute()) {
            header('Location: http://localhost:8000/Statistic');
        } else {
            echo "500 internal server error!";
        }
    }
    public function show($id)
    {
        $query = "SELECT statistics.id,statistics.crime,statistics.sentenced,statistics.escaped,townships.name as township_name FROM $this->table left join townships on townships.id = statistics.township_id WHERE id=:id";
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
        $township = new TownshipController();
        $data = $township->show($request['township_id']);
        $region = $data->region_id;
        $stmt = $this->db->prepare("UPDATE $this->table SET crime=:crime, latest_updated= NOW(), sentenced=:sentenced,`escaped`=:escaped,township_id=:township_id,region_id=:region_id WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":crime", $request['crime']);
        $stmt->bindParam(":sentenced", $request['sentenced']);
        $stmt->bindParam(":escaped", $request['escaped']);
        $stmt->bindParam(":township_id", $request['township_id']);
        $stmt->bindParam(":region_id", $region);
        if ($stmt->execute()) {
            header('Location: http://localhost:8000/Statistic');
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
            header('Location: http://localhost:8000/Statistic');
        } else {
            echo "500 internal server error!";
        }
    }
}