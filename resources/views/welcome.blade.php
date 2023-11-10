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
            <div class="w-8/12 p-4 bg-s">
                <div class="overflow-hidden h-1/2 p-4 m-2 flex items-center sm:justify-center ">
                    <img src="pics/logo.jpg" alt="b" class="w-1/2 h-3/4 p-4" style="border-top-left-radius: 25%; border-top-right-radius: 25%">
                </div>

                <div class="overflow-hidden h-1/2 p-4 mb-4 flex items-start sm:justify-center">
                    <img src="pics/background.jpg" alt="second img" class="w-1/2 h-auto rounded-t-3xl">
                </div>
                
            </div>

            <div class="w-4/12 p-4 bg-m items-center justify-center">
                
                <div class="flex items-center justify-center mb-4 rounded-full hover:text-s hover:bg-m bg-s text-m font-semibold border-2 border-m">
                    <button class="w-80">
                        {{ __('Login') }}
                    </button>
                </div>

                <div class="flex items-center justify-center mb-4 rounded-full hover:text-s hover:bg-m bg-s text-m font-semibold border-2 border-m">
                    <button class="w-80">
                        {{ __('Register') }}
                    </button>
                </div>

                <div class="flex items-center justify-center mb-4 rounded-full hover:text-s hover:bg-m bg-s text-m font-semibold border-2 border-m">
                    <button class="w-80">
                        {{ __('Shop') }}
                    </button>
                </div>

                <div class="flex items-center justify-center mb-4 rounded-full hover:text-s hover:bg-m bg-s text-m font-semibold border-2 border-m">
                    <button class="w-80">
                        {{ __('Cart') }}
                    </button>
                </div>

            </div>
        </div>
    </body>
</html>