<?php

namespace App\Livewire\Frontend\Checkout;

use Illuminate\Support\Str;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;

class CheckoutShow extends Component
{
    public $payment_mode = NULL, $payment_id = NULL;
    public $fullname, $email, $phone, $pincode, $address;
    public $carts, $totalProductAmount = 0;

    public function placeOrder(){
        $this->validate();
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'funda-'.Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'in progress',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id
        ]);

        foreach($this->carts as $cartItem){
            $orderItems = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->selling_price
            ]);
            $cartItem->product()->where('id', $cartItem->product_id)->decrement('quantity',$cartItem->quantity);
        }
        return $order;
        
    }
    //public function onlinePay(){
    //    $this->payment_mode = 'Online_pay';
    //    $totalprice = $this->totalProductAmount();
    //    $totalQuantity = 0;
    //    foreach($this->carts as $cartItem){
    //        $totalQuantity += $cartItem->quantity;
    //    }

    //    $this->dispatch('session',[
    //        'totalPrice' => $totalprice,
    //        'totalQuantity' => $totalQuantity
    //    ]);
    //}
    public function codOrder(){
        $this->payment_mode = 'COD';
        $codOrder = $this->placeOrder();
        if($codOrder){
            Cart::where('user_id', auth()->user()->id)->delete();
            session()->flash('massage', 'Order Placed Successfully');
            $this->dispatch('massage',[
                'text' => 'Order Placed Successfully',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect()->to('thank-you');
        }
        //else{"error message"}
    }

    public function rules(){
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|max:11|min:10',
            'pincode' => 'required|string|max:6|min:6',
            'address' => 'required|string|max:500'
        ];
    }
    public function totalProductAmount(){
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        $this->totalProductAmount = 0;
        foreach($this->carts as $cartItem){
            $this->totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity;
        }
        return $this->totalProductAmount;
    }
    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.frontend.checkout.checkout-show', [
            'totalProductAmount' => $this->totalProductAmount
        ]);
    }
}
