<?php 

class Checkout extends Controller{

    function show(){
        if (isset($_SESSION['login'])) {
            $p = $this->model("ProductModel");
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                $k = implode(",", array_keys($_SESSION['cart']));
                $this->view("layout1", 
                [
                    "page"=>"checkoutView",
                    "getCart"=>$p->getProductCart($k),
                ]);
            }
        }
        else {
            $this->view("layout1", 
            [
                "page"=>"loginView",
                "messLogin"=>"Bạn cần phải đăng nhập để thực hiện hoạt động này."
            ]);
        }
    }

    function checkErr($email, $rname, $phone, $address, $payment)
    {
        $err = [];
        if (isset($_POST['order'])) {
            if (empty($email)) {
                $err['email'] = "Bạn chưa nhập email!";
            }
            if (empty($rname)) {
                $err['rname'] = "Bạn chưa nhập tên người nhận!";
            }
            if (empty($phone)) {
                $err['phone'] = "Bạn chưa nhập số điện thoại người nhận!";
            }
            if (empty($address)) {
                $err['address'] = "Bạn chưa nhập địa chỉ nhận hàng!";
            }
            if (empty($payment)) {
                $err['pay'] = "Bạn chưa chọn phương thức thanh toán!";
            }
            if (empty($_SESSION['cart'])) {
                $err['cart'] = "Giỏ hàng rỗng!";
            }

            return $err;
        }
    }

    function order(){

        $email = $_POST["ck-email"];
        $fname = $_POST["ck-fname"];
        $lname = $_POST["ck-lname"];
        $rname = $_POST["ck-rname"];
        $phone = $_POST["ck-phone"];
        $address = $_POST["ck-address"];
        $payment = $_POST["pay"];
        $note = $_POST["ck-note"];

        $id_c = $_SESSION['login']["id_client"];

        if (isset($_POST["pay"])) {
            if ($payment == "Tiền mặt") {
                $pay = 1;
            }
            if ($payment == "Chuyển khoản") {
                $pay = 2;
            }
        }

        if (isset($_POST['order'])) {
            
            $check = $this->checkErr($email, $rname, $phone, $address, $payment);
            if (!empty($check)) {
                if (isset($check['cart'])) {
                    header("location:../cart");
                }
                else
                {
                    $this->view("layout1", 
                    [
                        "page"=>"checkoutView",
                        "errcheckout"=>$check,
                    ]);
                }
            }
            else 
            if (isset($_POST["order"]) && $email != '' && $rname != '' 
        && $phone != '' && $address != '' && $pay != ''
        && isset($_SESSION['cart']) && count($_SESSION['cart']) > 0)
        {
            $o = $this->model("OrderModel");
            $od = $this->model("OrderDetailModel");
            $p = $this->model("ProductModel");

            $k = implode(",", array_keys($_SESSION['cart']));

            $sum = 0;
            $order = [];

            $product = $p->getProductCart($k);
            //$cart = mysqli_fetch_all($product);
            while ($cart = mysqli_fetch_array($product))
            {
                $order[] = $cart;
                $sum += $this->formatSale($cart['price'], $cart['sale'])*$_SESSION['cart'][$cart['id_product']];
            }

            $id_o = $o->insertOrder($fname, $lname, $rname, $email, $phone, $address, $sum, $note, $id_c, $pay);
            
            $string = "";
            foreach ($order as $key => $product)
            {
                $string .= "('".$this->formatSale($product['price'], $product['sale'])."', '".$_SESSION['cart'][$product['id_product']]."', '".$this->formatSale($product['price'], $product['sale'])*$_SESSION['cart'][$product['id_product']]."', '".$id_o."', '".$product['id_product']."')";
                if ($key != count($order) - 1) {
                    $string .= ", ";
                }
                $p->updateStock2($_SESSION['cart'][$product['id_product']], $product['id_product']);
            }
            $rs = $od->insertOrderDetail($string);
            if ($rs == "true") {
                unset($_SESSION['cart']);
            }
            $this->view("layout1",
            [
                "page"=>"notifyView",
                "result"=>$rs,
            ]);
        }
            
        }

        
    }
}
?>