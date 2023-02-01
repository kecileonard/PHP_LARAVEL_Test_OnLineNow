<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Styles -->
    <!-- CSS Files -->
    <link href="{{ asset('admin/css/material-dashboard.css') }}"  rel="stylesheet">
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">


</head>
<body>


    <div class="wrapper">
        @include('layouts.inc.admin-navbar')

        <div class="main-panel">

            <div id="layoutSidenav">
              @include('layouts.inc.admin-sidebar')

              <div id="layoutSidenav_content">
                <main>
                      @include('flash-message')
                      @yield('content')

                </main>
                @include('layouts.inc.admin-footer')
              </div>

            </div>
        </div>
    </div>


    <!--   Core JS Files   -->
    <script src="{{ asset('admin/js/jquery.min.js') }}" ></script>
    <script src="{{ asset('admin/js/popper.min.js') }}" ></script>
    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}" ></script>
    <script src="{{ asset('admin/js/scripts.js') }}" ></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script  src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script  src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('admin/js/custom.js')}}" ></script>


    @if(session('status'))
        <script>

            Swal.fire({
                    icon: 'success',
                    title: '{{session('status')}}',
                    showConfirmButton: false,
                    timer: 1500
            })
        </script>
    @endif

    @yield('scripts')

</body>
</html>
