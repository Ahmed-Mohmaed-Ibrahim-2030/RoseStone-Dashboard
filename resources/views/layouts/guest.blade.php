<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Rose Stone</title>
        <link rel="shortcut" href="{{asset('assets/images/logo/logo.png')}}" type="image/x-icon" />
        <!-- webB -->
        {{--    <link rel="shortcut" href="imges/logo/logo.png" type="image/x-icon" />--}}
        <!-- links bar icon  -->
        <link rel="apple-touch-icon" href="{{asset('assets/images/logo/logo.png')}}" />
        <link rel="icon" href="{{asset('assets/images/logo/logo.png')}}" />
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body >

        <div class="font-sans text-gray-900 antialiased bg-dark">
            {{ $slot }}
        </div>

    </body>
</html>
