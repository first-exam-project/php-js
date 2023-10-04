<?php
require_once('../DB.php');
class PublicController extends DB
{
    public function statisticByRegion()
    {
        $query = "SELECT statistics.* ,townships.name as township_name FROM statistics LEFT JOIN townships ON statistics.township_id = townships.id";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}