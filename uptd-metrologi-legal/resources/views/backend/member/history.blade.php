@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Bunga {{ $member->name }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content ml-4 mr-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <button type="button" class="btn btn-primary shadow bg-primary" data-toggle="modal" data-target="#exampleModalLong">
                                        <i class="fa fa-plus"></i> Tambah
                                    </button>
                                </h3>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-hover borderless" style="width: 100%; border: 0;">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th>Jumlah Token BCN</th>
                                            <th style="width: 150px">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach($member->history as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->token_bcn }}</td>
                                                <td>{{ date('Y-m-d', strtotime($item->created_at)) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('backend.member.history.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal Tambah Bunga</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="user_id" value="{{ $member->id }}">
                        <label>Jumlah Token BCN <span style="color:red;"> *</span></label>
                        <input type="number" step="0.00001" value="0" name="token_bcn" class="form-control" value="{{ old('token_bcn') }}" required>
                        @if ($errors->has('token_bcn'))
                            <span style="color:red;">{{ $errors->first('token_bcn') }}</span>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
