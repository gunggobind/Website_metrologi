@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Tarik Tabungan BCN</h1>
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
                                <form action="{{ route('backend.token-bcn.tabungan.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Jumlah Tabungan BCN <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" step="0.01" name="token_bcn" class="form-control" value="{{ old('token_bcn') }}" min="{{ 1 }}" max="{{ auth()->user()->tabungan_bcn }}" required>
                                            <span>Maksimum tabungan BCN adalah {{ auth()->user()->tabungan_bcn }}</span>
                                            <span></span>
                                            @if ($errors->has('token_bcn'))
                                                <span style="color:red;">{{ $errors->first('token_bcn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                <button id="submit" type="submit" class="btn btn-primary btn-save shadow bg-primary">Tarik</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection