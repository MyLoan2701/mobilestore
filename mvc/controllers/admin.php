<?php 
require('./public/carbon/autoload.php');
use Carbon\Carbon;
use Carbon\CarbonInterval;

class Admin extends Controller{

    #Xuat giao dien quản lý
    function show(){
        if (isset($_SESSION['loginAdmin'])) {
            $this->view("layout2", ["page"=>"homeAV"]);
        }
        else {
            $this->view("layout3", 
            [
                "page"=>"loginAV",
                "messLogin"=>"Bạn cần phải đăng nhập để thực hiện hoạt động này."
            ]);
        }
        
    }
    function showMgCategory(){
        if (isset($_SESSION['loginAdmin'])) {
            $c = $this->model("CategoryModel");
            $this->view("layout2", [
                "page"=>"categoryAV",
                "category"=>$c->GetCategory(),
            ]);
        }
        else {
            $this->view("layout3", 
            [
                "page"=>"loginAV",
                "messLogin"=>"Bạn cần phải đăng nhập để thực hiện hoạt động này."
            ]);
        }
    }
    function showMgProduct(){
        if (isset($_SESSION['loginAdmin'])) {
            $p = $this->model("ProductModel");

            $this->view("layout2", [
                "page"=>"phoneAV",
                "list"=>$p->GetProduct(),
            ]);
        }
        else {
            $this->view("layout3", 
            [
                "page"=>"loginAV",
                "messLogin"=>"Bạn cần phải đăng nhập để thực hiện hoạt động này."
            ]);
        }
    }
    function showMgOrder($the){
        if (isset($_SESSION['loginAdmin'])) {
            $o = $this->model("OrderModel");

            $this->view("layout2", [
                "page"=>"orderAV",
                "order"=> $o->getStatus(1),
                "status"=>$the,
            ]);
        }
        else {
            $this->view("layout3", 
            [
                "page"=>"loginAV",
                "messLogin"=>"Bạn cần phải đăng nhập để thực hiện hoạt động này."
            ]);
        }
    }
    function showMgClient(){
        if (isset($_SESSION['loginAdmin'])) {
            $uc = $this->model("ClientModel");

            $this->view("layout2", [
                "page"=>"ClientAV",
                "list"=>$uc->GetClient(),
            ]);
        }
        else {
            $this->view("layout3", 
            [
                "page"=>"loginAV",
                "messLogin"=>"Bạn cần phải đăng nhập để thực hiện hoạt động này."
            ]);
        }
    }
    function showMgAdmin(){
        if (isset($_SESSION['loginAdmin'])) {
            $a = $this->model("AdminModel");

            $this->view("layout2", [
                "page"=>"AdminAV",
                "list"=>$a->GetAdmin(),
            ]);
        }
        else {
            $this->view("layout3", 
            [
                "page"=>"loginAV",
                "messLogin"=>"Bạn cần phải đăng nhập để thực hiện hoạt động này."
            ]);
        }
    }
    function showMgStatistical(){
        if (isset($_SESSION['loginAdmin'])) {
            $this->view("layout2", 
            [
                "page"=>"statisticalAV"
            ]);
        }
        else {
            $this->view("layout3", 
            [
                "page"=>"loginAV",
                "messLogin"=>"Bạn cần phải đăng nhập để thực hiện hoạt động này."
            ]);
        }
    }
    #Xuat giao dien THEM
    function showAddCategory() {
        if (isset($_SESSION['loginAdmin'])) {
            if ($_SESSION['loginAdmin']['level'] == "Master" || $_SESSION['loginAdmin']['level'] == "Admin") {
                $this->view("layout2", ["page"=>"addCategoryAV"]);
            }
            else {
                $c = $this->model("CategoryModel");
                $this->view("layout2", [
                    "page"=>"categoryAV",
                    "category"=>$c->GetCategory(),
                    "role"=>"Tài khoản của bạn không đủ quyền để thực hiện chức năng này. Liên hệ Master để được cấp quyền."
                ]);
            }
        }
        else {
            $this->view("layout3", 
            [
                "page"=>"loginAV",
                "messLogin"=>"Bạn cần phải đăng nhập để thực hiện hoạt động này."
            ]);
        }
    }
    function showAddPhone() {
        if (isset($_SESSION['loginAdmin'])) {
            if ($_SESSION['loginAdmin']['level'] == "Master" || $_SESSION['loginAdmin']['level'] == "Admin") {
                $c = $this->model("CategoryModel");
                $this->view("layout2", [
                    "page"=>"addProductAV",
                    "category"=>$c->GetCategory(),
                ]);
            }
            else {
                $p = $this->model("ProductModel");
                $this->view("layout2", [
                    "page"=>"phoneAV",
                    "list"=>$p->GetProduct(),
                    "role"=>"Tài khoản của bạn không đủ quyền để thực hiện chức năng này. Liên hệ Master để được cấp quyền."
                ]);
            }
        }
        else {
            $this->view("layout3", 
            [
                "page"=>"loginAV",
                "messLogin"=>"Bạn cần phải đăng nhập để thực hiện hoạt động này."
            ]);
        }
    }
    function showAddAdmin() {
        if (isset($_SESSION['loginAdmin'])) {
            if ($_SESSION['loginAdmin']['level'] == "Master") {
                $a = $this->model("AdminModel");
                $this->view("layout2", [
                    "page"=>"addAdminAV",
                    "admin"=>$a->GetAdmin(),
                ]);
            }
            else {
                $a = $this->model("AdminModel");
                $this->view("layout2", [
                    "page"=>"adminAV",
                    "list"=>$a->GetAdmin(),
                    "role"=>"Tài khoản của bạn không đủ quyền để thực hiện chức năng này. Liên hệ Master để được cấp quyền."
                ]);
            }
        }
        else {
            $this->view("layout3", 
            [
                "page"=>"loginAV",
                "messLogin"=>"Bạn cần phải đăng nhập để thực hiện hoạt động này."
            ]);
        }
    }
    #Xuất giao diện SỬA
    function showUpdateCategory($id) {
        if (isset($_SESSION['loginAdmin'])) {
            $c = $this->model("CategoryModel");
            $p = $this->model("ProductModel");

            $this->view("layout2", [
                "page"=>"updateCategoryAV",
                "edit"=>$c->editCategory($id),
                "count"=>$p->countProduct_idCategory($id),
            ]);
        }
        else {
            $this->view("layout3", 
            [
                "page"=>"loginAV",
                "messLogin"=>"Bạn cần phải đăng nhập để thực hiện hoạt động này."
            ]);
        }
    }
    function showUpdatePhone($id) {
        if (isset($_SESSION['loginAdmin'])) {
            $c = $this->model("CategoryModel");
            $p = $this->model("ProductModel");
            $this->view("layout2", [
            "page"=>"updatePhoneAV",
            "category"=>$c->GetCategory(),
            "edit"=>$p->editProduct($id),
        ]);
        }
        else {
            $this->view("layout3", 
            [
                "page"=>"loginAV",
                "messLogin"=>"Bạn cần phải đăng nhập để thực hiện hoạt động này."
            ]);
        }
    }
    function showUpdateOD($id_o) {
        if (isset($_SESSION['loginAdmin'])) {
            $o = $this->model("OrderModel");
            $od = $this->model("OrderDetailModel");
    
            $this->view("layout2", 
            [
                "page"=>"updateODAV",
                "order"=>$o->getOrder($id_o),
                "detail"=>$od->getDetail($id_o),
            ]);
        }
        else {
            $this->view("layout3", 
            [
                "page"=>"loginAV",
                "messLogin"=>"Bạn cần phải đăng nhập để thực hiện hoạt động này."
            ]);
        }
    }
    function showUpdateClient($id) {
        if (isset($_SESSION['loginAdmin'])) {
            $uc = $this->model("ClientModel");
            $this->view("layout2", [
                "page"=>"updateClientAV",
                "edit"=>$uc->editClient($id),
            ]);
        }
        else {
            $this->view("layout3", 
            [
                "page"=>"loginAV",
                "messLogin"=>"Bạn cần phải đăng nhập để thực hiện hoạt động này."
            ]);
        }
    }
    function showUpdateAdmin($id) {
        if (isset($_SESSION['loginAdmin'])) {
            $a = $this->model("AdminModel");
            $this->view("layout2", [
                "page"=>"updateAdminAV",
                "edit"=>$a->editAdmin($id),
            ]);
        }
        else {
            $this->view("layout3", 
            [
                "page"=>"loginAV",
                "messLogin"=>"Bạn cần phải đăng nhập để thực hiện hoạt động này."
            ]);
        }
    }

