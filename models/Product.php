<?php

class Product
{
    const SHOW_BY_DEFAULT = 20;


    public static function getProduct($page = 1)
    {
        if ($page) {
            // $count = intval($count);

            $page = intval($page);
            $offset = $page  * self::SHOW_BY_DEFAULT;
            //echo($offset)
            //$replaceOffset = 20
            $db = Db::getConnection();
            $productsList = array();
            $result = $db->query(
                'SELECT id, name, cat_names, pics, articul FROM prods_full_lift '
                . ' ORDER BY id ASC '
                . 'LIMIT ' . self::SHOW_BY_DEFAULT
                . ' OFFSET ' . $offset
            );

            $i = 0;

            while ($row = $result->fetch()) {
                $productsList[$i]['id'] = $row['id'];
                $productsList[$i]['name'] = $row['name'];
                $productsList[$i]['cat_names'] = $row['cat_names'];
                $productsList[$i]['pics'] = $row['pics'];
                $productsList[$i]['articul'] = $row['articul'];
                $i++;
            }
            return $productsList;
        }
    }

    public static function getProductByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId) {

            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = Db::getConnection();

            $products = array();
            $result = $db->query(
                'SELECT id, name, cat_names, pics FROM prods_full_lift '
                . ' WHERE cat_id = ' . $categoryId
                . ' ORDER BY id ASC '
                . 'LIMIT ' . self::SHOW_BY_DEFAULT
                . ' OFFSET ' . $offset
            );

            $i = 0;

            while ($row = $result->fetch()) {
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['cat_names'] = $row['cat_names'];
                $products[$i]['pics'] = $row['pics'];
                $i++;
            }
            return $products;
        }
    }


    public static function getProductView($id)
    {
        // $id = $productsList['id'];
        if ($id) {
            $db = Db::getConnection();

            $productItems = array();

            $result = $db->query('SELECT * FROM prods_full_lift WHERE id =' . $id);
            // $result->setFetchMode(PDO::FETCH_ASSOC);
            $productItems = $result->fetch();
        }
        return $productItems;
    }

    public static function getTotalProductByCategory($categoryId)
    {

        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM prods_full_lift WHERE cat_id = ' . $categoryId);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $row = $result->fetch();

        return $row['count'];
    }

    public static function getTotalProduct()
    {

        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM prods_full_lift');

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $row = $result->fetch();
        return $row['count'];
    }

    public static function getCategoryList()
    {
        $db = Db::getConnection();
        $categoryList = array();
        $result = $db->query('SELECT name,cat_id FROM category');

        $i = 0;

        while ($row = $result->fetch()) {
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['cat_id'] = $row['cat_id'];
            $i++;
        }
        return $categoryList;
    }

    public static function createPorudct($options)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO prods_full_lift '
            . '(name,cat_id,articul,made,knot,type,weight,pics,cat_names) '
            . 'VALUES '
            . '(:name,:cat_id,:articul,:made,:knot,:type,:weight,:pics, :cat_names)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':cat_id', $options['cat_id'], PDO::PARAM_INT);
        $result->bindParam(':articul', $options['articul'], PDO::PARAM_INT);
        $result->bindParam(':made', $options['made'], PDO::PARAM_STR);
        $result->bindParam(':knot', $options['knot'], PDO::PARAM_STR);
        $result->bindParam(':type', $options['type'], PDO::PARAM_STR);
        $result->bindParam(':weight', $options['weight'], PDO::PARAM_INT);
        $result->bindParam(':pics', $options['pics'], PDO::PARAM_STR);
        $result->bindParam(':cat_names', $options['cat_names'], PDO::PARAM_STR);
        if ($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }

    public static function updateProductById($id, $options)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE prods_full_lift 
        SET
        name = :name,
        cat_id = :cat_id,
        articul = :articul,
        made = :made,
        knot = :knot,
        type = :type,
        weight = :weight,
        -- pics = :pics,
        cat_names = :cat_names
        WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':cat_id', $options['cat_id'], PDO::PARAM_INT);
        $result->bindParam(':articul', $options['articul'], PDO::PARAM_INT);
        $result->bindParam(':made', $options['made'], PDO::PARAM_STR);
        $result->bindParam(':knot', $options['knot'], PDO::PARAM_STR);
        $result->bindParam(':type', $options['type'], PDO::PARAM_STR);
        $result->bindParam(':weight', $options['weight'], PDO::PARAM_LOB);
        // $result ->bindParam(':pics',$options['pics'], PDO::PARAM_STR);
        $result->bindParam(':cat_names', $options['cat_names'], PDO::PARAM_STR);
        if ($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }


    public static function DeleteProductById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM prods_full_lift WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }


}
