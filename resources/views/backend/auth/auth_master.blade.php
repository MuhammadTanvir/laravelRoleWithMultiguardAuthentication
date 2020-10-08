<!doctype html>
<html class="no-js" lang="en">

<head>
    @include('backend.layouts.partials.head')
    @yield('styles')
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    @yield('auth-content')
    
    <!-- login area end -->

    <!-- jquery latest version -->
     @include('backend.layouts.partials.offset')
    @include('backend.layouts.partials.footer')
    @yield('scripts')
</body>

</html>