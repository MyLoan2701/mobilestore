<?php
class OrderModel extends DB {

    public function insertOrder($fname, $lname, $rname, $email, $phone, $address, $total, $note, $id_c, $id_p) {
        $qr = "INSERT INTO `order`(`fname`, `lname`, `rname`, `email`, `phone`, `address`, `total`, `other`, `id_client`, `id_payment`)
        VALUES ('$fname','$lname','$rname','$email','$phone','$address','$total','$note','$id_c', '$id_p')";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
            $id = mysqli_insert_id($this->conn);
        }
        // return json_encode($rs);
        return $id;
    }

    public function getStatus($status) {
        $qr = "SELECT * FROM `order` WHERE `status` = $status";
        return mysqli_query($this->conn, $qr);
    }

    public function getStatus2($id) {
        $qr = "SELECT `status` FROM `order` WHERE `id_order` = $id";
        return mysqli_query($this->conn, $qr);
    }

    public function getOrder($id) {
        $qr = "SELECT * FROM `order` WHERE `id_order` = ".$id."";
        return mysqli_query($this->conn, $qr);
    }

    public function getOrderAll() {
        $qr = "SELECT * FROM `order` ";
        return mysqli_query($this->conn, $qr);
    }

    public function getOrderClient($id) {
        $qr = "SELECT * FROM `order` 
        WHERE `id_client` = ".$id." 
        ORDER BY `id_order` DESC";
        return mysqli_query($this->conn, $qr);
    }

    public function updateTime(){
        $qr = "ALTER TABLE `order`
        CHANGE `update_at`
        `update_at` TIMESTAMP NOT NULL
        DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP";
        return mysqli_query($this->conn, $qr);
    }

    public function updateOrder($id, $note, $status) {
        $up = $this->updateTime();
        $qr = "UPDATE `order` 
        SET `status`='$status',`note_a`='$note' 
        WHERE `id_order` =  $id";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return json_encode($rs);
    }

    public function updateOrder2($id, $note, $status, $other) {
        $up = $this->updateTime();
        $qr = "UPDATE `order` 
        SET `status`='$status',`note_a`='$note', `other`= '$other' 
        WHERE `id_order` =  $id";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return json_encode($rs);
    }

    public function SearchOrder($key) {
        $qr = "SELECT * FROM `order` 
        WHERE `email` LIKE '%".$key."%'
        OR `id_order` LIKE '%".$key."%'
        OR `phone` LIKE '%".$key."%'";
        return mysqli_query($this->conn, $qr);
    }
}
?>