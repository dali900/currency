<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/main.js') }}"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/defaults.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" style="height: 100vh;">
        <dashboard></dashboard>
        {{-- <router-view :key="$route.fullPath"></router-view> --}}
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script type="text/javascript" defer>
        @if (isset($logged_in))
            window.APP.logged_in = <?=$logged_in?>;
        @endif
        @if(isset($token))
            window.APP.token = '<?=$token?>';
        @endif
        /* window.APP.logged_in = 0;
        window.APP.token = ""; */
        window.APP.base_url = "{{url('/cv')}}/";
    </script>
</body>
</html>
