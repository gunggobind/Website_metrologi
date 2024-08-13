@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Pengaturan</h1>
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
                                <form action="{{ route('backend.setting.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Bunga (%)<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" step="0.00001" name="bunga" class="form-control" value="{{ $item->bunga }}" required>
                                            @if ($errors->has('bunga'))
                                                <span style="color:red;">{{ $errors->first('bunga') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Nominal BCN (Rp)<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" name="nominal_bcn" class="form-control" value="{{ $item->nominal_bcn }}" required>
                                            @if ($errors->has('nominal_bcn'))
                                                <span style="color:red;">{{ $errors->first('nominal_bcn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Bunga Absen (%)<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" name="bunga_absen" class="form-control" value="{{ $item->bunga_absen }}" required>
                                            @if ($errors->has('bunga_absen'))
                                                <span style="color:red;">{{ $errors->first('bunga_absen') }}</span>
                                            @endif
                                        </div>
                                    </div> --}}
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
