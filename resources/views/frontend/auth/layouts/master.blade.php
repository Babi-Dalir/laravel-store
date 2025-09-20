<!DOCTYPE html>
<html lang="fa">

@include('frontend.layouts.head')

<body>
<div class="wrapper">
    <!-- End header -->
    <!-- Start main-content -->
    @yield('content')
    <!-- End main-content -->

    <!-- End footer -->
</div>
<!-- Core JS Files -->
@include('frontend.layouts.js_frontend')
</body>
</html>
