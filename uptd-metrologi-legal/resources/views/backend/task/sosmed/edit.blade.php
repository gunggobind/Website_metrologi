@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Tugas Sosial Media</h1>
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
                                <form action="{{ route('backend.task-sosmed.update', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Judul <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="judul" class="form-control" value="{{ $item->judul }}" required>
                                            @if ($errors->has('judul'))
                                                <span style="color:red;">{{ $errors->first('judul') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Link <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="link" class="form-control" value="{{ $item->link }}" required>
                                            @if ($errors->has('link'))
                                                <span style="color:red;">{{ $errors->first('link') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Jumlah Token BCN <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="integer" name="token_bcn" class="form-control" value="{{ $item->token_bcn }}" required>
                                            @if ($errors->has('token_bcn'))
                                                <span style="color:red;">{{ $errors->first('token_bcn') }}</span>
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
