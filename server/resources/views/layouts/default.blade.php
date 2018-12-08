<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body class="bg">
    @include('includes.header')
    <main role="main" style="margin-bottom: 2rem;">
        @yield('content')
    </main>
    @include('includes.sidebar')
    @include('includes.footer')
</body>
</html>
