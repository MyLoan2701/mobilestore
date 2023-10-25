<?php
class OrderDetailModel extends DB {
    public function insertOrderDetail($string) {
        $qr = "INSERT INTO `orderdetail`(`price`, `qty`, `total_o`, `id_order`, `id_product`) 
        VALUES ".$string."";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
            // $id = mysqli_insert_id($this->conn);
        }
        return json_encode($rs);
        // return $id;
    }

    public function getDetail($id) {
        $qr = "SELECT o.*, od.*, p.img, p.name, p.stock
        FROM `order` AS o
        JOIN `orderdetail` AS od
        ON o.id_order = od.id_order
        JOIN `product` AS p
        ON od.id_product = p.id_product 
        WHERE o.id_order = ".$id."";
        return mysqli_query($this->conn, $qr);
    }

}
?>