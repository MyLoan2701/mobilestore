<?php 

class Phone extends Controller{

    // function show($page){
    //     $c = $this->model("CategoryModel");
    //     $p = $this->model("ProductModel");

    //     $total_p = mysqli_num_rows($p->GetProduct2());
    //     $limit = 12;
    //     $total_page = ceil($total_p/$limit);
    //     // isset($page) ? $curent_pade = $page : $curent_pade = 1;
    //     $curent_pade = $page;
    //     $offset = ($curent_pade - 1) * $limit;

    //     $this->view("layout1", [
    //         "page"=>"phoneView",
    //         "lcategory" => $c->GetCategory2(),
    //         "phone"=> $p->GetProductLimit($limit, $offset),
    //         "name"=>var_dump($page),
    //         "paging"=>$total_page,
    //     ]);
    // }
    function show($the, $page) {
        $c = $this->model("CategoryModel");
        $p = $this->model("ProductModel");

        $limit = 12;
        $curent_page = ($page < 1) ? 1 : $page ;
        $offset = ($curent_page - 1) * $limit;
        
        switch ($the) {
            case 'all':
                $total_p = mysqli_num_rows($p->GetProduct2());
                $total_page = ceil($total_p/$limit);
                $this->view("layout1", [
                    "page"=>"phoneView",
                    "lcategory" => $c->GetCategory2(),
                    "phone"=> $p->GetProductLimit($limit, $offset),
                    // "name"=>var_dump(explode("/", filter_var(trim($_GET["url"], "/")))[2]),
                    "name"=>"",
                    "paging"=>$total_page,
                    "currentPage"=>$curent_page,
                ]);
                break;
            case 'sale':
                $total_p = mysqli_num_rows($p->getSale());
                $total_page = ceil($total_p/$limit);
                $this->view("layout1", [
                    "page"=>"phoneView",
                    "lcategory" => $c->GetCategory2(),
                    "phone"=> $p->productSale($limit, $offset),
                    "name"=>"giảm giá",
                    "the"=>$the,
                    "paging"=>$total_page,
                    "currentPage"=>$curent_page,
                ]);
                break;
            case 'hot':
                $total_p = mysqli_num_rows($p->getHot());
                $total_page = ceil($total_p/$limit);
                $this->view("layout1", [
                    "page"=>"phoneView",
                    "lcategory" => $c->GetCategory2(),
                    "phone"=> $p->productHot($limit, $offset),
                    "name"=>"nổi bật",
                    "the"=>$the,
                    "paging"=>$total_page,
                    "currentPage"=>$curent_page,
                ]);
                break;
            case 'new':
                $total_p = mysqli_num_rows($p->getNew());
                $total_page = ceil($total_p/$limit);
                $this->view("layout1", [
                    "page"=>"phoneView",
                    "lcategory" => $c->GetCategory2(),
                    "phone"=> $p->productNew($limit, $offset),
                    "name"=>"mới",
                    "the"=>$the,
                    "paging"=>$total_page,
                    "currentPage"=>$curent_page,
                ]);
                break;
            case 'desc':
                $total_p = mysqli_num_rows($p->GetProduct2());
                $total_page = ceil($total_p/$limit);
                $this->view("layout1", [
                    "page"=>"phoneView",
                    "lcategory" => $c->GetCategory2(),
                    "phone"=> $p->productDESC($limit, $offset),
                    "name"=>"",
                    "paging"=>$total_page,
                    "currentPage"=>$curent_page,
                ]);
                break;
            case 'asc':
                $total_p = mysqli_num_rows($p->GetProduct2());
                $total_page = ceil($total_p/$limit);
                $this->view("layout1", [
                    "page"=>"phoneView",
                    "lcategory" => $c->GetCategory2(),
                    "phone"=> $p->productASC($limit, $offset),
                    "name"=>"",
                    "paging"=>$total_page,
                    "currentPage"=>$curent_page,
                ]);
                break;
            default:
                $this->show("all","1");
                break;
        }
        
    }

    function showProductByCategory($id) {
        $p = $this->model("ProductModel");
        $c = $this->model("CategoryModel");

        $this->view("layout1", [
            "page"=>"phoneView",
            "lcategory" => $c->GetCategory2(),
            "pbc"=> $p->GetProductByCategory($id),
            "pbcn"=> $p->GetProductByCategoryName($id),
        ]);
    }

}
?>