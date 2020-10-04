<?php

class ProductController
{
    public function ActionView($id)
    {

        $productItems = array();

        $productItems = Product::getProductView($id);
        require_once(ROOT . '/views/product/view.php');
        return true;
    }
}
