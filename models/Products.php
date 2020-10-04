<?php


class Products
{
    public static function getProducts()
    {
        $db = Db::getConnection();

        $productsCategory = array();

        $result = $db->query('SELECT id,title,image FROM products_view');

        $i = 0;

        while ($row = $result->fetch()) {
            $productsCategory[$i]['id'] = $row['id'];
            $productsCategory[$i]['title'] = $row['title'];
            $productsCategory[$i]['image'] = $row['image'];
            $i++;
        }
        return $productsCategory;
    }
}