<?php

class AdminModel extends DB{
    public function GetAdmin() {
        $qr = "SELECT * FROM `admin`";
        return mysqli_query($this->conn, $qr);
    }
    
    public function updateTime(){
        $qr = "ALTER TABLE `admin`
        CHANGE `update_at`
        `update_at` TIMESTAMP NOT NULL
        DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP";
        return mysqli_query($this->conn, $qr);
    }

    public function insertAdmin($email, $password, $name, $phone, $address, $img, $sex, $birth, $hometown, $level) {
        $qr = "INSERT INTO `admin`(`email`, `password`, `name`, `phone`, `address`, `img`, `sex`, `birth`, `hometown`, `level`) VALUES ('$email','$password','$name','$phone','$address','$img','$sex','$birth','$hometown','$level')";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return json_encode($rs);
    }

    public function editAdmin($id) {
        $qr = "SELECT * FROM `admin` WHERE `id_admin` = $id";
        return mysqli_query($this->conn, $qr);
    }

    public function updateAdmin($id, $email, $password, $name, $phone, $address, $img, $sex, $birth, $hometown, $status, $level) {
        $up = $this->updateTime();
        $qr = "UPDATE `admin` SET `email`='$email',`password`='$password',`name`='$name',`phone`='$phone',`address`='$address',`img`='$img',`sex`='$sex',`birth`='$birth',`hometown`='$hometown',`status`='$status',`level`='$level' WHERE `id_admin` = $id";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return json_encode($rs);
    }

    public function updateAcc($id, $name, $phone, $address, $img, $sex, $birth, $hometown) {
        $up = $this->updateTime();
        $qr = "UPDATE `admin` 
        SET `name`='$name',`phone`='$phone',`address`='$address',
        `img`='$img',`sex`='$sex',`birth`='$birth',`hometown`='$hometown'
        WHERE `id_admin` = $id";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return json_encode($rs);
    }

    public function updatePwd($id, $p) {
        $up = $this->updateTime();
        $qr = "UPDATE `admin` 
        SET `password`='$p'
        WHERE `id_admin` = $id";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return json_encode($rs);
    }

    public function delAdmin($id) {
        $qr = "DELETE FROM `admin` WHERE `id_admin` = $id";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return json_encode($rs);
    }

    public function checkAdmin($email, $password) {
        // require "./mvc/core/DB.php";
        $qr = "SELECT * FROM admin WHERE email = '".$email."' AND password = '".$password."'";
        $rs = mysqli_query($this->conn, $qr);
        $row = mysqli_fetch_array($rs);
        if (isset($row['id_admin'])) {
            return true;
        }
        else {return false;}
    }

    public function userAdmin($email, $password) {
        // require "./mvc/core/DB.php";
        $qr = "SELECT * FROM admin WHERE email = '".$email."' AND password = '".$password."'";
        return mysqli_fetch_array(mysqli_query($this->conn, $qr));
    }
    public function userAdmin2($id) {
        // require "./mvc/core/DB.php";
        $qr = "SELECT * FROM admin WHERE id_admin = '".$id."' ";
        return mysqli_fetch_array(mysqli_query($this->conn, $qr));
    }

    public function SearchAdmin($key) {
        $qr = "SELECT * FROM `admin` 
        WHERE `email` LIKE '%".$key."%'
        OR `id_admin` LIKE '%".$key."%'";
        return mysqli_query($this->conn, $qr);
    }
}
?>