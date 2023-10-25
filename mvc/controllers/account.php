<?php 

class Account extends Controller{

    function show(){
        if (isset($_SESSION['login'])) {
            $this->view("layout1", 
            [
                "page"=>"accountView",
                "page2"=>"accInfoView",
            ]);
        }
        else {
            $this->view("layout1", 
            [
                "page"=>"loginView",
                "messLogin"=>"Bạn cần phải đăng nhập để thực hiện hoạt động này."
            ]);
        }
        //$this->view("layout1", ["page"=>"accountView"]);
    }

    function detail(){
        if (isset($_SESSION['login'])) {
            $this->view("layout1", 
            [
                "page"=>"accountView",
                "page2"=>"accDetailView",
            ]);
        }
        else {
            $this->view("layout1", 
            [
                "page"=>"loginView",
                "messLogin"=>"Bạn cần phải đăng nhập để thực hiện hoạt động này."
            ]);
        }
    }

    function address(){
        if (isset($_SESSION['login'])) {
            $this->view("layout1", 
            [
                "page"=>"accountView",
                "page2"=>"accAddressView",
            ]);
        }
        else {
            $this->view("layout1", 
            [
                "page"=>"loginView",
                "messLogin"=>"Bạn cần phải đăng nhập để thực hiện hoạt động này."
            ]);
        }
    }

    function order(){
        $o = $this->model("OrderModel");
        $od = $this->model("OrderDetailModel");
        if (isset($_SESSION['login'])) {
            
            $this->view("layout1", 
            [
                "page"=>"accountView",
                "page2"=>"accOrderView",
                "order"=>$o->getOrderClient($_SESSION['login']['id_client'])
            ]);
        }
        else {
            $this->view("layout1", 
            [
                "page"=>"loginView",
                "messLogin"=>"Bạn cần phải đăng nhập để thực hiện hoạt động này."
            ]);
        }
    }

    function orderDetail($id) {
        $o = $this->model("OrderModel");
        $od = $this->model("OrderDetailModel");
        if (isset($_SESSION['login'])) {
            
            $this->view("layout1", 
            [
                "page"=>"accountView",
                "page2"=>"accOrderDetailView",
                "order"=>$o->getOrder($id),
                "detail"=>$od->getDetail($id),
            ]);
        }
        else {
            $this->view("layout1", 
            [
                "page"=>"loginView",
                "messLogin"=>"Bạn cần phải đăng nhập để thực hiện hoạt động này."
            ]);
        }
    }
    function checkInfo($fname, $lname, $phone) {
        if ($fname == $_SESSION["login"]["fname"]
        && $lname == $_SESSION["login"]["lname"]
        && $phone == $_SESSION["login"]["phone"]) {
            return true;
        }
        else return false;
    }
    function updateInfo($id){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];

        $c = $this->model("ClientModel");

        if (isset($_POST['info'])) {
            $bool = $this->checkInfo($fname, $lname, $phone);
            if ($bool == "true") {
                $this->detail();
            }
            else {
                $rs = $c->updateClient2($id, $fname, $lname, $phone);
                if ($rs == "true") {
                    $_SESSION["login"] = $c->userClient2($id);
                }
                $this->view("layout1",
                [
                    "page"=>"accountView",
                    "page2"=>"accDetailView",
                    "result"=>$rs,
                ]);
            }
        }
    }

    function check($old, $new, $confirm, $pwd){
        $err = [];
        $change = md5($old);
        $change2 = md5($new);

        if (empty($old)) {
            $err['old'] = "Bạn chưa nhập mật khẩu cũ!";
        }
        if (empty($new)) {
            $err['new'] = "Bạn chưa nhập mật khẩu mới!";
        }
        if (empty($confirm)) {
            $err['confirm'] = "Bạn chưa nhập lại mật khẩu mới!";
        }
        if ($change == $change2) {
            $err['same'] = "Mật khẩu mới không có gì thay đổi!";
        }
        if ($new != $confirm) {
            $err['different'] = "Mật khẩu nhập lại không đúng!";
        }
        if ($change != $pwd) {
            $err['different2'] = "Mật khẩu cũ không đúng!";
        }
        return $err;
    }
    function updatePwd($id){
        $old = $_POST['oldpwd'];
        $new = $_POST['newpwd'];
        $confirm= $_POST['confirmpwd'];
        $pwd = $_POST['pwd'];

        $c = $this->model("ClientModel");

        if (isset($_POST['changePwd'])) {
            $check = $this->check($old, $new, $confirm, $pwd);
            if (!empty($check)) {
                $this->view("layout1",
                [
                    "page"=>"accountView",
                    "page2"=>"accDetailView",
                    "err"=>$check,
                ]);
            }
            else {
                $p = md5($new);
                $rs = $c->updatePwd($id, $p);
                if ($rs == "true") {
                    $_SESSION["login"] = $c->userClient2($id);
                }
                $this->view("layout1",
                [
                    "page"=>"accountView",
                    "page2"=>"accDetailView",
                    "pwd"=>$rs,
                ]);
            }
        }
    }

    function updateAddress($id){
        $a = $_POST['address'];
        $old = $_SESSION['login']['address'];
        $c = $this->model("ClientModel");

        if (isset($_POST['submitA'])) {
            if (empty($a) || $a == $old) {
                $this->view("layout1",
                [
                    "page"=>"accountView",
                    "page2"=>"accAddressView",
                ]);
            }
            else {
                $rs = $c->editAddress($id, $a);
                if ($rs == "true") {
                    $_SESSION["login"] = $c->userClient2($id);
                }
                $this->view("layout1",
                [
                    "page"=>"accountView",
                    "page2"=>"accAddressView",
                    "result"=>$rs,
                ]);
            }
        }
    }

    function cancelOrder($id){
        $o = $this->model("OrderModel");
        $od = $this->model("OrderDetailModel");
        $other = $_POST['reason'];
        $note = "Khách hàng hủy đơn";
        $rs2 = 0;
        $rs = "";
        $s2 = 0;
        
        if (isset($_SESSION['login'])) {
            
            if (isset($_POST['cancel'])) {
                $status = $o->getOrder($id);
                while ($s = mysqli_fetch_array($status)) {
                    if ($s['status'] == 1) {
                        $s2 = $s['status'];
                        $rs = $o->updateOrder2($id, $note, 5, $other);
                        $rs2 = 5;
                    }
                    else if ($s['status'] == 2 || $s['status'] == 3) {
                        $s2 = $s['status'];
                        $rs = $o->updateOrder2($id, $note, 6, $other);
                        $rs2= 6;
                    }
                }
                $this->view("layout1", 
                [
                    "page"=>"accountView",
                    "page2"=>"accOrderDetailView",
                    "rs"=>$rs,
                    "rs2"=>$rs2,
                    "s2"=>$s2,
                    "order"=>$o->getOrder($id),
                    "detail"=>$od->getDetail($id),
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
}
?>