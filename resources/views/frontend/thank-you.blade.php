<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-m leading-tight">
            {{ __('Thank You') }}
        </h2>
    </x-slot>

    <x-slot name="slot">

        <div class="py-3 pyt-md-4">
                <div class="row">
                    <div class="col-md-12 text-center">
                        @if (session('massage'))
                        <div class="bg-s-500 text-s font-bold p-4 mb-4 rounded">
                            {{ session('massage') }}
                        </div>
                        @endif
                        <div class="message-container text-center mt-4">
                            <div class="text-3xl text-s font-bold mb-8">Click here for more shopping</div>
                                <a href="{{ url('/shop') }}" class="text-blue-500 font-bold hover:underline">Go to Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </x-slot>

    </div>
</x-app-layout>
