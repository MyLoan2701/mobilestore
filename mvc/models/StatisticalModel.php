<?php

class StatisticalModel extends DB {

    public function getStatistica($now, $subday){
        $qr = "SELECT * FROM `statistical` 
        WHERE `date_statistical` 
        BETWEEN '$subday' AND '$now' 
        ORDER BY `date_statistical` ASC";
        return mysqli_query($this->conn, $qr);
    }

    public function insertStatistical($string) {
        $qr = "INSERT INTO `statistical`(`num_orders`, `revenue`, `quantity`, `date_statistical`) 
        VALUES ".$string."";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
            // $id = mysqli_insert_id($this->conn);
        }
        return json_encode($rs);
    }
}
?>