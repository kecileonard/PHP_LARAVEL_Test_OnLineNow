<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>


    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Styles -->
    <!-- CSS Files -->

    <link href="{{ asset('frontend/css/bootstrap5.css') }}"  rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">

    <!-- owl carowsel -->
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}"  rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}"  rel="stylesheet">

    <!-- google awesome -->
    <link rel="preconnect" href="https://fonts.gstatic.com" >
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="undefined" crossorigin="anonymous">

    <style>
     a{
        text-decoration: none !important;
      }
    </style>


</head>
<body>
    @include('layouts.inc.frontnavbar')
    <div class="content">
         @yield('content')
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" ></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}" ></script>
    <script src="{{ asset('frontend/js/custom.js') }}" ></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if(session('status'))
        <script>
            swal("{{session('status')}}");
        </script>
    @endif
    @yield('scripts')

</body>
</html>
