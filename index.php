<?php
require 'flight/Flight.php';

/* Database Configuration --- RedbeanPHP  */
require 'config.php';

require 'controllers/ProductController.php';

Flight::route('/', array('ProductController','index'));
Flight::route('/product/@id', array('ProductController','show'));
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