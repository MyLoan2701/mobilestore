<?php 

class Login extends Controller{

    function show(){
        if (isset($_SESSION['login'])) {
            header('location:home');
        }
        else {
            $this->view("layout1", 
            [
                "page"=>"loginView",
            ]);
        }
    }

    function check($email, $password){
        $err = [];
        if (empty($email)) {
            $err['email'] = "Bạn chưa nhập email!";
        }
        if (empty($password)) {
            $err['password'] = "Bạn chưa nhập mật khẩu!";
        }
        return $err;
    }

    function checkLogin(){

        $email = $_POST["email"];
        $password = $_POST["password"];

        // $err = [];

        $m = $this->model("ClientModel");

        if (isset($_POST["login"])) {
            // if (empty($email)) {
            //     $err['email'] = "Bạn chưa nhập email!";
            // }
            // if (empty($password)) {
            //     $err['password'] = "Bạn chưa nhập mật khẩu!";
            // }
            $check = $this->check($email, $password);
            if (!empty($check)) {
                $this->view("layout1", 
                [
                    "page"=>"loginView",
                    "errlogin"=>$check,
                ]);
            }
            else
            if (isset($_POST["login"]) && $email != '' && $password != '') {
            
                $password = md5($password);
    
                $bool = $m->checkClient($email, $password);
    
                if ($bool == true) {
                    $_SESSION["login"] = $m->userClient($email, $password);
                    header('location:../home');
                }
                else
                {
                    $this->view("layout1", 
                    [
                        "page"=>"loginView",
                        "loginFail"=>false,
                    ]);
                }
            }
            
        }
        
        

        // if (isset($_POST["login"]) && $email != '' && $password != '') {
        //     $boole = $m->checkEmail($email);

        //     $password = md5($password);

        //     if ($boole == true) {
        //         $bool = $m->checkClient($email, $password);

        //         if ($bool == true) {
        //             $_SESSION["login"] = $m->userClient($email, $password);
        //             header('location:home');
        //             $this->view("layout1", 
        //             [
        //                 "page"=>"homeView",
        //             ]);
        //         }
        //         else {
        //             $this->view("layout1", 
        //             [
        //                 "page"=>"loginView",
        //                 "loginpwdfail"=>$bool,
        //             ]);
        //         }
        //     }
        //     else
        //     if ($boole == false) {
        //         $this->view("layout1", 
        //         [
        //             "page"=>"loginView",
        //             "loginemailfail"=>$boole,
        //         ]);
        //     }
        // }
    }
}
?>