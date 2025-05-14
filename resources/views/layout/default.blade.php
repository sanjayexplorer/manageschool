<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon-16x16.png') }}" type="image/x-icon">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/air-datepicker@3.5.3/air-datepicker.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/css/intlTelInput.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <style>
       .notificationbar.active{ right: 0px; } 
       .sidebar.active{ left: 0px; }
    </style>
    @stack('styles') <!-- Allow additional styles from child views -->
</head>
<body>
    <div class="portal-container bg-[#f4f4f4] relative">
    <!-- Sidebar (Sticky Left) -->
    <div class="sidebar w-[80%] lg:w-[15%] left-[-100%] lg:left-0 fixed lg:float-left transition-all duration-300 ease-in-out z-20 bg-white">
        @include('components.portal.sidebar')
    </div>

    <!-- Main Content Wrapper -->
    <div class="main-content w-full lg:w-[85%] lg:float-right relative">

    <!-- Header (Sticky Top) -->
    <div class="header sticky top-0 z-[16]">
        @include('components.portal.header')
    </div>

    <!-- Notification Bar (Right Side) -->
    <div class="notificationbar z-40 w-[300px] fixed right-[-300px] top-0 transition-all duration-300 ease-in-out">
        @include('components.portal.notificationbar')
    </div>

    <!-- Content Area -->
    <div class="content w-full">
        <!-- Main Dashboard Content -->
        <div class="dashboard-content">
            @yield('content')
        </div>
    </div>
    </div>
    </div>
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/js/intlTelInput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/air-datepicker@3.5.3/air-datepicker.min.js"></script>
    <script>
        $('#notificationButton').on('click',function(e){
            e.preventDefault();
            $('.notificationbar').addClass('active');
        });
        $('#notificationClose').on('click',function(e){
            e.preventDefault();
            $('.notificationbar').removeClass('active');
        });
        $('#mobileMenuButton').on('click',function(e){
            e.preventDefault();
            $('.sidebar').addClass('active');
        });
        $('#closeMobileMenuButton').on('click',function(e){
            e.preventDefault();
            $('.sidebar').removeClass('active');
        });
    </script>
    @stack('scripts') <!-- Allow additional scripts from child views -->
</body>
</html>
