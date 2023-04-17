<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
</head>
<body>
<div class="md:flex">

    @auth
        <x-sidebar/>
    @endauth


    <!-- content -->
    <div class="flex-1 flex-col flex">
        @auth
            <x-top-navbar/>

            <x-main-content :title="$title"/>
        @endauth

        @guest
            <x-guest-content/>
        @endguest

        @auth
            <div>
                {{ $slot }}
            </div>
            <footer class="border-t p-4 pb-3 text-xs bg-gray-200 mt-auto">
                {{__('2022 © Design & Develop by Farnous.')}}
            </footer>
        @endauth
    </div>

</div>
</body>
</html>

