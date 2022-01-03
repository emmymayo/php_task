<?php

use Stripe\StripeClient;

class ProductController{

    public function index(){
        $products = R::findAll('products');
        Flight::render('home.php',['products' => $products]);
    }

    public function show($id){
        
        $product = R::findOne('products','id = ?',[(int)$id]);
        
       
        Flight::render('single.php',[
            'product' => $product
            ]);
    }

    public function success($id){
        $product = R::findOne('products','id = ?',[(int)$id]);
        $order = R::dispense('orders');
        $order->product_id = $product->id;
        $order->total = $product->price;
        $order->status = 'paid';
        R::store($order);
        
        
        Flight::render('stripe/success.php',[
            'product' => $product
        ]);
    }
    public function cancel($id){
        $product = R::findOne('products','id = ?',[(int)$id]);
        $order = R::dispense('orders');
        $order->product_id = $product->id;
        $order->total = $product->price;
        $order->status = 'failed';
        R::store($order);
        Flight::render('stripe/cancel.php');
    }

    public function checkout($id){
        $product = R::findOne('products','id = ?',[(int)$id]);
        $quantity = 1;
        $total = (int)$product->price*100*$quantity;
        $stripe = new StripeClient(STRIPE_API_KEY);
        $session = $stripe->checkout->sessions->create([
            'success_url' => BASEURL.'product/'.$product->id.'/checkout/success',
            'cancel_url' => BASEURL.'product/'.$product->id.'/checkout/cancel',
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $product->title,
                            'description' => $product->description
                        ],
                        'unit_amount' => (int)$product->price*100
                    ],
                    'quantity' => $quantity
                ]
            ]

        ]);
       
       echo json_encode($session);
    }
    
}