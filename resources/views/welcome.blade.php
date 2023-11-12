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

    </body>
</html>