<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý Capple - Website bán đồ ăn trực tuyến</title>
    <script src="{{ asset('assets/admin/js/main.js') }}"></script>
    <script src="{{ asset('assets/admin/js/validateExpired.js') }}"></script>
    <script src="{{ asset('assets/admin/js/deleteConfirmation.js') }}"></script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/paginate.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    @if (session('success'))
        <script>
            Swal.fire({
                position: "top-center",
                icon: "success",
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 4000
            });
        </script>
    @elseif (session('warning'))
        <script>
            Swal.fire({
                position: "top-center",
                icon: "warning",
                title: "{{ session('warning') }}",
                showConfirmButton: false,
                timer: 4000
            });
        </script>
    @elseif (session('error'))
        <script>
            Swal.fire({
                position: "top-center",
                icon: "error",
                title: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 4000
            });
        </script>
    @endif
    @include('layout.adminheader')
    @yield('content')
    @include('layout.adminfooter')
</body>

</html>
