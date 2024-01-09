<?php

namespace App\Livewire\Frontend;

use App\Models\Cart;
use Livewire\Component;


class ViewProduct extends Component
{
    public $category, $product, $quantityCount = 1;
    public function mount($category, $product){
        $this->category = $category;
        $this->product = $product;
    }

    public function decrementQuantity(){
        if($this->quantityCount > 1){
            $this->quantityCount--;
        }
    }
    public function incrementQuantity(){
        $this->quantityCount++;
    }
    
    public function addToCart(int $productId){
        if($this->product->where('id', $productId)->where('status', 0)->exists()){
            if($this->product->quantity > 0){
                if(Cart::where('user_id', auth()->user()->id)
                        ->where('product_id',$productId)
                        ->exists())
                {
                    //this product is already added
                    $this->dispatch('checkCartCount');
                    session()->flash('message','Product Already in the Cart!');
                }
                else{
                    if($this->product->quantity > $this->quantityCount){
                        //insert product to cart
                        Cart::create([
                            'user_id' => auth()->user()->id,
                            'product_id' => $productId,
                            'quantity' => $this->quantityCount
                        ]);
                        $this->dispatch('CartAddedUpdated');
                        session()->flash('message','Product is Added Successfully!');

                    }
                    else{
                        $this->dispatch('message', [
                            'text'=> 'Only ' .$this->product->quantity. ' Quantity Available',
                            'type'=> 'warning',
                            'status' => 404
                        ]);
                        session()->flash('message','only!'. $this->product->quantity.'Quantity is Available ');

                    }
                }
            }
            else{
                $this->dispatch('message', [
                    'text'=> 'out of stock',
                    'type'=> 'warning',
                    'status' => 404
                ]);
                session()->flash('message','out of stock');

            }
        }
        else{
            $this->dispatch('message', [
                'text'=> 'product does not exists',
                'type'=> 'warning',
                'status' => 404
            ]);
        }
    }

    public function render()
    {
        return view('livewire.frontend.view-product', [
            'category' => $this->category,
            'product' => $this->product,
        ]);
    }
}
