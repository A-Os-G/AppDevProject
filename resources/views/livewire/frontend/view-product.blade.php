<div>
    <div class="py-3 md:py-5">
        <div class="container">
            <div class="row flex flex-wrap">
                <div class="md:w-5/12 mt-3 p-4">
                    <div class="bg-s border ">
                        @if ($product->image)
                        <img src="{{asset($product->image)}}" class="w-100" alt="Img">
                        @else
                            No Image Added
                        @endif
                        
                    </div>
                </div>
                <div class="md:w-7/12 p-4">
                    <div class="product-view">
                        @if ($product->quantity)
                        <label class="label-stock text-xs py-1 px-5 rounded bg-s text-m float-right">In Stock</label>
                        @else
                        <label class="label-stock text-xs py-1 px-5 rounded bg-red-600 text-m float-right">Out of Stock</label>  
                        @endif
                        
                        <h4 class="product-name text-2xl text-s">
                            {{$product->name}}  
                        </h4>
                        
                        <hr>
                        <p class="mt-2 product-path text-xs text-s italic font-thin mb-4">
                            Home / {{$product->category->name}} / {{$product->name}}
                        </p>
                        <div>
                            <span class="selling-price text-3xl font-semibold text-s mr-2">{{$product->selling_price}}</span>
                            <span class="original-price text-base text-s italic font-normal line-through">{{$product->original_price}}</span>
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn1 border border-s py-2 px-4 m-1 rounded text-sm mt-4 hover:bg-s hover:text-m" wire:click="decrementQuantity"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount" value="{{$this->quantityCount}}" readonly class="input-quantity border bg-s text-m text-bold text-l py-2 px-4 rounded mt-4 w-14 outline-none text-center" />
                                <span class="btn1 border border-s py-2 px-4 m-1 rounded text-sm mt-4 hover:bg-s hover:text-m" wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="button" wire:click="addToCart({{$product->id}})" class="btn1 border border-s py-2 px-4 rounded text-sm mt-4 hover:text-s text-m hover:bg-m bg-s">
                                <i class="fa fa-shopping-cart"> Add To Cart</i>
                            </button>
                        </div>
                        <div class="mt-3">
                            <div class="mb-2 text-m ">
                                <h5 class="text-s">Small Description:</h5>
                                <p class="rounded text-s ml-4">
                                    {{$product->small_description}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="md:w-full mt-3 p-4">
                    <div class="card">
                        <div class="card-header bg-m text-s">
                            <h4 class="text-2xl">Description:</h4>
                        </div>
                        <div class="card-body rounded text-s m-4">
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

