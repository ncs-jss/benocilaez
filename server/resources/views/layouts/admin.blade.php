<!doctype html>
<html>
    @include('includes.head')
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
	    @include('includes.header')
	    @include('includes.admin_sidebar')
	    <div class="page-wrapper">
	        @yield('content')
	        @include('includes.footer')
	    </div>
	</div>
</body>
</html>