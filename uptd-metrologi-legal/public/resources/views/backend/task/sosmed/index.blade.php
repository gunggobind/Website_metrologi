@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Tugas Sosial Media</h1>
                    </div>
                </div>
            </div>
        </div>

        @if (auth()->user()->role == IS_ADMIN)
            <section class="content ml-4 mr-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h3 class="card-title"><a href="{{ route('backend.task-sosmed.create') }}" class="btn btn-primary shadow bg-primary"> <i class="fa fa-plus"></i> Tambah</a></h3>
                                </div>
                                <div class="card-body table-responsive">
                                    <table id="example1" class="table table-hover borderless" style="width: 100%; border: 0;">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">No</th>
                                                <th>Judul</th>
                                                <th style="width: 500px">Link</th>
                                                <th style="width: 200px">Jumlah Token BCN</th>
                                                <th style="width: 150px; text-align: center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach($items as $item)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $item->judul }}</td>
                                                    <td><a target="__blank" href="{{ $item->link }}"><u>{{ $item->link }}</u></a></td>
                                                    <td>{{ $item->token_bcn }}</td>
                                                    <td style="text-align: center">
                                                        <a href="{{ route('backend.task-sosmed.edit', ['id' => $item->id]) }}" class="btn btn-primary shadow bg-primary"> <i class="fa fa-edit"></i> Edit</a>
                                                        <a href="{{ route('backend.task-sosmed.delete', ['id' => $item->id]) }}" class="btn btn-primary shadow bg-primary" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ?')"> <i class="fa fa-trash"></i> Delete</a>
                                                    </td>
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
        @else
            <section class="content ml-4 mr-4">
                <div class="container-fluid">
                    <div class="row">
                        @foreach ($items as $item)
                            <div class="col-md-3 col-12">
                                <div class="card">
                                    <div class="card-header" style="background-color: #113897; color: white;">
                                        <h3 class="card-title">{{ $item->judul }} (Bonus Token BCN {{ $item->token_bcn }})</h3>
                                        <div class="card-tools">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @if(\DB::table('tb_user_task')->whereTaskId($item->id)->count() < 10)
                                            <form action="{{ route('backend.task.create-or-update') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                                <div class="row m-0 p-0">
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <input type="text" name="username" class="form-control col-12 col-12 mr-3 mb-1" placeholder="Username akun anda" value="{{ $item->member_username }}" @if($item->member_status === 0 || $item->member_status == null) required @elseif($item->member_status == 1) readonly @endif>
                                                    @if($item->member_status != 1)
                                                        <button type="submit" class="btn btn-primary col-12 col-12 mb-1">Simpan</button>
                                                    @endif
                                                </div>
                                                @if ($item->member_status === 0)
                                                    <span class="badge badge-warning">Sedang diverifikasi</span>
                                                @elseif ($item->member_status == 1)
                                                    <span class="badge badge-success">Sudah diverifikasi</span>
                                                @endif
                                            </form>
                                        @else
                                            @if (\DB::table('tb_user_task')->whereUserId(auth()->user()->id)->whereTaskId($item->id)->first())
                                                @if ($item->member_status === 0)
                                                    <span class="badge badge-warning">Sedang diverifikasi</span>
                                                @elseif ($item->member_status == 1)
                                                    <span class="badge badge-success">Sudah diverifikasi</span>
                                                @endif
                                            @else
                                                <span class="badge badge-danger pt-2 pb-2" style="border-radius: 0px 0px 5px 5px;">Sudah berakhir</span>
                                            @endif
                                        @endif  

                                        
                                        {{-- <form action="{{ route('backend.task.create-or-update') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row m-0 p-0">
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <input type="text" name="username" class="form-control col-12 col-12 mr-3 mb-1" placeholder="Username akun anda" value="{{ $item->member_username }}" @if($item->member_status === 0 || $item->member_status == null) required @elseif($item->member_status == 1) readonly @endif>
                                                @if($item->member_status != 1)
                                                    <button type="submit" class="btn btn-primary col-12 col-12 mb-1">Simpan</button>
                                                @endif
                                            </div>
                                            @if ($item->member_status === 0)
                                                <span class="badge badge-warning">Sedang diverifikasi</span>
                                            @elseif ($item->member_status == 1)
                                                <span class="badge badge-success">Sudah diverifikasi</span>
                                            @endif
                                        </form> --}}
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{ $item->link }}" target="__blank" class="btn btn-primary" style="width: 100%;">Link Sosial Media <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </div>
@endsection
