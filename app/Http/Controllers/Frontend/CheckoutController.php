<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class CheckoutController extends Controller
{
    public function index(){  
        return view('frontend.Checkout.checkout');
    }

    public function session(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $productname = $request->get('pay');
        $totalprice = $request->get('total');
        $two0 = "00";
        $total = "$totalprice$two0";

        $session = \Stripe\Checkout\Session::create([
            'line_items'    => [
                [
                    'price_data' => [
                        'currency'     => 'MYR',
                        'product_data' => [
                            "name" => $productname,
                        ],
                        'unit_amount'  => $total,
                    ],
                    'quantity'   => 1,
                ],
                 
            ],
            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('checkout'),
        ]);
 
        return redirect()->away($session->url);
    }
                
    public function success()
    {
        return "Thanks for you order You have just completed your payment. The seller will reach out to you as soon as possible";
    }
}
