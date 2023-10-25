<?php

class Signup extends Controller{

    function show(){
        $this->view("layout1", 
        [
            "page"=>"signupView",
        ]);
    }

    public function insertClient(){
        $currentPage = $_SERVER['HTTP_REFERER'];

        $email = $_POST["email"];
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];
        $name = $_POST["lname"];

        $p = false;
        $err = [];
        
        $m = $this->model("ClientModel");

        # Kiem tra password va repassword co giong nhau khong
        if ($password == $repassword) {
            $p = true;
        }
        else {$p = false;}

        # Kiem tra và xu ly signup
        if (isset($_POST["signup"])) {
            if (empty($name)) {
                $err['name'] = "Bạn chưa nhập tên!";
            }
            if (empty($email)) {
                $err['email'] = "Bạn chưa nhập email!";
            }
            if (empty($password)) {
                $err['password'] = "Bạn chưa nhập mật khẩu!";
            }
            if (empty($repassword)) {
                $err['repassword'] = "Bạn chưa nhập lại mật khẩu!";
            }
            if ($password != $repassword) {
                $err['rpassword'] = "Mật khẩu nhập lại không trùng nhau!";
            }

            $this->view("layout1", 
            [
                "page"=>"signupView",
                "errsignup"=>$err,
            ]);
        }

        if (isset($_POST["signup"]) && $email != '' 
        && $password != '' && $repassword != '' && $name != '') {
            
            $bool = $m->checkEmail($email);
            
            if($bool == false && $p == true) {
                $password = md5($password);
                $m->AddClient($email, $password);

                $this->view("layout1", 
                [
                    "page"=>"signupView",
                    "rssignup"=>$bool = $m->checkEmail($email),
                ]);
            }
            else
            if ($bool == true) {
                $this->view("layout1", 
                [
                    "page"=>"signupView",
                    "emailfail"=>$bool,
                ]);
            }
        }
        
    }
}
?>