    #Xuat giao dien SEARCH
    function searchCategory() {
        if (isset($_GET['search'])) {
            $k = $_GET['key'];
            $c = $this->model("CategoryModel");
            $this->view("layout2",
            [
                "page"=>"categoryAV",
                "category"=>$c->SearchCategory($k),
                "key"=> $k,
            ]);
        }
    }

    function searchProduct() {
        if (isset($_GET['search'])) {
            $k = $_GET['key'];
            $p = $this->model("ProductModel");
            $this->view("layout2",
            [
                "page"=>"phoneAV",
                "list"=>$p->getSearch($k),
                "key"=> $k,
            ]);
        }
    }

    //MANAGE CATEGORY
    #Them danh mục
    public function addCategory() {
        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $img = $_POST["img"];
            $d = $_POST["description"];
            $status = $_POST["status"];
            $e = false;

            if (empty($name)) {
                $this->view("layout2", [
                    "page"=>"addCategoryAV",
                    "result"=>$e,
                ]);
            }
            else {
                $c = $this->model("CategoryModel");
                $rs = $c->insertCategory($name, $img, $d, $status);
                $this->view("layout2", [
                "page"=>"addCategoryAV",
                "result"=>$rs,
            ]);
            }
        }
    }
    #Sua danh mục
    public function updateCategory($id) {
        if ($_SESSION['loginAdmin']['level'] == "Master" || $_SESSION['loginAdmin']['level'] == "Admin") {
            if (isset($_POST["submit"])) {
                $name = $_POST["name"];
                $img = $_POST["img"];
                $d = $_POST["description"];
                $status = $_POST["status"];
                $e = false;

                $c = $this->model("CategoryModel");
                $p = $this->model("ProductModel");
    
                if (empty($name)) {
                    
                    $this->view("layout2", [
                        "page"=>"updateCategoryAV",
                        "result"=>$e,
                        "edit"=>$c->editCategory($id),
                        "count"=>$p->countProduct_idCategory($id),
                    ]);
                }
                else {
                    $rs = $c->updateCategory($id,$name, $img, $d, $status);
                    $this->view("layout2", [
                    "page"=>"updateCategoryAV",
                    "result"=>$rs,
                    "edit"=>$c->editCategory($id),
                    "count"=>$p->countProduct_idCategory($id),
                ]);
                }
            }
        }
        else {
            $c = $this->model("CategoryModel");
            $p = $this->model("ProductModel");
            $this->view("layout2", [
                "page"=>"updateCategoryAV",
                "edit"=>$c->editCategory($id),
                "count"=>$p->countProduct_idCategory($id),
                "role"=>"Tài khoản của bạn không đủ quyền để thực hiện chức năng này. Liên hệ Master để được cấp quyền."
            ]);
        }
    }
    #xoa
    public function deleteCategory($id) {
        if ($_SESSION['loginAdmin']['level'] == "Master" || $_SESSION['loginAdmin']['level'] == "Admin") {
            $c = $this->model("CategoryModel");
            $rs = $c->delCategory($id);
            $this->view("layout2", [
                "page"=>"categoryAV",
                "category"=>$c->GetCategory(),
            ]);
        }
        else {
            $c = $this->model("CategoryModel");
            $this->view("layout2", [
                "page"=>"categoryAV",
                "category"=>$c->GetCategory(),
                "role"=>"Tài khoản của bạn không đủ quyền để thực hiện chức năng này. Liên hệ Master để được cấp quyền."
            ]);
        }
    }

