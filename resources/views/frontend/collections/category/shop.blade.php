<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-m leading-tight">
            {{ __('Shop') }}
        </h2>
    </x-slot>

    <x-slot name="main">
        <div class="py-3 py-md-5 bg-light">
            <div class="container">
                <div class="row flex flex-wrap">
                    

                    @forelse ($categories as $categoryItem)
    
                        <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 mb-4 mx-10 text-m">
                            <div class="category-card mb-6 px-4 py-2 border-b bg-m">
                                <a href="{{url('/shop/'.$categoryItem->slug)}}">
                                    <div class="category-card-img max-h-64 max-w-20 overflow-hidden border-b">
                                        <img src="{{asset('$categoryItem->image')}}" class="w-50" alt="Laptop">
                                    </div>
                                    <div class="category-card-body px-4 py-2 text-s">
                                        <h5>{{$categoryItem->name}}</h5>
                                    </div>
                                </a>
                            </div>
                        </div>

                    @empty
                        <div class="md:w-full">
                            <h5>No Categories</h5>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </x-slot>

    </div>
</x-app-layout>
