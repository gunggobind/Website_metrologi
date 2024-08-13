@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Verifikasi Tugas Sosial Media</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content ml-4 mr-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-hover borderless" style="width: 100%; border: 0;">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th>Member</th>
                                            <th style="width: 300px">Username</th>
                                            <th style="width: 200px">Sosial Media</th>
                                            <th style="width: 100px; text-align: center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach($items as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->user->name }}</td>
                                                <td>{{ $item->username }}</td>
                                                <td><a target="__blank" href="{{ $item->task->link }}"><u>{{ $item->task->judul }}</u></a></td>
                                                <td style="text-align: center">
                                                    @if ($item->status == IS_PENDING)
                                                        <a href="{{ route('backend.task-verifikasi-sosmed.approve', ['id' => $item->id]) }}" class="btn btn-primary shadow bg-primary" onclick="return confirm('Apakah Anda yakin ingin approve data ini ?')"> <i class="fa fa-check"></i> Approve</a>
                                                    @endif
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
    </div>
@endsection
