<?php

class SiteController
{

    public function ActionMain()
    {
        $id = 1;
        $mainTitle = array();
        $mainTitle = sp::getTitle($id);
        // echo $mainTitle['pageName'];
        require_once(ROOT . '/views/main/index.php');
        return true;
    }

    public function ActionProducts()
    {
        $id = 2;
        $mainTitle = array();
        $mainTitle = sp::getTitle($id);

        require_once(ROOT . '/views/products/index.php');
        return true;
    }

    public function ActionServices()
    {
        $id = 5;
        $mainTitle = array();
        $mainTitle = sp::getTitle($id);

        require_once(ROOT . '/views/services/index.php');
        return true;
    }

    public function ActionPrice()
    {
        $id = 3;
        $mainTitle = array();
        $mainTitle = sp::getTitle($id);

        require_once(ROOT . '/views/price/index.php');
        return true;
    }

    public function ActionContact()
    {
        $id = 6;
        $mainTitle = array();
        $mainTitle = sp::getTitle($id);
        require_once(ROOT . '/views/contact/index.php');
        return true;
    }

    public function ActionProject()
    {
        $id = 4;
        $mainTitle = array();
        $mainTitle = sp::getTitle($id);

        require_once(ROOT . '/views/project/index.php');
        return true;
    }

    public function ActionAbout()
    {
        $id = 7;
        $mainTitle = array();
        $mainTitle = sp::getTitle($id);

        require_once(ROOT . '/views/about/index.php');
        return true;
    }
}
