<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-m leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="py-3 py-md-5 bg-m">
            <div class="container">
                <div class="row flex flex-wrap">

                    @forelse ($products as $productItem)

                    <div class="md:w-1/3 w-full lg:w-1/4 xl:w-1/4 my-4 mx-10">
                        <div class="product-card bg-s border border-s rounded-md mb-2 relative">
                            <div class="product-card-img max-h-65 overflow-hidden border-b border-gray-300">

                                @if ($productItem->quantity > 0)
                                    <span class="stock absolute text-m bg-s rounded-md px-2 py-3 m-2 text-xs font-medium">In Stock</span>
                                @else
                                    <span class="stock absolute text-m bg-s rounded-md px-2 py-1 m-2 text-xs font-medium">Out of Stock</span>
                                @endif
                                
                                <a href="{{url('/shop/'.$productItem->category->slug.'/'.$productItem->slug)}}" class="text-m no-underline ">
                                    <img src="{{asset($productItem->image)}}" alt="{{$productItem->name}}" class="w-full rounded-md max-h-64"> 
                                </a>                              
                                
                            </div>
                            <div class="product-card-body py-4 px-4 bg-s">
                                <p class="product-brand text-sm font-normal text-m truncate">{{$productItem->brand}}</p>
                                <h5 class="product-name text-lg font-semibold text-m truncate">
                                   <a href="{{url('/shop/'.$productItem->category->slug.'/'.$productItem->slug)}}" class="text-m no-underline">
                                        {{$productItem->name}} 
                                   </a>
                                </h5>
                                <div>
                                    <span class="selling-price text-2xl font-semibold text-m mt-1 mr-2">{{$productItem->selling_price}}</span>
                                    <span class="original-price text-lg font-normal text-m line-through">{{$productItem->original_price}}</span>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    @empty
                    <div class="md:w-full text-s m-2">
                        <h5>No Products available for {{$category->name}}</h5>
                    </div>
                    @endforelse
                    

                </div>
            </div>
        </div>
    </x-slot>

    </div>
</x-app-layout>