<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Garotas Pops')</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
    @stack('styles')
</head>
<body>
    @include('partials.menu')
    <main>
        @yield('content')
        @stack('scripts')
    </main>
</body>
</html>
