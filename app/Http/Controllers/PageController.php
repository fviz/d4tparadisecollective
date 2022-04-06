<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function homepage() {
        return view('index');
    }

    public function buy_tickets() {
        return view('buy_tickets');
    }
}
