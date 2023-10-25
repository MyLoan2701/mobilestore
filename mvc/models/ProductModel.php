<?php

class ProductModel extends DB{
    public function GetProduct() {
        $qr = "SELECT product.*,category.category_name as namecate, category.id_category as id_c 
        FROM product LEFT JOIN category on category.id_category = product.id_category 
        where category.status = 0";
        return mysqli_query($this->conn, $qr);
    }
    public function GetProduct2() {
        $qr = "SELECT product.*,category.category_name as namecate, category.id_category as id_c 
        FROM product LEFT JOIN category on category.id_category = product.id_category 
        where category.status = 0 AND product.activity = 0";
        return mysqli_query($this->conn, $qr);
    }
    public function GetProductLimit($limit, $offset) {
        $qr = "SELECT product.*,category.category_name as namecate, category.id_category as id_c 
        FROM product LEFT JOIN category on category.id_category = product.id_category 
        where category.status = 0 AND product.activity = 0 LIMIT ".$limit." OFFSET ".$offset."";
        return mysqli_query($this->conn, $qr);
    }
    
    public function insertProduct($name, $price, $img, $sale, $stock, $status, $info, $d, $id_c, $release) {
        $qr = "INSERT INTO `product`(`name`, `price`, `img`, `sale`, `stock`, `activity`, `info`, `description`, `id_category`, `release_at`) 
        VALUES ('$name','$price','$img','$sale','$stock','$status','$info','$d','$id_c', '$release')";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return json_encode($rs);
    }

    public function editProduct($id) {
        $qr = "SELECT product.*,category.category_name as namecate 
        FROM product LEFT JOIN category on category.id_category = product.id_category 
        where category.status = 0 AND `id_product` = $id";
        return mysqli_query($this->conn, $qr);
    }

    public function updateTime(){
        $qr = "ALTER TABLE `product`
        CHANGE `update_at`
        `update_at` TIMESTAMP NOT NULL
        DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP";
        return mysqli_query($this->conn, $qr);
    }

    public function updateProduct($id, $name, $price, $img, $sale, $stock, $status, $info, $d, $id_c, $release) {
        $up = $this->updateTime();
        $qr = "UPDATE `product` 
        SET `name`='$name',`price`='$price',`img`='$img',`sale`='$sale',
        `stock`='$stock',`activity`='$status',`info`='$info',`description`='$d',
        `id_category`='$id_c',`release_at`='$release' 
        WHERE `id_product` = $id";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return json_encode($rs);
    }

    public function delProduct($id) {
        $qr = "DELETE FROM `product` WHERE `id_product` = $id";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return json_encode($rs);
    }

