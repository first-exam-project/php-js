<?php 
    require_once "../DB.php";

    class PublicController extends DB {
        public function statisticByRegion () {
            $query = "SELECT DISTINCT regions.id,regions.name,townships.name as township_name, statistics.crime,statistics.sentenced, statistics.escaped FROM regions left join townships on townships.region_id = regions.id
            left join statistics on statistics.region_id = regions.id
            -- left join regions on regions.id = statistics.region_id 
            ";
            $stmt = $this->db->query($query);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }
?>