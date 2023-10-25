<?php
class Search extends Controller {
    // Search Product - Client
    function show(){
        
        if (isset($_GET['search'])) {
            $k = $_GET['name'];
            $p = $this->model("ProductModel");
            $this->view("layout1",
            [
                "page"=>"searchView",
                "rs"=>$p->getSearch($k),
                "key"=> $k,
            ]);
        }
    }

    // Search Category - Admin
    function searchCategoryA(){
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

    // Search Product - Admin
    function searchProductA(){
        if (isset($_GET['search'])) {
            $k = $_GET['key'];
            $p = $this->model("ProductModel");
            $this->view("layout2",
            [
                "page"=>"phoneAV",
                "list"=>$p->SearchProduct($k),
                "key"=> $k,
            ]);
        }
    }

    // Search Order - Admin
    function searchOrderA(){
        if (isset($_GET['search'])) {
            $k = $_GET['key'];
            $o = $this->model("OrderModel");
            $this->view("layout2",
            [
                "page"=>"orderAV",
                "order"=>$o->SearchOrder($k),
                "key"=> $k,
            ]);
        }
    }

    // Search Client - Admin
    function searchClientA(){
        if (isset($_GET['search'])) {
            $k = $_GET['key'];
            $cl = $this->model("ClientModel");
            $this->view("layout2",
            [
                "page"=>"clientAV",
                "list"=>$cl->SearchClient($k),
                "key"=> $k,
            ]);
        }
    }

    // Search Admin - Admin
    function searchAdminA(){
        if (isset($_GET['search'])) {
            $k = $_GET['key'];
            $a = $this->model("AdminModel");
            $this->view("layout2",
            [
                "page"=>"adminAV",
                "list"=>$a->SearchAdmin($k),
                "key"=> $k,
            ]);
        }
    }
}
?>