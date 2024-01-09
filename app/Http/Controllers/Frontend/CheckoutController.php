<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Stripe;

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
        // Check if the user is authenticated
        if (Auth::check()) {
            // The user is authenticated
            $user = Auth::user();

            // Query the Cart model to get the user's carts
            $carts = Cart::where('user_id', $user->id)->get();

            // Log user and cart information
            Log::info('User: ' . $user->id);
            Log::info('Cart Items: ' . json_encode($carts));

            // Assuming there is a 'product' relationship on the CartItem model
            foreach ($carts as $cartItem) {
                // Debug statement
                Log::info('Product Quantity Before: ' . $cartItem->product->quantity); 

                // Decrement the quantity of each product in the cart
                $cartItem->product->decrement('quantity', $cartItem->quantity);

                // Debug statement
                Log::info('Product Quantity After: ' . $cartItem->product->quantity); 
            }

            // Clear the user's cart after successful payment
            Cart::where('user_id', $user->id)->delete();
        }

        // Redirect to the thank-you page
        return redirect()->to('thank-you');
    }
}



