<?php

class Logout extends Controller {
    function show(){
        if (isset($_SESSION['login'])) {
            unset($_SESSION['login']);
            header('location:home.php');
        }
    }

    function show2(){
        if (isset($_SESSION['loginAdmin'])) {
            unset($_SESSION['loginAdmin']);
            header('location:../admin');
        }
    }
}
?>
