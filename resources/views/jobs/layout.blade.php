<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @if(View::hasSection('title'))
            @yield('title')
        @else
            {{ config('app.name', 'Laravel') }}
        @endif
    </title>


    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="page">
        @yield('page')
    </div>
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
