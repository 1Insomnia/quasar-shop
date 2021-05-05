<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <title>Quasar Optic - @yield('title')</title>
    @stack('extra-javascript')
</head>

<body>
@include('layouts.header')

<main>
    @yield('content')
</main>

@include('layouts.footer')
@stack('javascript')
</body>

</html>
