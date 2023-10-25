<?php
class Home extends Controller{
    function formatSale($price,$sale)
    {
        return ($price*(100-$sale)/100);
    }
    function formatPrice($number)
    {
        $number = intval($number);

        return number_format($number,0,',','.');
    }

    function show(){
        $c = $this->model("CategoryModel");
        $p = $this->model("ProductModel");

        $this->view("layout1", 
        [
            "page"=>"homeView",
            "lcategory" => $c->GetCategory2(),
            "sale"=> $p->productSaleLimit(),
            "hot"=> $p->productHotLimit(),
        ]);
    }
}
?>


