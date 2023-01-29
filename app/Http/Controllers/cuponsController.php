<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cuponsController extends Controller
{
    public function index(){
        return view('front_page.myAccount.kupon');
    }
}
