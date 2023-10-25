<?php

class Controller {

    //Gọi models
    public function model($model) {
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    //Gọi views
    public function view($view, $data = []) {
        require_once "./mvc/views/".$view.".php";
    }
    //Giá product sau khi sale
    function formatSale($price,$sale)
    {
        return ($price*(100-$sale)/100);
    }
    //Giá product - làm dễ nhìn hơn
    function formatPrice($number)
    {
        $number = intval($number);

        return number_format($number,0,',','.');
    }
    

    public function postInput($string) {
        return isset($_POST[$string]) ? $_POST[$string] : '';
    }

    public function phpAlert($msg) {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }
}
?>