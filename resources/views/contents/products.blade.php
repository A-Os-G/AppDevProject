<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-m leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <x-slot name="main">
        <div class="py-3 py-md-5 bg-light">
            <div class="container">
                <div class="row flex flex-wrap">

                    @forelse ($products as $productItem)

                    <div class="md:w-1/4 w-full lg:w-1/3 xl:w-1/4 mb-4 mx-10">
                        <div class="product-card bg-m border border-gray-300 mb-24 relative">
                            <div class="product-card-img max-h-65 overflow-hidden border-b border-gray-300">

                                @if ($productItem->quantity > 0)
                                    <span class="stock absolute text-m bg-s rounded-md px-2 py-1 m-2 text-xs font-medium">In Stock</span>
                                @else
                                    <span class="stock absolute text-m bg-s rounded-md px-2 py-1 m-2 text-xs font-medium">Out of Stock</span>
                                @endif
                                
                                @if ($productItem->productImages->count() > 0)
                                <a href="{{url('/shop/'.$productItem->category->slug.'/'.$productItem->slug)}}" class="text-s no-underline">
                                    <img src="{{asset($productItem->productImages[0]->image)}}" alt="{{$productItem->name}}" class="w-full"> 
                                </a>                              
                                @endif
                                
                            </div>
                            <div class="product-card-body py-4 px-4">
                                <p class="product-brand text-sm font-normal text-s truncate">{{$productItem->brand}}</p>
                                <h5 class="product-name text-lg font-semibold text-s truncate">
                                   <a href="{{url('/shop/'.$productItem->category->slug.'/'.$productItem->slug)}}" class="text-s no-underline">
                                        {{$productItem->name}} 
                                   </a>
                                </h5>
                                <div>
                                    <span class="selling-price text-2xl font-semibold text-s mt-1 mr-2">{{$productItem->selling_price}}</span>
                                    <span class="original-price text-lg font-normal text-s line-through">{{$productItem->original_price}}</span>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    @empty
                    <div class="md:w-full">
                        <h5>No Products available for {{$category->name}}</h5>
                    </div>
                    @endforelse
                    

                </div>
            </div>
        </div>
    </x-slot>

    </div>
</x-app-layout>