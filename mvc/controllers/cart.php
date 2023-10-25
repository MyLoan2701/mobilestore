<?php 

class Cart extends Controller{

    function show(){
        $p = $this->model("ProductModel");
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $k = implode(",", array_keys($_SESSION['cart']));
            // var_dump($_SESSION['cart']);
            $this->view("layout1", 
            [
                "page"=>"cartView",
                "getCart"=>$p->getProductCart($k),
            ]);
        }
        $this->view("layout1", [
            "page"=>"cartView",
        ]);
    }

    function addCart($id) {
        $p = $this->model("ProductModel");

        if (isset($_POST['addCart'])) {
            if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

            foreach ($_POST['qty'] as $id => $quantity) {
                // if ($quantity == 0 || $quantity < 0) {
                //     $quantity = 1;
                // }
                if (isset($_SESSION['cart'][$id])) {
                    $_SESSION['cart'][$id] += $quantity;
                }
                else $_SESSION['cart'][$id] = $quantity;
            }
            header('location:../cart');
        }
        else
        if (isset($_POST['buynow'])) {
            if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

            foreach ($_POST['qty'] as $id => $quantity) {
                // if ($quantity == 0 || $quantity < 0) {
                //     $quantity = 1;
                // }
                if (isset($_SESSION['cart'][$id])) {
                    $_SESSION['cart'][$id] += $quantity;
                }
                else $_SESSION['cart'][$id] = $quantity;
            }
            header('location:../checkout');
        }

    }
    
    function delItem($id) {
        $p = $this->model("ProductModel");

        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                $k = implode(",", array_keys($_SESSION['cart']));
                $this->view("layout1", 
                [
                    "page"=>"cartView",
                    "getCart"=>$p->getProductCart($k),
                ]);
            }
            else {
                header('location:../cart');
            }
        }
        else {
            header('location:../cart');
        }
    }

    function updateCart(){
        if (isset($_POST['delCart'])) {
            if (isset($_SESSION['cart'])) {
                unset($_SESSION['cart']);
                header('location:../cart');
            }
        }

        if (isset($_POST['updateCart'])) {
            foreach ($_POST['qty'] as $id => $quantity) {
                if ($quantity == 0 || $quantity < 0) {
                    $quantity = 1;
                }
                $_SESSION['cart'][$id] = $quantity;
            }
            header('location:../cart');
        }

        if (isset($_POST['checkout'])) {
            // $p = $this->model("ProductModel");
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart']) && !isset($_POST['err'])) {
                // $k = implode(",", array_keys($_SESSION['cart']));
                // $this->view("layout1", 
                // [
                //     "page"=>"checkoutView",
                //     "getCart"=>$p->getProductCart($k),
                // ]);

                header('location:../checkout');
            }
            else header('location:../cart');
        }
    }
}
?>