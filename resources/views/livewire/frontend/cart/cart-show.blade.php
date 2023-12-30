<div class="py-3 md:py-5 bg-m">
    <div class="container">    
        <div class="flex flex-wrap">
            <div class="w-full">
                <div class="shopping-cart">

                    <div class="cart-header p-2.5 hidden md:hidden lg:block text-s">
                        <div class="flex flex-wrap">
                            <div class="w-1/2">
                                <h4 class="text-lg font-bold mb-0">Products</h4>
                            </div>
                            <div class="w-1/12">
                                <h4 class="text-lg font-bold mb-0">Price</h4>
                            </div>
                            <div class="w-1/6">
                                <h4 class="text-lg font-bold mb-0">Quantity</h4>
                            </div>
                            <div class="w-1/12">
                                <h4 class="text-lg font-bold mb-0">Total</h4>
                            </div>
                            <div class="w-1/6">
                                <h4 class="text-lg font-bold mb-0">Remove</h4>
                            </div>
                        </div>
                    </div>

                    @forelse ($cart as $cartItem)
                        @if ($cartItem->product)
                        <div class="cart-item bg-s text-m shadow-md p-3 mt-3 mx-2 rounded font-semibold">
                            <div class="flex flex-wrap">
                                <div class="md:w-1/2 my-auto">
                                    <a href="{{url('/shop/'.$cartItem->product->category->slug.'/'.$cartItem->product->slug)}}">
                                        <label class="product-name flex items-center ">

                                            @if ($cartItem->product->image)
                                                <img src="{{asset($cartItem->product->image)}}" style="width: 80px; height: 80px" alt="">
                                            @endif
                                            <p class="px-4">{{$cartItem->product->name}}</p>
                                        </label>
                                    </a>
                                </div>
                                <div class="md:w-1/12 my-auto ">
                                    <label class="price">Rm {{$cartItem->product->selling_price}} </label>
                                </div>
                                <div class="md:w-1/6 w-6/12 my-auto">
                                    <div class="quantity">
                                        <div class="input-group">
                                            <button type="button" wire:loading.attr="disabled" wire:click="decrementQuantity({{$cartItem->id}})" class="btn1 border border-solid border-m mr-3 rounded-none text-xs px-3 py-2 hover:bg-m hover:text-s"><i class="fa fa-minus"></i></button>
                                            <input type="text" value="{{$cartItem->quantity}}" class="border text-m border-m border-solid mr-3 text-center text-sm w-1/5" />
                                            <button type="button" wire:loading.attr="disabled" wire:click="incrementQuantity({{$cartItem->id}})" class="btn1 border border-solid border-m mr-3 rounded-none text-xs px-3 py-2 hover:bg-m hover:text-s"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="md:w-1/12 my-auto ">
                                    <label class="total">Rm {{$cartItem->product->selling_price * $cartItem->quantity}} </label>
                                    @php $totalPrice += $cartItem->product->selling_price * $cartItem->quantity @endphp
                                </div>
                                <div class="md:w-1/6 w-6/12 my-auto">
                                    <div class="remove">
                                        <button type="button" wire:loading.attr="disabled" wire:click="removeCartItem({{$cartItem->id}})" class=" border hover:bg-red-500 text-s bg-m text-sm px-3 py-2 rounded-md">
                                            <span wire:loading.remove wire:target="removeCartItem({{$cartItem->id}})">
                                                <i class="fa fa-trash"></i> Remove
                                            </span>

                                            <span wire:loading wire:target="removeCartItem({{$cartItem->id}})">
                                                <i class="fa fa-trash"></i> Removing
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        @endif
                        
                        
                    @empty
                        <div class="text-2xl m-4 text-s">No Cart Items Available</div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="flex flex-wrap justify-end">
            <div class="w-4/12">
                <div class="shadow-sm text-s p-3 float-right">
                    <h4 class="font-semibold">Total: 
                        <span>Rm {{$totalPrice}}</span>
                    </h4>
                    <a href="{{url('/checkout')}}" class="w-100 bg-s hover:bg-blue-700 hover:text-s text-m font-bold py-2 px-4 rounded inline-block mr-8">Checkout</a>
                </div>
            </div>
        </div>
        
    </div>
</div>



