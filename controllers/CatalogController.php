<?php

class CatalogController
{

    public function ActionIndex($page = 1)
    {
        $products = array();
        $products = Product::getProduct($page);

        $id = 8;
        $mainTitle = array();
        $mainTitle = sp::getTitle($id);

        $total = Product::getTotalProduct();

        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
        require_once(ROOT . '/views/catalog/index.php');

        return true;
    }

    public function ActionCategory($categoryId, $page = 1)
    {
        // echo '<br>Category'.$categoryId;
        // echo '<br>Page:'.$page;

        $categoryes = array();
        $categoryes = Product::getProductByCategory($categoryId, $page);

        $total = Product::getTotalProductByCategory($categoryId);

        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
        require_once(ROOT . '/views/catalog/category.php');

        return true;
    }


    public function ActionSearch($page = 1)
    {
        $search = array();
        $search = Search::searchResult($page);

        $total = Search::getTotalSearchProduct();


        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
        require_once(ROOT . '/views/catalog/search.php');

        return true;
    }

    public function ActionMade($page = 1)
    {
        $made = array();
        $made = Search::getProductByMade();

        $total = Search::getTotalMadeProduct();

        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/made.php');
        return true;
    }
}
