<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/fontawesome/css/all.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body>

    <div class="md:flex flex-col md:flex-row md:min-h-screen w-full">
        {{-- Navbar && Sidebar --}}
        @include('sidebar')

        {{-- Main Body --}}
        <main class="flex-1">
            @yield('content')
        </main>
    </div>


</body>

</html>
