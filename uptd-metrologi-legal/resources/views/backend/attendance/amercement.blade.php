@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Riyawat Denda</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content ml-4 mr-4">
            <div class="container-fluid">
                @if($item)
                    <button class="btn btn-primary mb-4 mr-2" disabled><i class="far fa-check-circle"></i> Anda Sudah Absen Hari Ini</button>
                @else
                    <a href="{{ route('backend.attendance.store') }}" class="btn btn-primary mb-4 mr-2"><i class="far fa-calendar-check"></i>&nbsp; Absen Hari Ini</a>
                @endif
                <a href="{{ route('backend.attendance') }}" class="btn btn-primary mb-4"><i class="far fa-calendar-check"></i>&nbsp; Absen</a>
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-hover borderless" style="width: 100%; border: 0;">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th >Denda</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach($items as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->denda }}</td>
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
