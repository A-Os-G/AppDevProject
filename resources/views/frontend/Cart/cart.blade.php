<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-m leading-tight">
            {{ __('Cart') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div>
            <livewire:frontend.cart.cart-show/>
        </div>
        
    </x-slot>

    </div>
</x-app-layout>