// MANAGE PRODUCT
    #them 
    public function addProduct() {
        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $price = $_POST["price"];
            $img = $_POST["img"];
            $sale = $_POST["sale"];
            $stock = $_POST["stock"];
            $status = $_POST["activity"];
            $info = $_POST["info"];
            $d = $_POST["description"];
            $release = $_POST["release"];
            $id_c = $_POST["id_c"];
            
            $e = false;

            if (empty($name)) {
                $c = $this->model("CategoryModel");
                $this->view("layout2", [
                    "page"=>"addProductAV",
                    "category"=>$c->GetCategory(),
                    "result"=>$e,
                ]);
            }
            else {
                $p = $this->model("ProductModel");
                $c = $this->model("CategoryModel");
                $rs = $p->insertProduct($name, $price, $img, $sale, $stock, $status, $info, $d, $id_c, $release);
                $this->view("layout2", [
                "page"=>"addProductAV",
                "category"=>$c->GetCategory(),
                "result"=>$rs,
            ]);
            }
        }
    }
    #Sua
    public function updateProduct($id) {
        if ($_SESSION['loginAdmin']['level'] == "Master" || $_SESSION['loginAdmin']['level'] == "Admin") {
            if (isset($_POST["submit"])) {
                $name = $_POST["name"];
                $price = $_POST["price"];
                $img = $_POST["img"];
                $sale = $_POST["sale"];
                $stock = $_POST["stock"];
                $status = $_POST["activity"];
                $info = $_POST["info"];
                $d = $_POST["description"];
                $release = $_POST["release"];
                $id_c = $_POST["id_c"];
                $e = false;
    
                if (empty($name)) {
                    $c = $this->model("CategoryModel");
                    $p = $this->model("ProductModel");
                    $this->view("layout2", [
                        "page"=>"updatePhoneAV",
                        "category"=>$c->GetCategory(),
                        "result"=>$e,
                        "edit"=>$p->editProduct($id),
                    ]);
                }
                else {
                    $p = $this->model("ProductModel");
                    $c = $this->model("CategoryModel");
                    $rs = $p->updateProduct($id, $name, $price, $img, $sale, $stock, $status, $info, $d, $id_c, $release);
                    $this->view("layout2", [
                    "page"=>"updatePhoneAV",
                    "category"=>$c->GetCategory(),
                    "result"=>$rs,
                    "edit"=>$p->editProduct($id),
                ]);
                }
            }
        }
        else {
            $p = $this->model("ProductModel");
            $c = $this->model("CategoryModel");
            $this->view("layout2", [
                "page"=>"updatePhoneAV",
                "category"=>$c->GetCategory(),
                "edit"=>$p->editProduct($id),
                "role"=>"Tài khoản của bạn không đủ quyền để thực hiện chức năng này. Liên hệ Master để được cấp quyền."
            ]);
        }
    }
    #xoa
    public function deleteProduct($id) {
        if ($_SESSION['loginAdmin']['level'] == "Master" || $_SESSION['loginAdmin']['level'] == "Admin") {
            $p = $this->model("ProductModel");
            $rs = $p->delProduct($id);
            $this->view("layout2", [
                "page"=>"phoneAV",
                "list"=>$p->GetProduct(),
            ]);
        }
        else {
            $p = $this->model("ProductModel");
            $this->view("layout2", [
                "page"=>"phoneAV",
                "list"=>$p->GetProduct(),
                "role"=>"Tài khoản của bạn không đủ quyền để thực hiện chức năng này. Liên hệ Master để được cấp quyền."
            ]);
        }
    }


    function formatSale($price,$sale)
    {
        return ($price*(100-$sale)/100);
    }
    function formatPrice($number)
    {
        $number = intval($number);

        return number_format($number,0,',','.');
    }

    // MANAGE ADMIN
    #Them Admin
    public function addAdmin() {
        if (isset($_POST["submit"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $address = $_POST["address"];
            $img = $_POST["img"];
            $sex = $_POST["sex"];
            $birth = $_POST["birth"];
            $hometown = $_POST["hometown"];
            // $status = $_POST["status"];
            $level = $_POST["level"];
            $e = false;

            $password = md5($password);
            if (empty($name)) {
                $this->view("layout2", [
                    "page"=>"addAdminAV",
                    "result"=>$e,
                ]);
            }
            else {
                $a = $this->model("AdminModel");
                $rs = $a->insertAdmin($email, $password, $name, $phone, $address, $img, $sex, $birth, $hometown, $level);
                $this->view("layout2", [
                "page"=>"addAdminAV",
                "result"=>$rs,
            ]);
            }
        }
    }
    #Sua Admin
    public function updateAdmin($id) {
        if ($_SESSION['loginAdmin']['level'] == "Master") {
            if (isset($_POST["submit"])) {
                $email = $_POST["email"];
                $password = $_POST["password"];
                $name = $_POST["name"];
                $phone = $_POST["phone"];
                $address = $_POST["address"];
                $img = $_POST["img"];
                $sex = $_POST["sex"];
                $birth = $_POST["birth"];
                $hometown = $_POST["hometown"];
                $status = $_POST["status"];
                $level = $_POST["level"];
                $e = false;
    
                $password = md5($password);
                if (empty($name)) {
                    $a = $this->model("AdminModel");
                    $this->view("layout2", [
                        "page"=>"updateAdminAV",
                        "result"=>$e,
                        "edit"=>$a->editAdmin($id),
                    ]);
                }
                else {
                    $a = $this->model("AdminModel");
                    $rs = $a->updateAdmin($id, $email, $password, $name, $phone, $address, $img, $sex, $birth, $hometown, $status, $level);
                    $this->view("layout2", [
                    "page"=>"updateAdminAV",
                    "result"=>$rs,
                    "edit"=>$a->editAdmin($id),
                ]);
                }
            }
        }
        else {
            $a = $this->model("AdminModel");
            $this->view("layout2", [
                "page"=>"updateAdminAV",
                "edit"=>$a->editAdmin($id),
                "role"=>"Tài khoản của bạn không đủ quyền để thực hiện chức năng này. Liên hệ Master để được cấp quyền."
            ]);
        }
    }
    #xoa
    public function deleteAdmin($id) {
        if ($_SESSION['loginAdmin']['level'] == "Master") {
            $a = $this->model("AdminModel");
            $rs = $a->delAdmin($id);
            $this->view("layout2", [
                "page"=>"adminAV",
                "list"=>$a->GetAdmin(),
            ]);
        }
        else {
            $a = $this->model("AdminModel");
            $this->view("layout2", [
                "page"=>"adminAV",
                "list"=>$a->GetAdmin(),
                "role"=>"Tài khoản của bạn không đủ quyền để thực hiện chức năng này. Liên hệ Master để được cấp quyền."
            ]);
        }
    }

    // MANAGE CLIENT
    #Sua
    public function updateClient($id) {
        if ($_SESSION['loginAdmin']['level'] == "Master" || $_SESSION['loginAdmin']['level'] == "Admin") {
            if (isset($_POST["submit"])) {
                $status = $_POST["status"];
                $e = false;
                $uc = $this->model("ClientModel");
                $rs = $uc->updateClient($id, $status);
                $this->view("layout2", [
                    "page"=>"updateClientAV",
                    "result"=>$rs,
                    "edit"=>$uc->editClient($id),
                ]);
            }
        }
        else {
            $uc = $this->model("ClientModel");
            $this->view("layout2", [
                "page"=>"updateClientAV",
                "edit"=>$uc->editClient($id),
                "role"=>"Tài khoản của bạn không đủ quyền để thực hiện chức năng này. Liên hệ Master để được cấp quyền."
            ]);
        }
    }
    #xoa
    public function deleteClient($id) {
        if ($_SESSION['loginAdmin']['level'] == "Master" || $_SESSION['loginAdmin']['level'] == "Admin") {
            $uc = $this->model("CLientModel");
            $rs = $uc->delClient($id);
            $this->view("layout2", [
                "page"=>"clientAV",
                "list"=>$uc->GetClient(),
            ]);
        }
        else {
            $uc = $this->model("ClientModel");
            $this->view("layout2", [
                "page"=>"ClientAV",
                "list"=>$uc->GetClient(),
                "role"=>"Tài khoản của bạn không đủ quyền để thực hiện chức năng này. Liên hệ Master để được cấp quyền."
            ]);
        }
    }

    // MANAGE ORDER
    #show order
    public function showOrder($the)  {
        $o = $this->model("OrderModel");
        $od = $this->model("OrderDetailModel");

        switch ($the) {
            case 'waiting':
                $this->view("layout2", [
                    "page"=>"orderAV",
                    "order"=> $o->getStatus(1),
                    "status"=>$the,
                    // "name"=>var_dump(explode("/", filter_var(trim($_GET["url"], "/")))[2]),
                ]);
                break;
            case 'confirmed':
                $this->view("layout2", [
                    "page"=>"orderAV",
                    "order"=> $o->getStatus(2),
                    "status"=>$the,
                ]);
                break;
            case 'shipping':
                $this->view("layout2", [
                    "page"=>"orderAV",
                    "order"=> $o->getStatus(3),
                    "status"=>$the,
                ]);
                break;
            case 'delivered':
                $this->view("layout2", [
                    "page"=>"orderAV",
                    "order"=> $o->getStatus(4),
                    "status"=>$the,
                ]);
                break;
            case 'cancelled':
                $this->view("layout2", [
                    "page"=>"orderAV",
                    "order"=> $o->getStatus(5),
                    "status"=>$the,
                ]);
                break;
            case 're-verify':
                $this->view("layout2", [
                    "page"=>"orderAV",
                    "order"=> $o->getStatus(6),
                    "status"=>$the,
                ]);
                break;
            case 'all':
                $this->view("layout2", [
                    "page"=>"orderAV",
                    "order"=> $o->getOrderAll(),
                    "status"=>$the,
                ]);
                break;
        }
    }
    #od
    public function updateOD($id) {
        $o = $this->model("OrderModel");
        $p = $this->model("ProductModel");
        $od = $this->model("OrderDetailModel");
        $arr = $od->getDetail($id);
        
        if (isset($_POST["submit"])) {
            $note = $_POST["note_admin"];
            $status = $_POST["status"];
            while ($list_p = mysqli_fetch_array($arr)) {
                if ($status == 2) {
                    if ($list_p['status'] != 2) {
                        $stock = $list_p["stock"] - $list_p["qty"];
                        $rs2 = $p->updateStock($stock, $list_p["id_product"]);
                    }
                }
                if ($status == 4) {
                    if ($list_p['status'] != 4) {
                        $sold = $list_p["sold"] + $list_p["qty"];
                        $p->updateSold($sold, $list_p["id_product"]);
                    }
                }
                if ($status == 5) {
                    $p->updateStock22($list_p["id_product"]);
                    // switch ($list_p['status']) {
                    //     case '1':
                    //         $p->updateStock22($list_p["id_product"]);
                    //         break;
                    //     case '2':
                    //         $stock = $list_p["stock"] + $list_p["qty"];
                    //         $p->updateStock($stock, $list_p["id_product"]);
                    //         $p->updateStock22($list_p["id_product"]);
                    //         break;
                    //     case '3':
                    //         $stock = $list_p["stock"] + $list_p["qty"];
                    //         $p->updateStock($stock, $list_p["id_product"]);
                    //         $p->updateStock22($list_p["id_product"]);
                    //         break;
                    //     case '5':
                    //         break;
                    //     case '6':
                    //         $p->updateStock22($list_p["id_product"]);
                    //         break;
                    //     default:
                    //         # code...
                    //         break;
                    // }
                }
                if ($status == 6) {
                    switch ($list_p['status']) {
                        case '1':
                            break;
                        case '2':
                            $stock = $list_p["stock"] + $list_p["qty"];
                            $p->updateStock($stock, $list_p["id_product"]);
                            break;
                        case '3':
                            $stock = $list_p["stock"] + $list_p["qty"];
                            $p->updateStock($stock, $list_p["id_product"]);
                            break;
                        case '6':
                            break;
                        default:
                            # code...
                            break;
                    }
                }

            }
            $rs = $o->updateOrder($id, $note, $status);
            $this->showUpdateOD($id);
        }
    }

    //Login Admin
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

    public function loginAdmin() {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $a = $this->model("AdminModel");

        if (isset($_POST["login"])) {
            $check = $this->check($email, $password);
            if (!empty($check)) {
                $this->view("layout2", 
                [
                    "page"=>"loginAV",
                    "errlogin"=>$check,
                ]);
            }
            else
            if (isset($_POST["login"]) && $email != '' && $password != '') {
            
                $password = md5($password);
    
                $bool = $a->checkAdmin($email, $password);
    
                if ($bool == true) {
                    $_SESSION["loginAdmin"] = $a->userAdmin($email, $password);
                    header('location:../admin');
                }
                else
                {
                    $this->view("layout3", 
                    [
                        "page"=>"loginAV",
                        "loginFail"=>false,
                    ]);
                }
            }
        }
    }

    //Account admin
    #show acc 
    public function showMgAccount($id) {
        $a = $this->model("AdminModel");

        if (isset($_SESSION['loginAdmin'])) {
            $this->view("layout2", [
                "page"=>"accountAV",
                "acc"=>$a->editAdmin($id),
            ]);
        }
        else {
            $this->view("layout3", 
            [
                "page"=>"loginAV",
                "messLogin"=>"Bạn cần phải đăng nhập để thực hiện hoạt động này."
            ]);
        }
    }
    #update acc
    function checkAcc($name, $phone, $address, $sex, $birth, $hometown){
        $err = [];
        if (empty($name)) {
            $err['name'] = "Bạn chưa nhập Họ và tên.";
        }
        if (empty($phone)) {
            $err['phone'] = "Bạn chưa nhập số điện thoại.";
        }
        if (empty($address)) {
            $err['address'] = "Bạn chưa nhập địa chỉ.";
        }
        if (empty($sex)) {
            $err['sex'] = "Bạn chưa nhập giới tính.";
        }
        if (empty($birth)) {
            $err['birth'] = "Bạn chưa nhập ngày sinh.";
        }
        if (empty($hometown)) {
            $err['hometown'] = "Bạn chưa nhập quê quán.";
        }

        return $err;
    }
    public function updateAccAdmin($id) {
        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $address = $_POST["address"];
            $img = $_POST["img"];
            $sex = $_POST["sex"];
            $birth = $_POST["birth"];
            $hometown = $_POST["hometown"];
            $e = false;

            $a = $this->model("AdminModel");
            
            $check_acc = $this->checkAcc($name, $phone, $address, $sex, $birth, $hometown);

            if (!empty($check_acc)) {
                $this->view("layout2", 
                [
                    "page"=>"accountAV",
                    "err"=>$check_acc,
                    "acc"=>$a->editAdmin($id),
                ]);
            }
            else {
                $rs = $a->updateAcc($id, $name, $phone, $address, $img, $sex, $birth, $hometown);
                $this->view("layout2", [
                "page"=>"accountAV",
                "result"=>$rs,
                "acc"=>$a->editAdmin($id),
            ]);
            }
        }
    }
    #update pwd
    function checkPwd($old, $new, $confirm, $pwd){
        $err = [];
        $change = md5($old);
        $change2 = md5($new);

        if (empty($old)) {
            $err['old'] = "Bạn chưa nhập mật khẩu cũ.";
        }
        if (empty($new)) {
            $err['new'] = "Bạn chưa nhập mật khẩu mới.";
        }
        if (empty($confirm)) {
            $err['confirm'] = "Bạn chưa nhập lại mật khẩu mới.";
        }
        if ($change == $change2) {
            $err['same'] = "Mật khẩu mới không có gì thay đổi.";
        }
        if ($new != $confirm) {
            $err['different'] = "Mật khẩu nhập lại không đúng.";
        }
        if ($change != $pwd) {
            $err['different2'] = "Mật khẩu cũ không đúng.";
        }
        return $err;
    }
    public function updatePassAdmin($id) {
        $old = $_POST['oldpwd'];
        $new = $_POST['newpwd'];
        $confirm= $_POST['confirmpwd'];
        $pwd = $_POST['pwd'];

        $a = $this->model("AdminModel");

        if (isset($_POST['changePwd'])) {
            $check = $this->checkPwd($old, $new, $confirm, $pwd);
            if (!empty($check)) {
                $this->view("layout2",
                [
                    "page"=>"accountAV",
                    "err"=>$check,
                    "acc"=>$a->editAdmin($id),
                ]);
            }
            else {
                $p = md5($new);
                $rs = $a->updatePwd($id, $p);
                if ($rs == "true") {
                    $_SESSION["loginAdmin"] = $a->userAdmin2($id);
                }
                $this->view("layout2",
                [
                    "page"=>"accountAV",
                    "acc"=>$a->editAdmin($id),
                    "pwd"=>$rs,
                ]);
            }
        }
    }

    //Thống kê
    public function statistical(){
        $s = $this->model("StatisticalModel");

        if (isset($_POST['time'])) {
            $time = $_POST['time'];
        }
        else {
            $time = '';
            $subday = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString(); // 365 ngày
        }

        if ($time == '7days') {
            $subday = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        }
        else if ($time == '30days') {
            $subday = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->toDateString();
        }
        else if ($time == '90days') {
            $subday = Carbon::now('Asia/Ho_Chi_Minh')->subDays(90)->toDateString();
        }
        else if ($time == '365days') {
            $subday = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
        }

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if (isset($_POST['from_date']) && isset($_POST['to_date'])) {
            $subday = $_POST['from_date'];
            $now = $_POST['to_date'];
        }

        $rs = $s->getStatistica($now, $subday);

        foreach($rs as $key => $row) {
            $chart_data[] = array(
                'date' => $row['date_statistical'],
                'num_order' =>$row['num_orders'],
                'revenue' =>$row['revenue'],
                'quantity' =>$row['quantity'],
            );
        }

        echo $data = json_encode($chart_data);
        
    }
    public function addStatistical(){
        
    }
}
?>