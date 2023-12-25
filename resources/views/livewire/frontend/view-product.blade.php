<div>
    <div class="py-3 md:py-5">
        <div class="container">
            <div class="row flex flex-wrap">
                <div class="md:w-5/12 mt-3">
                    <div class="bg-white border">
                        @if ($product->productImages)
                        <img src="{{asset($product->image)}}" class="w-100" alt="Img">
                        @else
                            No Image Added
                        @endif
                        
                    </div>
                </div>
                <div class="md:w-7/12 mt-3">
                    <div class="product-view">
                        @if ($product->quantity)
                        <label class="label-stock text-xs py-1 px-5 rounded bg-m text-s float-right">In Stock</label>
                        @else
                        <label class="label-stock text-xs py-1 px-5 rounded bg-red-600 text-m float-right">Out of Stock</label>  
                        @endif
                        
                        <h4 class="product-name text-2xl text-m">
                            {{$product->name}}  
                        </h4>
                        
                        <hr>
                        <p class="mt-2 product-path text-xs font-semibold text-gray-700 mb-4">
                            Home / {{$product->category->name}} / {{$product->name}}
                        </p>
                        <div>
                            <span class="selling-price text-3xl font-semibold text-black mr-2">{{$product->selling_price}}</span>
                            <span class="original-price text-base text-gray-600 font-normal line-through">{{$product->original_price}}</span>
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn1 border border-m py-2 px-4 rounded text-sm mt-4 hover:bg-m hover:text-s" wire:click="decrementQuantity"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount" value="{{$this->quantityCount}}" readonly class="input-quantity border border-m text-l py-2 px-4 rounded mt-4 w-14 outline-none text-center" />
                                <span class="btn1 border border-m py-2 px-4 rounded text-sm mt-4 hover:bg-m hover:text-s" wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="" class="btn1 border border-m py-2 px-4 rounded text-sm mt-4 hover:bg-m hover:text-white"> <i class="fa fa-shopping-cart"></i> Add To Cart</a>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-1 border-b-2 border-m">Small Description</h5>
                                <p>
                                    {!!$product->small_description!!}
                                </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="md:w-full mt-3">
                    <div class="card">
                        <div class="card-header border-b-2 bg-m text-s">
                            <h4 class="text-2xl">Description</h4>
                        </div>
                        <div class="card-body bg-m text-s">
                            <p>
                                {!!$product->description!!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

