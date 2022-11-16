<!DOCTYPE html>
<html>

<head>
    <title>@yield('title') | Monitoring LPG</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('includes.style')

</head>

<body>
    <div class="app app-default">

        @include('includes.sidebar')

        <div class="app-container">

            @include('includes.navbar')

            @yield('content')

            @include('includes.footer')

        </div>

    </div>

    @stack('client-script')

    @include('includes.script')


</body>

</html>