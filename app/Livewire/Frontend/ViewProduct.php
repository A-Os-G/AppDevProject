<?php

namespace App\Livewire\Frontend;

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
    

    public function render()
    {
        return view('livewire.frontend.view-product', [
            'category' => $this->category,
            'product' => $this->product,
        ]);
    }
}
