<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CheckoutController extends Controller
{
    public function index(){  
        return view('frontend.Checkout.checkout');
    }
}
