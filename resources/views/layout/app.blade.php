<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- 個別のCSS読み込み --}}
    <link rel="stylesheet" href="{{ asset('css/inventory.css') }}">
</head>
<body>

    <div id="app">
        <main class="main py-4">
            {{-- コンテンツ部分読み込み --}}
            @yield('content')
        </main>
    </div>

    {{-- フッター読み込み --}}
    {{--
    @component('component.footer')
    @endcomponent
    --}}
    {{-- 個別のjavaScript読み込み --}}
    {{-- @yield('javascript-footer') --}}
    
    {{-- 個別のjavaScript読み込み --}}
    <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>