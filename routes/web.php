<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $stripe = new \Stripe\StripeClient(env("STRIPE_SK_KEY"));
    $products = $stripe->products->all(['limit' => 3]);

    foreach ($products as $product) {
        $product["found_price"] = $stripe->prices->all(['product' => $product->id])->data[0];
    }

    return view('welcome')->with([
        "products" => $products
    ]);
});
