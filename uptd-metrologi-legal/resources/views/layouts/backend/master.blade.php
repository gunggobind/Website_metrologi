<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Penjadwalan Tera Ulang Dan Kalibrasi UPTD Metrologin Legal Kota Denpasar</title>
    <link rel="shortcut icon" href="{{ asset('photo/logo.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('photo/logo.png') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/jqvmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/dropify/dist/css/dropify.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <style>
        .photo{
            background-size: cover;
            border-radius:50%;
            width:50px;
            height:50px;
        }
        .page-item.active .page-link {
            z-index: 3;
            color: black !important;
            background-color: #ffcc01 !important;
            border-color: #ffcc01 !important;
        }
        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
            background-color: #ffcc01 !important ;
            color: black !important;
        }

        [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:focus, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover {
            background-color: #ffcc01 !important ;
            color: black !important;
        }

        .btn-primary {
            color: black !important;
            background-color: #ffcc01 !important;
            border-color: #ffcc01 !important;
        }

        .btn-primary:hover {
            color: black !important;
            background-color: #ffcc01 !important;
            border-color: #ffcc01 !important;
        }

        .btn-primary:focus, .btn-primary.focus {
            box-shadow: none, 0 0 0 0 #ffcc01 !important;
        }

        .btn-primary.disabled, .btn-primary:disabled {
            color: black !important;
            background-color: #ffcc01 !important;
            border-color: #ffcc01 !important;
        }

        .btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active,
        .show > .btn-primary.dropdown-toggle {
            color: black !important;
            background-color: #ffcc01 !important;
            border-color: #ffcc01 !important;
        }

        .btn-primary:not(:disabled):not(.disabled):active:focus, .btn-primary:not(:disabled):not(.disabled).active:focus,
        .show > .btn-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0 #ffcc01 !important;
            background-color: #ffcc01 !important;
        }

        .borderless td, .borderless th {
            border: none;
        }

        .new-shadow{
            transition: box-shadow .3s;
        }

        .new-shadow:hover{
            box-shadow: 0 0 10px rgba(33,33,33,0.6);
        }

        [class*=sidebar-dark] .user-panel {
            border-bottom: none;
        }

        [class*=sidebar-dark] .brand-link {
            border-bottom: none;
        }

        .btn:not(:disabled):not(.disabled) {
            cursor: pointer;
            background-color: #ffcc01 !important;
        }

        .bg-primary:active {
            background-color: #ffcc01 !important;
        }

        .bg-primary {
            background-color: #0193de !important;
        }

        .bg-primary:hover {
            background-color: #0193de !important;
        }

        .custom-control-input:checked~.custom-control-label::before {
            color: black !important;
            border-color: #0193de;
            background-color: #0193de;
            box-shadow: none;
        }

        .icheck-primary>input:first-child:checked+label::before {
            border-radius: 5px;
            background-color: #ffcc01;
            border-color: #ffcc01;
        }

        [class*=icheck-]>input:first-child+label::before {
            content: "";
            display: inline-block;
            position: absolute;
            width: 22px;
            height: 22px;
            border: 1px solid #D3CFC8;
            border-radius: 5px;
            margin-left: -29px;
        }

        .text-white{
            color: white;
        }

        .text-blue{
            color: #ffcc01;
        }

        .bg-white{
            background-color: white;
        }

        .bg-blue{
            background-color: #ffcc01;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #0193de;">
            <a href="{{ route('backend.dashboard') }}" class="brand-link">
                <img src="{{ asset('photo/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light text-white">UPTD Metrologi Legal</span>
            </a>
            @include('layouts.backend.sidebar')
        </aside>

        @yield('content')
        <footer class="main-footer">
            <strong>Copyright &copy; {{ date('Y') }}</strong> All rights reserved</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/sparklines/sparkline.js') }}"></script>
    <script src="{{ asset('backend/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://widgets.coingecko.com/coingecko-coin-price-chart-widget.js"></script>

    <script>
        $(function () {
            $("#example1").DataTable();
        });
    </script>

    @if(session('success'))
        <script>
            swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonColor: '#ffcc01',
            })
        </script>
    @endif

    @if(session('failed'))
        <script>
            swal.fire({
                title: 'Failed!',
                text: "{{ session('failed') }}",
                icon: 'error',
                confirmButtonColor: '#ffcc01',
            })
        </script>
    @endif

    <script src="{{ asset('plugins/dropify/dist/js/dropify.js') }}"></script>
    <script>
        $('.dropify').dropify();
    </script>

    <script src="{{ asset('backend/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    </script>
    @yield('js')
</body>
</html>
