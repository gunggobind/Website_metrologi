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
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        .page-item.active .page-link {
            z-index: 3;
            color: black;
            background-color: #ffcc01 !important;
            border-color: #ffcc01 !important;
        }
        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
            background-color: #ffcc01 !important ;
            color: black;
        }

        [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:focus, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover {
            background-color: #ffcc01 !important ;
            color: black;
        }

        .btn-primary {
            color: black;
            background-color: #ffcc01 !important;
            border-color: #ffcc01 !important;
        }

        .btn-primary:hover {
            color: black;
            background-color: #ffcc01 !important;
            border-color: #ffcc01 !important;
        }

        .btn-primary:focus, .btn-primary.focus {
            box-shadow: none, 0 0 0 0 #ffcc01 !important;
        }

        .btn-primary.disabled, .btn-primary:disabled {
            color: black;
            background-color: #ffcc01 !important;
            border-color: #ffcc01 !important;
        }

        .btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active,
        .show > .btn-primary.dropdown-toggle {
            color: black;
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
            border-bottom: 1px solid #0193de;
        }

        [class*=sidebar-dark] .brand-link {
            border-bottom: 1px solid #0193de;
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
            color: black;
            border-color: #0193de;
            background-color: #0193de;
            box-shadow: none;
        }
    </style>
</head>
<body class="hold-transition login-page" background="{{ asset('photo/background.jpg') }}" style="background-color: #0193de;">
    <div class="login-box">
        <div class="card shadow" style="border-radius: 10px;">
            <div class="card-body login-card-body" style="border-radius: 10px;">
                
                <div style="text-align: right;">
                    <img src="{{ asset('photo/logo.png') }}" style="width: 100%; max-width: 50px;">
                    <img src="{{ asset('photo/logo2.png') }}" style="width: 100%; max-width: 60px;">
                </div>

                <br>
                <center>
                    <h3>Sistem Penjadwalan Tera Ulang Dan Kalibrasi UPTD Metrologin Legal Kota Denpasar</h3>
                </center>
                <br>

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3 shadow">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <span>
                            {{ $message }}
                        </span>
                    @enderror
                    
                    <div class="input-group mb-3 shadow">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <span>
                            {{ $message }}
                        </span>
                    @enderror
                    
                    {{-- <div class="row">                        
                        <div class="col-12"> --}}
                            <button type="submit" class="btn btn-primary btn-block shadow">Login <i class="fas fa-sign-in-alt"></i></button>
                        {{-- </div>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>

<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
</body>
</html>
