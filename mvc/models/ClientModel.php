<?php
// require "./mvc/core/DB.php";
class ClientModel extends DB{

    public function GetClient() {
        $qr = "SELECT * FROM `client`";
        return mysqli_query($this->conn, $qr);
    }

    public function updateTime(){
        $qr = "ALTER TABLE `client`
        CHANGE `update_at`
        `update_at` TIMESTAMP NOT NULL
        DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP";
        return mysqli_query($this->conn, $qr);
    }

    public function editClient($id) {
        $qr = "SELECT * FROM `client` WHERE `id_client` = $id";
        return mysqli_query($this->conn, $qr);
    }
    public function updateClient($id, $status,) {
        $up = $this->updateTime();
        $qr = "UPDATE `client` SET `status`='$status' WHERE `id_client` = $id";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return json_encode($rs);
    }
    public function updateClient2($id, $fname, $lname, $phone) {
        $up = $this->updateTime();
        $qr = "UPDATE `client` 
        SET `fname`='$fname', `lname`='$lname', `phone`='$phone' 
        WHERE `id_client` = $id";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return json_encode($rs);
    }
    public function updatePwd($id, $p) {
        $up = $this->updateTime();
        $qr = "UPDATE `client` 
        SET `password`='$p' 
        WHERE `id_client` = $id";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return json_encode($rs);
    }
    public function editAddress($id, $address) {
        $up = $this->updateTime();
        $qr = "UPDATE `client` 
        SET `address`='$address' 
        WHERE `id_client` = $id";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return json_encode($rs);
    }

    public function delClient($id) {
        $qr = "DELETE FROM `client` WHERE `id_client` = $id";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return json_encode($rs);
    }



    public function checkEmail($email) {
        // require "./mvc/core/DB.php";
        $qr = "SELECT * FROM client WHERE email = '".$email."'";
        $rs = mysqli_query($this->conn, $qr);
        $row = mysqli_fetch_array($rs);
        if (isset($row['id_client'])) {
            return true;
        }
        else {return false;}
    }

    public function checkClient($email, $password) {
        // require "./mvc/core/DB.php";
        $qr = "SELECT * FROM client WHERE email = '".$email."' AND password = '".$password."'";
        $rs = mysqli_query($this->conn, $qr);
        $row = mysqli_fetch_array($rs);
        if (isset($row['id_client'])) {
            return true;
        }
        else {return false;}
    }

    public function userClient($email, $password) {
        // require "./mvc/core/DB.php";
        $qr = "SELECT * FROM client WHERE email = '".$email."' AND password = '".$password."'";
        return mysqli_fetch_array(mysqli_query($this->conn, $qr));
    }
    public function userClient2($id) {
        // require "./mvc/core/DB.php";
        $qr = "SELECT * FROM client WHERE id_client = '".$id."' ";
        return mysqli_fetch_array(mysqli_query($this->conn, $qr));
    }

    public function AddClient($email, $password){
        $qr = "INSERT INTO `client`(`email`, `password`) VALUES ('$email','$password')";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return json_encode($rs);
    }

    public function loginAdmin($email, $password) {
        $qr = "SELECT * FROM `admin` WHERE `email` = '".$email."' AND `password` = $password";
        return mysqli_query($this->conn, $qr);
    }

    public function SearchClient($key) {
        $qr = "SELECT * FROM `client` 
        WHERE `email` LIKE '%".$key."%'
        OR `id_client` LIKE '%".$key."%'";
        return mysqli_query($this->conn, $qr);
    }
}

?>
