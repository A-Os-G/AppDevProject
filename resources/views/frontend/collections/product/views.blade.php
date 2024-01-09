<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-m leading-tight text-center">
            {{ __('Product Details') }}
        </h2>
    </x-slot>


    <x-slot name="slot">
        <div>
            <livewire:frontend.view-product :category="$category" :product="$product"/>
        </div>
    </x-slot>
</x-app-layout>