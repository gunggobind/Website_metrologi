<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bancin Finance</title>
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
            color: #fff;
            background-color: #113897 !important;
            border-color: #113897 !important;
        }
        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
            background-color: #113897 !important ;
            color: #fff ;
        }

        [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:focus, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover {
            background-color: #113897 !important ;
            color: #fff ;
        }

        .btn-primary {
            color: #fff;
            background-color: #113897 !important;
            border-color: #113897 !important;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #113897 !important;
            border-color: #113897 !important;
        }

        .btn-primary:focus, .btn-primary.focus {
            box-shadow: none, 0 0 0 0 #113897 !important;
        }

        .btn-primary.disabled, .btn-primary:disabled {
            color: #fff;
            background-color: #113897 !important;
            border-color: #113897 !important;
        }

        .btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active,
        .show > .btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #113897 !important;
            border-color: #113897 !important;
        }

        .btn-primary:not(:disabled):not(.disabled):active:focus, .btn-primary:not(:disabled):not(.disabled).active:focus,
        .show > .btn-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0 #113897 !important;
            background-color: #113897 !important;
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
            border-bottom: 1px solid #090a1e;
        }

        [class*=sidebar-dark] .brand-link {
            border-bottom: 1px solid #090a1e;
        }

        .btn:not(:disabled):not(.disabled) {
            cursor: pointer;
            background-color: #113897 !important;
        }

        .bg-primary:active {
            background-color: #113897 !important;
        }

        .bg-primary {
            background-color: #090a1e !important;
        }

        .bg-primary:hover {
            background-color: #090a1e !important;
        }

        .custom-control-input:checked~.custom-control-label::before {
            color: #fff;
            border-color: #090a1e;
            background-color: #090a1e;
            box-shadow: none;
        }
    </style>
</head>
<body class="hold-transition login-page" background="{{ asset('photo/background.jpg') }}" style="background-color: #090a1e;">
    <div class="login-box">
        <div class="card shadow" style="border-radius: 10px;">
            <div class="card-body login-card-body" style="border-radius: 10px;">
            <center>
                <img src="{{ asset('photo/logo.png') }}" style="width: 100%; max-width: 300px;">
            </center>
                <form action="{{ route('register.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div>
                        <label>Nama</label>
                        <input type="text" class="form-control shadow mb-3 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                    </div>
                    @if ($errors->has('name'))
                        <span style="color:red;">{{ $errors->first('name') }}</span>
                    @endif
                    
                    <div>
                        <label>Email</label>
                        <input type="email" class="form-control shadow mb-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                    </div>
                    @if ($errors->has('email'))
                        <span style="color:red;">{{ $errors->first('email') }}</span>
                    @endif

                    <div>
                        <label>Password</label>
                        <input type="password" class="form-control shadow mb-3 @error('password') is-invalid @enderror" name="password" required>
                    </div>
                    @if ($errors->has('password'))
                        <span style="color:red;">{{ $errors->first('password') }}</span>
                    @endif

                    <div>
                        <label>Telepon</label>
                        <input type="text" class="form-control shadow mb-3 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>
                    </div>
                    @if ($errors->has('phone'))
                        <span style="color:red;">{{ $errors->first('phone') }}</span>
                    @endif

                    <div>
                        <label>Nama Bank</label>
                        <select name="nama_bank" class="form-control shadow mb-3" required>
                            @foreach (IS_LIST_BANK as $bank)
                                <option value="{{ $bank }}">{{ $bank }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has('nama_bank'))
                        <span style="color:red;">{{ $errors->first('nama_bank') }}</span>
                    @endif

                    <div>
                        <label>Atas Nama</label>
                        <input type="text" class="form-control shadow mb-3 @error('atas_nama_bank') is-invalid @enderror" name="atas_nama_bank" value="{{ old('atas_nama_bank') }}" required>
                    </div>
                    @if ($errors->has('atas_nama_bank'))
                        <span style="color:red;">{{ $errors->first('atas_nama_bank') }}</span>
                    @endif

                    <div>
                        <label>No Rekening Bank</label>
                        <input type="text" class="form-control shadow mb-3 @error('no_rekening_bank') is-invalid @enderror" name="no_rekening_bank" value="{{ old('no_rekening_bank') }}" required>
                    </div>
                    @if ($errors->has('no_rekening_bank'))
                        <span style="color:red;">{{ $errors->first('no_rekening_bank') }}</span>
                    @endif

                    <div>
                        <label>Foto</label>
                        <input type="file" class="form-control shadow mb-3 @error('image') is-invalid @enderror" name="image" required>
                    </div>
                    @if ($errors->has('image'))
                        <span style="color:red;">{{ $errors->first('image') }}</span>
                    @endif
                    
                    <div class="row">                        
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block shadow">Daftar <i class="fas fa-user-plus"></i></button>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('login') }}" class="btn btn-primary btn-block shadow">Login <i class="fas fa-sign-in-alt"></i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