    public function productSaleLimit() {
        $qr = "SELECT product.* 
        FROM product 
        LEFT JOIN category ON category.id_category = product.id_category 
        WHERE category.status = 0 AND product.activity = 0 
        ORDER BY sale DESC LIMIT 5";
        return mysqli_query($this->conn, $qr);
    }
    public function getSale() {
        $qr = "SELECT product.* 
        FROM product 
        LEFT JOIN category ON category.id_category = product.id_category 
        WHERE category.status = 0 AND product.activity = 0 AND product.sale > 0 
        ORDER BY sale DESC";
        return mysqli_query($this->conn, $qr);
    }
    public function productSale($limit, $offset) {
        $qr = "SELECT product.* 
        FROM product 
        LEFT JOIN category ON category.id_category = product.id_category 
        WHERE category.status = 0 AND product.activity = 0 AND product.sale > 0 
        ORDER BY sale DESC 
        LIMIT ".$limit." OFFSET ".$offset."";
        return mysqli_query($this->conn, $qr);
    }
    public function productHotLimit() {
        $qr = "SELECT product.* 
        FROM product 
        LEFT JOIN category ON category.id_category = product.id_category 
        WHERE category.status = 0 AND product.activity = 0 
        ORDER BY sold DESC LIMIT 5";
        return mysqli_query($this->conn, $qr);
    }
    public function getHot() {
        $qr = "SELECT product.* 
        FROM product 
        LEFT JOIN category ON category.id_category = product.id_category 
        WHERE category.status = 0 AND product.activity = 0 
        ORDER BY sold DESC";
        return mysqli_query($this->conn, $qr);
    }
    public function productHot($limit, $offset) {
        $qr = "SELECT product.* 
        FROM product 
        LEFT JOIN category ON category.id_category = product.id_category 
        WHERE category.status = 0 AND product.activity = 0 
        ORDER BY sold DESC
        LIMIT ".$limit." OFFSET ".$offset."";
        return mysqli_query($this->conn, $qr);
    }
    public function getNew() {
        $qr = "SELECT product.* 
        FROM product 
        LEFT JOIN category ON category.id_category = product.id_category 
        WHERE category.status = 0 AND product.activity = 0 
        ORDER BY release_at DESC";
        return mysqli_query($this->conn, $qr);
    }
    public function productNew($limit, $offset) {
        $qr = "SELECT product.* 
        FROM product 
        LEFT JOIN category ON category.id_category = product.id_category 
        WHERE category.status = 0 AND product.activity = 0 
        ORDER BY release_at DESC
        LIMIT ".$limit." OFFSET ".$offset."";
        return mysqli_query($this->conn, $qr);
    }
    public function productDESC($limit, $offset) {
        $qr = "SELECT product.* 
        FROM product 
        LEFT JOIN category ON category.id_category = product.id_category 
        WHERE category.status = 0 AND product.activity = 0 
        ORDER BY price*(100-sale)/100 DESC
        LIMIT ".$limit." OFFSET ".$offset."";
        return mysqli_query($this->conn, $qr);
    }
    public function productASC($limit, $offset) {
        $qr = "SELECT product.* 
        FROM product 
        LEFT JOIN category ON category.id_category = product.id_category 
        WHERE category.status = 0 AND product.activity = 0 
        ORDER BY price*(100-sale)/100 ASC
        LIMIT ".$limit." OFFSET ".$offset."";
        return mysqli_query($this->conn, $qr);
    }
    public function GetProductByCategory($id) {
        $qr = "SELECT product.*,category.category_name as namecate, category.id_category as id_c 
        FROM product LEFT JOIN category on category.id_category = product.id_category 
        where category.status = 0 AND product.activity = 0 AND product.id_category = $id";
        return mysqli_query($this->conn, $qr);
    }

    public function GetProductByCategoryName($id) {
        $qr = "SELECT category.category_name as namecate 
        FROM category 
        where category.status = 0 AND id_category = $id";
        return mysqli_query($this->conn, $qr);
    }

    public function getSearch($key) {
        $qr = "SELECT product.*,category.category_name as namecate, category.id_category as id_c 
        FROM product LEFT JOIN category on category.id_category = product.id_category 
        WHERE `name` LIKE '%".$key."%'";
        return mysqli_query($this->conn, $qr);
    }

    public function SearchProduct($key) {
        $qr = "SELECT product.*,category.category_name as namecate, category.id_category as id_c 
        FROM product LEFT JOIN category on category.id_category = product.id_category
        WHERE `name` LIKE '%".$key."%'
        OR `id_product` LIKE '%".$key."%'";
        return mysqli_query($this->conn, $qr);
    }
    
    public function updateStock2($qty, $id) {
        $qr = "UPDATE `product` 
        SET `stock2`=`stock2`- $qty 
        WHERE `id_product` = $id";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return json_encode($rs);
    }
    public function updateStock22($id) {
        $qr = "UPDATE `product` 
        SET `stock2`=`stock`
        WHERE `id_product` = $id";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return json_encode($rs);
    }
    public function updateStock($stock, $id) {
        $qr = "UPDATE `product` 
        SET `stock`= $stock
        WHERE `id_product` = $id";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return json_encode($rs);
    }

    public function updateSold($sold, $id) {
        $qr = "UPDATE `product` 
        SET `sold`= $sold
        WHERE `id_product` = $id";
        $rs = false;
        if (mysqli_query($this->conn, $qr)) {
            $rs = true;
        }
        return json_encode($rs);
    }

    public function countProduct_idCategory($id) {
        $qr = "SELECT COUNT(`id_category`) AS `count_idCatgory`
        FROM `product` WHERE `id_category` = $id";
        return mysqli_query($this->conn, $qr);
    }





    public function getProductCart($string) {
        $qr = "SELECT * FROM `product` WHERE `id_product` IN (".$string.")";
        return mysqli_query($this->conn, $qr);
    }
}
?>