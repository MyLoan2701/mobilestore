<?php 

class ProductDetail extends Controller{

    function show($id){
        $p = $this->model("ProductModel");
        
        $this->view("layout1", [
            "page"=>"product-detailView",
            "detail"=>$p->editProduct($id),
        ]);
    }
}
?>