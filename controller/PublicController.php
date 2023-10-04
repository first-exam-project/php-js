<?php
/*
    require_once('../DB.php');
    class PublicController extends DB
    {
        public function statisticByRegion()
        {
            $query = "SELECT  regions.id,regions.name as region_name,townships.name as township_name,statistics.crime,statistics.sentenced,statistics.escaped,statistics.latest_updated 
            FROM regions left join townships on townships.region_id = regions.id 
            left join statistics on statistics.region_id = regions.id";
            $stmt = $this->db->query($query);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }
*/
require_once('../DB.php');
class PublicController extends DB
{
    public function statisticByRegion()
    {
        $query = "SELECT regions.id,regions.name as region_name,townships.name as township_name,statistics.crime,statistics.sentenced,statistics.escaped,statistics.latest_updated FROM regions left join townships on townships.region_id = regions.id 
            left join statistics on statistics.region_id = regions.id";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}

