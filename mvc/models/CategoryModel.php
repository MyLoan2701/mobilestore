<?php

class CategoryModel extends DB{
    public function GetCategory() {
        $qr = "SELECT * FROM `category`";
        return mysqli_query($this->conn, $qr);
    }
    public function GetCategory2() {
        $qr = "SELECT * FROM `category` WHERE `status` = 0";
        return mysqli_query($this->conn, $qr);
    }
    public function GetCategoryId() {
        $qr = "SELECT id_category, category_name FROM `category`";
        return mysqli_query($this->conn, $qr);
    }

    public function updateTime(){
        $qr = "ALTER TABLE `category`
        CHANGE `update_at`
        `update_at` TIMESTAMP NOT NULL
        DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP";
        return mysqli_query($this->conn, $qr);
    }

    public function insertCategory($name, $img, $d, $status) {
        $qr = "INSERT INTO `category`(`category_name`, `image`, `description`, `status`) VALUES ('$name','$img','$d','$status')";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return json_encode($rs);
    }

    public function editCategory($id) {
        $qr = "SELECT * FROM `category` WHERE `id_category` = $id";
        return mysqli_query($this->conn, $qr);
    }

    public function updateCategory($id, $name, $img, $d, $status) {
        $up = $this->updateTime();
        $qr = "UPDATE `category` SET `category_name`='$name',`image`='$img',`description`='$d',`status`='$status' WHERE `id_category` = $id";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return json_encode($rs);
    }

    public function delCategory($id) {
        $qr = "DELETE FROM `category` WHERE `id_category` = $id";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return json_encode($rs);
    }

    public function SearchCategory($key) {
        $qr = "SELECT * FROM `category` 
        WHERE `category_name` LIKE '%".$key."%'
        OR `id_category` LIKE '%".$key."%'";
        return mysqli_query($this->conn, $qr);
    }
}
?>