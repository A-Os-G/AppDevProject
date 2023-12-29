<?php

namespace App\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart, $totalPrice = 0;

    public function incrementQuantity(int $cartId){
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData){
            if($cartData->product->quantity > $cartData->quantity){
                $cartData->increment('quantity');
            }
            //dispatch  browser event not working
            //alerts user that quantity is updated
            //else, error message
        }
    }

    public function decrementQuantity(int $cartId){
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData){
            $cartData->decrement('quantity');
            //dispatch browser event not working
            //alerts user that quantity is updated
            //else, error message
        }
    }

    public function removeCartItem(int $cartId){
        $cartRemoveData = Cart::where('user_id', auth()->user()->id)->where('id', $cartId)->first();
        if($cartRemoveData){
            $cartRemoveData->delete();
            $this->dispatch('CartAddedUpdated');
        }
    }

    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show', [
            'cart' => $this->cart
        ]);
    }
}
