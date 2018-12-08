<!doctype html>
<html>
    @include('includes.head')
<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        @yield('content')
        @include('includes.footer')
    </div>
</body>
</html>
