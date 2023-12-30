<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
    <div class="sm:flex">

<!--left-->
<div class="flex flex-col w-7/12 bg-s h-screen items-center sm:justify-center">
        <!--logo-->
        <div class="overflow-hidden flex sm:justify-center drop-shadow-xl">
            <img src="pics/logo.jpg" alt="b" class=" w-8/12 max-w-min mb-8 p-1" style="border-top-left-radius: 35%; border-top-right-radius: 35%">
        </div>

        <!--bottom pic-->
        <div class="overflow-hidden flex sm:justify-center drop-shadow-xl">
            <img src="pics/background.jpg" alt="second img" class="w-3/5 max-w-min" style="border-top-left-radius: 35%; border-top-right-radius: 35%">
        </div>

    </div>

            <!--Right-->
            <div class="flex flex-col w-5/12 bg-m space-y-3 items-center justify-center h-screen">

                <hr class="w-80 border-s border-2">

                <div class="flex items-center justify-center hover:text-m hover:bg-s bg-m text-s text-xl font-extrabold rounded-md">
                    <a href="{{ url('/shop') }}"class="w-full" wire:navigate>
                <button class="w-64 py-2 rounded">
                            {{__('Shop')}}
                        </button>
                    </a>
                </div>

                <hr class="w-80 border-s border-2">

                <div class="flex items-center justify-center hover:text-m hover:bg-s bg-m text-s text-xl font-extrabold rounded-md">
                    <a href="{{ url('/cart') }}" class="w-full" wire:navigate>
                <button class="w-64 py-2 rounded">
                            {{__('Cart')}}
                        </button>
                    </a>
                </div>

                <hr class="w-80 border-s border-2">

                <div class="flex items-center justify-center hover:text-m hover:bg-s bg-m text-s text-xl font-extrabold rounded-md">
                    <a href="{{ url('/orders') }}" class="w-full" wire:navigate>
                <button class="w-64 py-2 rounded">
                            {{__('Orders')}}
                        </button>
                    </a>
                </div>

                <hr class="w-80 border-s border-2">

                <div class="flex items-center justify-center hover:text-m hover:bg-s bg-m text-s text-xl font-extrabold rounded-md">
                    <a href="{{ url('/profile') }}" class="w-full" wire:navigate>
                    <button class="w-64 py-2 rounded">
                            {{__('Profile')}}
                        </button>
                    </a>
                </div>

                <hr class="w-80 border-s border-2">

                <div class=" hover:text-m hover:bg-s bg-m text-s text-xl font-extrabold rounded-md">
               
                    @if (Auth::check())
                        <!-- Logout button -->
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                    <button class="w-64 py-2 flex items-center justify-center" type="submit">Logout</button>
                    </form>
                    @endif
                </div>

                <hr class="w-80 border-s border-2">

            </div>
        </div>
    </body>
</html>