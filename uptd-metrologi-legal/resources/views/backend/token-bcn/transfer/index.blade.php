@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Transfer Token BCN</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content ml-4 mr-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            @if (auth()->user()->role == IS_MEMBER)
                                <div class="card-header">
                                    <h3 class="card-title"><a href="{{ route('backend.token-bcn.transfer.create') }}" class="btn btn-primary shadow bg-primary"> <i class="fa fa-plus"></i> Transfer</a></h3>
                                </div>
                            @endif
                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-hover borderless" style="width: 100%; border: 0;">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th>Member</th>
                                            <th style="width: 200px">Jumlah Token BCN</th>
                                            <th style="width: 500px">Alamat BCN</th>
                                            <th style="width: 200px">Tanggal</th>
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
                                                <td>{{ $item->jumlah }}</td>
                                                <td>{{ $item->penerima->alamat_bcn }}</td>
                                                <td>{{ \Carbon\Carbon::createFromDate($item->created_at)->timeZone('Asia/Jakarta')->toDateTimeString() }} WIB</td>
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
