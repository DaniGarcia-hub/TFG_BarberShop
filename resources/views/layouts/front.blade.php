<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbería TFG</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @include('partials.header')

    @yield('content')

    @include('partials.footer')

</body>
</html>