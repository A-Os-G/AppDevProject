<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-m leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>



    <div class=" text-lg font-semibold text-s ">
        
        <div class="py-3 py-md-5 bg-light ">
            <div class="container">
                <div class="row">
                    
                    @forelse($categories as $c)
                    
                    <div class="row-6 row-md-3 float-left m-5">

                        <div class="category-card rounded-sm mb-24 bg-s shadow text-lg font-semibold text-m ">
                            
                            <a href="{{ url('/shop/'.$c->slug) }}" class="no-underline ">

                                <div class="category-card-img ">
                                    <img src="{{  asset($c->image)  }}" class="w-100 px-10 py-5 max-h-64 overflow-hidden " alt="Laptop">
                                </div>

                                <div class="category-card-body text-center font-semibold text-lg mb-0 border-t-2 border-m">
                                    <h5 class="">{{  $c->name }}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class=" text-s">
                        <h5>No Categories Available</h5>
                    </div>
                    @endforelse


                    
                </div>
            </div>
        </div>

    </div>





</x-app-layout>