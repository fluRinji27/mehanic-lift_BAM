<?php
require_once(ROOT . '/models/adminLogin.php');
require_once(ROOT . '/components/Pagination.php');
require_once(ROOT . '/models/Product.php');


// require_once (ROOT.'/components/Db.php');

class AdminController
{
    public function ActionLogin()
    {
        // $login = $_POST['adminLogin'];
        // $password = $_POST['adminPassword'];
        $users = array();
        $users = Login::adminLogin();
        require_once(ROOT . '/views/admin/login.php');
        return true;
    }

    public function ActionIndex($page = 1)
    {

        $adminProduct = array();
        $adminProduct = Product::getProduct($page);

        $total = Product::getTotalProduct();


        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
        require_once(ROOT . '/views/admin/setting.php');
        echo 'Количество продуктов ' . $total;
        return true;
    }


    public function ActionAdd()
    {
        $categoryList = array();
        $categoryList = Product::getCategoryList();


        if (isset($_POST['submit'])) {
            $imgName = pathinfo($_FILES['pics']['name'], PATHINFO_FILENAME);

            $options['name'] = $_POST['name'];
            $options['cat_names'] = $_POST['cat_names'];
            $options['cat_id'] = $_POST['cat_id'];
            $options['articul'] = $_POST['articul'];
            $options['made'] = $_POST['made'];
            $options['knot'] = $_POST['knot'];
            $options['type'] = $_POST['type'];
            $options['weight'] = $_POST['weight'];
            $options['pics'] = $imgName;


            $errors = false;

            if (
                !isset($options['name']) || empty($options['name']) ||
                !isset($options['cat_id']) || empty($options['cat_id']) ||
                !isset($options['cat_names']) || empty($options['cat_names']) ||
                !isset($options['articul']) || empty($options['articul']) ||
                !isset($options['made']) || empty($options['made']) ||
                !isset($options['knot']) || empty($options['knot']) ||
                !isset($options['type']) || empty($options['type'])
            ) {
                $errors[] = "заполните поля";
            }
            if ($errors == false) {
                $id = Product::createPorudct($options);
            }
            if ($id) {

                if (is_uploaded_file($_FILES['pics']['tmp_name'])) {
                    $imgName = pathinfo($_FILES['pics']['name'], PATHINFO_FILENAME);
                    move_uploaded_file($_FILES['pics']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/template/img/products_pictures/{$imgName}.jpg");
                }
            }

            header("Location: http://localhost:8888/faSWdsqwetacas/view");
        }

        require_once(ROOT . '/views/admin/add.php');
        return true;
    }

    public function ActionUpdate($id)
    {

        $categoryList = Product::getCategoryList();
        $product = array();
        $product = Product::getProductView($id);

        if (isset($_POST['submit'])) {
            // $imgName = pathinfo($_FILES['pics']['name'], PATHINFO_FILENAME);
            // $imgaes = pathinfo($_FILES['pics']['name']['tmp_name']);
            $options['name'] = $_POST['name'];
            $options['cat_id'] = $_POST['cat_id'];
            $cat_names = NULL;
            if ($options['cat_id'] == '1') {
                $cat_names = 'Запасные части для лифтов';
            } elseif ($options['cat_id'] == '2') {
                $cat_names = 'Запасные части для эскалаторов';
            }
            $options['cat_names'] = $cat_names;
            $options['articul'] = $_POST['articul'];
            $options['made'] = $_POST['made'];
            $options['knot'] = $_POST['knot'];
            $options['type'] = $_POST['type'];
            $options['weight'] = $_POST['weight'];
            // $options['pics'] = $imgName;
            // $options['imgae'] = $imgaes;
            // $options['hiddenImg'] = $_POST['hiddenImg'];

            $errors = false;

            // if (Product::updateProductById($id, $options)) { }


            // if($id){

            //     if(is_uploaded_file($_FILES['pics']['tmp_name'])){
            //         $imgName = pathinfo($_FILES['pics']['name'], PATHINFO_FILENAME);
            //         move_uploaded_file($_FILES['pics']['tmp_name'], $_SERVER['DOCUMENT_ROOT']. "/template/img/products_pictures/{$imgName}.jpg");
            //     } 
            // }

            header("Location: http://localhost:8888/faSWdsqwetacas/view");
        }

        require_once(ROOT . '/views/admin/update.php');
        return true;
    }

    public function ActionDelete($id)
    {

        $productItems = array();

        $productItems = Product::getProductView($id);
        if (isset($_POST['submit'])) {
            Product::DeleteProductById($id);

            header("Location: http://localhost:8888/faSWdsqwetacas/view");
        };


        require_once(ROOT . '/views/admin/delete.php');
        return true;
    }
}
