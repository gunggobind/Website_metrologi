@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Tambah Withdraw Token BCN</h1>
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
                                <form action="{{ route('backend.token-bcn.withdraw.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Member <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ auth()->user()->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Nama Bank <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <select name="nama_bank" class="form-control" required>
                                                @foreach (IS_LIST_BANK as $bank)
                                                    <option value="{{ $bank }}" @if($bank == auth()->user()->nama_bank) selected @endif>{{ $bank }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('nama_bank'))
                                                <span style="color:red;">{{ $errors->first('nama_bank') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Atas Nama Bank <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="atas_nama_bank" class="form-control" value="{{ auth()->user()->atas_nama_bank }}" required>
                                            @if ($errors->has('atas_nama_bank'))
                                                <span style="color:red;">{{ $errors->first('atas_nama_bank') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">No Rekening Bank <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="no_rekening_bank" class="form-control" value="{{ auth()->user()->no_rekening_bank }}" required>
                                            @if ($errors->has('no_rekening_bank'))
                                                <span style="color:red;">{{ $errors->first('no_rekening_bank') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Jumlah <span style="color:red;"> *</span> (1 Token BCN = {{ $setting->nominal_bcn }})</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah') ?? 1 }}" min="1" max="{{ auth()->user()->token_bcn }}" required>
                                            <span>Maksimum token adalah {{ auth()->user()->token_bcn }}</span>
                                            @if ($errors->has('jumlah'))
                                                <span style="color:red;">{{ $errors->first('jumlah') }}</span>
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
