<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\TicketController;
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

Route::get('/webshop', function () {

    $stripe = new \Stripe\StripeClient(env("STRIPE_SK_KEY"));
    $products = $stripe->products->all(['limit' => 3]);

    foreach ($products as $product) {
        $product["found_price"] = $stripe->prices->all(['product' => $product->id])->data[0];
    }

    return view('welcome')->with([
        "products" => $products
    ]);
});

Route::get('/', [PageController::class, 'homepage']);
Route::get('/buy', [PageController::class, 'buy_tickets']);
Route::post('/get_tickets', [TicketController::class, 'get_tickets']);
Route::get('/tickets_success', [TicketController::class, 'tickets_success']);
Route::get('/tickets_cancel', [PageController::class, 'homepage']);
