<?php

class ProductController{

    public static function index(){
        $products = R::findAll('products');
        Flight::render('home.php',['products' => $products]);
    }

    public static function show($id){
        $product = R::findOne('products','id = ?',[(int)$id]);
        Flight::render('single.php',['product' => $product]);
    }
}