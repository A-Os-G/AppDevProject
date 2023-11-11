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
            <div class="flex flex-col w-7/12 p-4 bg-s h-screen items-center sm:justify-center">

                <!--logo-->
                <div class="overflow-hidden h-4/12 p-8 flex sm:justify-center">
                    <img src="pics/logo.jpg" alt="b" class="m-9 h-48 w-72 max-w-min" style="border-top-left-radius: 35%; border-top-right-radius: 35%">
                </div>

                <!--bottom pic-->
                <div class="overflow-hidden h-8/12 pb-5 flex sm:justify-center">
                    <img src="pics/background.jpg" alt="second img" class="w-2/3" style="border-top-left-radius: 35%; border-top-right-radius: 35%">
                </div>
                
            </div>

            <!--Right-->
            <div class="flex flex-col w-5/12 bg-m space-y-3 items-center justify-center h-screen">

                <hr class="w-80 border-s my-4 border-opacity-25 border-2">

                <div class="flex items-center justify-center p-4 w-100 hover:text-m hover:bg-s bg-m text-s text-xl font-extrabold">
                    <button class="w-80">
                        <a href="{{ route('login') }}" class="w-full" wire:navigate>
                            {{__('Log in')}}
                        </a>
                    </button>
                </div>

                <hr class="w-80 border-s my-4 border-opacity-25 border-2">

                <div class="flex items-center justify-center p-4 w-100 hover:text-m hover:bg-s bg-m text-s text-xl font-extrabold">
                    <button class="w-80">
                        <a href="{{ route('register') }}" class="" wire:navigate>
                            {{__('Register')}}
                        </a>
                    </button>
                </div>

                <hr class="w-80 border-s my-4 border-opacity-25 border-2">

                <div class="flex items-center justify-center p-4 w-100 hover:text-m hover:bg-s bg-m text-s text-xl font-extrabold">
                    <button class="w-80">
                        <a href="{{ route('login') }}" class="w-full" wire:navigate>
                            {{__('Shop')}}
                        </a>
                    </button>
                </div>

                <hr class="w-80 border-s my-4 border-opacity-25 border-2">

                <div class="flex items-center justify-center p-4 w-100 hover:text-m hover:bg-s bg-m text-s text-xl font-extrabold">
                    <button class="w-80">
                        <a href="{{ route('login') }}" class="w-full" wire:navigate>
                            {{__('Cart')}}
                        </a>
                    </button>
                </div>

                <hr class="w-80 border-s my-4 border-opacity-25 border-2">

            </div>
        </div>
    </body>
</html>