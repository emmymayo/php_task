<?php
require 'flight/Flight.php';

/* Database Configuration --- RedbeanPHP  */
require 'config.php';

require 'controllers/ProductController.php';

$productController = new ProductController();

Flight::route('/', array($productController,'index'));
Flight::route('/product/@id', array($productController,'show'));
Flight::route('/product/@id/checkout', array($productController,'checkout'));
Flight::route('/product/@id/checkout/success', array($productController,'success'));
Flight::route('/product/@id/checkout/cancel', array($productController,'cancel'));
Flight::route('/factory', function(){
    $product = R::dispense('products');
    $product->title = 'Product two';
    $product->description = 'Description 2';
    $product->image = 'https://via.placeholder.com/300';
    $product->price = 25.99;
    $id = R::store($product);
});

Flight::start();



// Close Database Coonnection --- RedbeanPHP
R::close();