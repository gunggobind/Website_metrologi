@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Profil</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content ml-4 mr-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <form id="form-profile" method="POST" action="{{ route('backend.profile.update') }}" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                                    @csrf            
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="name" class="control-label">Nama <span style="color:red;"> *</span></label>
                                            <div>
                                                <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                                                @if ($errors->has('name'))
                                                    <span class="help-block with-errors text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="control-label">Email <span style="color:red;"> *</span></label>
                                            <div>
                                                <input type="email" id="email" name="email" class="form-control" readonly value="{{ Auth::user()->email }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="control-label">Password</label>
                                            <div>
                                                <input type="password" id="password" name="password" class="form-control">
                                                <i class="help-block font-italic">Biarkan kosong jika Anda tidak ingin mengubah password</i>
                                                @if ($errors->has('password'))
                                                    <br><span class="help-block with-errors text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="control-label">Foto</label>
                                            <div>
                                                <input type="file" name="image" class="form-control">
                                                <i class="help-block font-italic">Biarkan kosong jika Anda tidak ingin mengubah foto</i>
                                                @if ($errors->has('image'))
                                                    <span style="color:red;">{{ $errors->first('image') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        @if (auth()->user()->role == IS_MEMBER)
                                            <div class="form-group">
                                                <label for="name" class="control-label">Telepon <span style="color:red;"> *</span></label>
                                                <div>
                                                    <input type="number" id="telepon" name="telepon" class="form-control" value="{{ Auth::user()->telepon }}" required>
                                                    @if ($errors->has('telepon'))
                                                        <span class="help-block with-errors text-danger">{{ $errors->first('telepon') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label">Alamat BCN <span style="color:red;"> *</span></label>
                                                <div>
                                                    <input type="text" class="form-control" value="{{ Auth::user()->alamat_bcn }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label">Token BCN <span style="color:red;"> *</span></label>
                                                <div>
                                                    <input type="text" class="form-control" value="{{ Auth::user()->token_bcn }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label">Tabungan BCN <span style="color:red;"> *</span></label>
                                                <div>
                                                    <input type="text" class="form-control" value="{{ Auth::user()->tabungan_bcn }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label">Nama Bank <span style="color:red;"> *</span></label>
                                                <div>
                                                    <select name="nama_bank" class="form-control" required>
                                                        @foreach (IS_LIST_BANK as $bank)
                                                            <option value="{{ $bank }}" @if($bank == auth()->user()->nama_bank) selected @endif>{{ $bank }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('nama_bank'))
                                                        <span class="help-block with-errors text-danger">{{ $errors->first('nama_bank') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label">Atas Nama Bank <span style="color:red;"> *</span></label>
                                                <div>
                                                    <input type="text" name="atas_nama_bank" class="form-control" value="{{ auth()->user()->atas_nama_bank }}" required>
                                                    @if ($errors->has('atas_nama_bank'))
                                                        <span style="color:red;">{{ $errors->first('atas_nama_bank') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label">No Rekening Bank <span style="color:red;"> *</span></label>
                                                <div>
                                                    <input type="text" name="no_rekening_bank" class="form-control" value="{{ auth()->user()->no_rekening_bank }}" required>
                                                    @if ($errors->has('no_rekening_bank'))
                                                        <span style="color:red;">{{ $errors->first('no_rekening_bank') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                        <button type="submit" id="btn-submit" class="btn btn-primary btn-save">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
