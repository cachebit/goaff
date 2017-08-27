<!doctype html>
<html lang="ch_zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>
        @section('title')
Affren  - 实时更新国外 Affiliate Marketing 和 Media Buy 教程。
        @show
    </title>
    <link rel="stylesheet" href="{{ cdn(elixir('assets/css/api.css')) }}">

    <script>
        Config = {
            'cdnDomain': '{{ get_cdn_domain() }}',
            'token': '{{ csrf_token() }}',
            'environment': '{{ app()->environment() }}'
        };
    </script>

    @yield('styles')

</head>
<body>

    @yield('content')

    <script src="{{ cdn(elixir('assets/js/api.js')) }}"></script>

    @yield('scripts')
</body>
</html>
