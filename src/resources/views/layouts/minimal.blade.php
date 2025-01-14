{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>@yield('title', 'Медицинская система')</title>--}}
{{--    <link rel="stylesheet" href="{{ asset('css/appV2.css') }}">--}}
{{--</head>--}}
{{--<body>--}}
{{--<main class="minimal-content">--}}
{{--    @yield('content')--}}
{{--</main>--}}

{{--<footer>--}}
{{--    <p>© 2025 Медицинская система. Все права защищены.</p>--}}
{{--</footer>--}}
{{--</body>--}}
{{--</html>--}}


    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Medical System')</title>
    <link rel="stylesheet" href="{{ asset('css/appV2.css') }}">
</head>
<body>
<main class="minimal-content">
    @yield('content')
</main>

<footer>
    <p>© 2025 Medical System. All rights reserved.</p>
</footer>
</body>
</html>
