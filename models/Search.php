<?php class Search
{

    /**
     * @param int $page
     * @return array
     */
    public static function searchResult($page = 1)
    {
        if ($page) {


            $page = preg_replace('/[^0-9]/', '', $page);
            $page = intval($page);

//            echo $page . '</br>';

            $offset = ($page - 1) * Product::SHOW_BY_DEFAULT;
            $offset = abs($offset);

//            echo $offset;

            $db = Db::getConnection();

            if (isset($_POST['search'])) {
                $_SESSION['SEARCH'] = $_POST['search'];

            }

            $referal = trim(strip_tags(stripcslashes(htmlspecialchars($_SESSION['SEARCH']))));

            $db_referal = array();

            $result = $db->query("SELECT * from prods_full_lift WHERE name LIKE '%$referal%' OR articul LIKE '%$referal%' LIMIT " . Product::SHOW_BY_DEFAULT . " OFFSET " . $offset);

            $i = 0;

            while ($row = $result->fetch()) {

                $db_referal[$i]['name'] = $row['name'];
                $db_referal[$i]['id'] = $row['id'];
                $db_referal[$i]['pics'] = $row['pics'];
                $i++;

            }
            return $db_referal;
        };

    }

    /**
     * @return mixed
     */
    public static function getTotalSearchProduct()
    {
        $db = Db::getConnection();

        $referal = trim(strip_tags(stripcslashes(htmlspecialchars($_SESSION['SEARCH']))));

        $result = $db->query("SELECT count(id) AS count FROM prods_full_lift WHERE name LIKE '%$referal%' OR articul LIKE '%$referal%'");

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $row = $result->fetch();
        return $row['count'];
    }

    /**
     * @param int $page
     * @return array
     */
    public static function getProductByMade($page = 1)
    {
        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = Db::getConnection();

        if (isset($_POST['made']) || isset($_POST['type']) || isset($_POST['knot'])) {


            $_SESSION['MADE'] = trim($_POST['made']);


            $_SESSION['TYPE'] = trim($_POST['type']);


            $_SESSION['KNOT'] = trim($_POST['knot']);


            if (isset($_SESSION['MADE']) || isset($_SESSION['TYPE']) || isset($_SESSION['KNOT'])) {


                $_SESSION['MADE'];
                $result = $db->query("SELECT * FROM prods_full_lift WHERE made LIKE '%$_SESSION[MADE]%' AND type LIKE '%$_SESSION[TYPE]%'  AND knot LIKE '%$_SESSION[KNOT]%'"); //. 'LIMIT ' . self::SHOW_BY_DEFAULT
                //     . ' OFFSET ' . $offset);

                echo $_SESSION['MADE'];
                $_SESSION['KNOT'];
                $_SESSION['TYPE'];

                $madePorudct = array();


                $i = 0;
                while ($row = $result->fetch()) {
                    // echo "\n<li>".$row["name"]."</li>"; //$row["name"] - имя поля таблицы
                    $madePorudct[$i]['name'] = $row['name'];
                    $madePorudct[$i]['id'] = $row['id'];
                    $madePorudct[$i]['pics'] = $row['pics'];
                    $i++;
                }


                return $madePorudct;
            }
        }
    }

    /**
     * @return mixed
     */
    public static function getTotalMadeProduct()
    {
        $db = Db::getConnection();

        if (isset($_SESSION['MADE'])) {
            $postMade = $_SESSION['MADE'];
            $result = $db->query("SELECT count(id) AS count FROM prods_full_lift WHERE made LIKE '%$postMade%'");

            $result->setFetchMode(PDO::FETCH_ASSOC);

            $row = $result->fetch();
            echo $row['count'];
            return $row['count'];
        };
    }
}

;
