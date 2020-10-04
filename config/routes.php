<?php
return array(

    //АДМИНКА
    'faSWdsqwetacas/view/add' => 'admin/add', // actionAdd => AdminController
    'faSWdsqwetacas/view/update/([0-9]+)' => 'admin/update/$1', // actionUpdate => AdminController
    'faSWdsqwetacas/view/delete/([0-9]+)' => 'admin/delete/$1',// actionDelete => AdminController
    'faSWdsqwetacas/view/page-([0-9]+)' => 'admin/index/$1',
    'faSWdsqwetacas/view/page-([0-9]+[0-9])' => 'admin/index/$1',
    'faSWdsqwetacas/view' => 'admin/index', // actionIndex => AdminController
    'faSWdsqwetacas' => 'admin/login', // actionLogin => AdminController

    //ПОИСК
    'catalog/search/page-([0-9]+)' => 'catalog/search/$1',
    'catalog/search/page-([0-9]+[0-9]+)' => 'catalog/search/$1',
    'catalog/search' => 'catalog/search',// actionSearch => CatalogController
    'catalog/made' => 'catalog/made',
    'catalog/made/page-([0-9]+)' => 'catalog/made/$1',

    //ПРОСМОТР ВСЕХ ТОВАРОВ
    'catalog/page-([0-9]+)' => 'catalog/index/$1',
    'catalog/page-([0-9]+[0-9])' => 'catalog/index/$1',

    //КАТЕГОРИИ
    'catalog/category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'catalog/category/([0-9]+)/page-([0-9]+[0-9]+)' => 'catalog/category/$1/$2',
    'catalog/category/([0-9]+)' => 'catalog/category/$1', //  actionCategory => CatalogController   
    'catalog' => 'catalog/index', //  actionIndex => CatalogController

    //ПРОСМОТР ТОВАРА
    'product/([0-9]+)' => 'product/view/$1',  // actionView => ProductController
    'product/([0-9]+[0-9]+)' => 'product/view/$1',


    'services' => 'site/Services',
    'price' => 'site/Price',
    'contact' => 'site/Contact',
    'project' => 'site/Project',
    'about' => 'site/About',


    //КАТАЛОГ ПРОДУКЦИИ
    'products' => 'site/Products',

    //ГЛАВНА СТРАНИЦА 
    '' => 'site/main', // actionIndex in SiteController

);
