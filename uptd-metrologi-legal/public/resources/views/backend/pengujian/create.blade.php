@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Tambah Pengujian</h1>
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
                                <form action="{{ route('backend.pengujian.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Nomor Pengujian <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nomor_pengujian" class="form-control" value="{{ old('nomor_pengujian') }}" required>
                                            @if ($errors->has('nomor_pengujian'))
                                                <span style="color:red;">{{ $errors->first('nomor_pengujian') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Alat Ukur Yang Diuji <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="alat_ukur_yang_diuji" class="form-control" value="{{ old('alat_ukur_yang_diuji') }}" required>
                                            @if ($errors->has('alat_ukur_yang_diuji'))
                                                <span style="color:red;">{{ $errors->first('alat_ukur_yang_diuji') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Pemilik <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="pemilik" class="form-control" value="{{ old('pemilik') }}" required>
                                            @if ($errors->has('pemilik'))
                                                <span style="color:red;">{{ $errors->first('pemilik') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Alamat Pemilik <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <textarea name="alamat_pemilik" class="form-control" rows="5" required>{{ old('alamat_pemilik') }}</textarea>
                                            @if ($errors->has('nomor_pengujian'))
                                                <span style="color:red;">{{ $errors->first('nomor_pengujian') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Tanggal Pengujian <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="date" name="tanggal_pengujian" class="form-control" value="{{ old('tanggal_pengujian') }}" required>
                                            @if ($errors->has('tanggal_pengujian'))
                                                <span style="color:red;">{{ $errors->first('tanggal_pengujian') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Metoda Pengujian <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="metoda_pengujian" class="form-control" value="{{ old('metoda_pengujian') }}" required>
                                            @if ($errors->has('metoda_pengujian'))
                                                <span style="color:red;">{{ $errors->first('metoda_pengujian') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Standar Pengujian <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="standar_pengujian" class="form-control" value="{{ old('standar_pengujian') }}" required>
                                            @if ($errors->has('standar_pengujian'))
                                                <span style="color:red;">{{ $errors->first('standar_pengujian') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Hasil Pengujian <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="hasil_pengujian" class="form-control" value="{{ old('hasil_pengujian') }}" required>
                                            @if ($errors->has('hasil_pengujian'))
                                                <span style="color:red;">{{ $errors->first('hasil_pengujian') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Berlaku Sampai Dengan <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="date" name="berlaku_sampai_dengan" class="form-control" value="{{ old('berlaku_sampai_dengan') }}" required>
                                            @if ($errors->has('berlaku_sampai_dengan'))
                                                <span style="color:red;">{{ $errors->first('berlaku_sampai_dengan') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Telepon (628)<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="telepon" class="form-control" value="{{ old('telepon') }}" required>
                                            @if ($errors->has('telepon'))
                                                <span style="color:red;">{{ $errors->first('telepon') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Harga <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" name="harga" class="form-control" value="{{ old('harga') }}" required>
                                            @if ($errors->has('harga'))
                                                <span style="color:red;">{{ $errors->first('harga') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                <button type="submit" class="btn btn-primary btn-save shadow bg-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
