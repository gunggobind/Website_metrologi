@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Withdraw Token BCN</h1>
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
                                <div class="card-body table-responsive">
                                    <table id="example1" class="table table-hover borderless" style="width: 100%; border: 0;">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">No</th>
                                                <th>Member</th>
                                                <th style="width: 250px">Keterangan Bank</th>
                                                <th style="width: 200px">Jumlah Token BCN</th>
                                                <th style="width: 200px">Nominal</th>
                                                <th style="width: 200px">Jumlah Nominal</th>
                                                <th style="width: 150px">Status</th>
                                                <th style="width: 75px; text-align: center">Aksi</th>
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
                                                    <td>{{ $item->nama_bank.' / '.$item->atas_nama_bank.' / '.$item->no_rekening_bank }}</td>
                                                    <td>{{ $item->jumlah }} Token BCN</td>
                                                    <td>1 Token BCN = Rp. {{ number_format($item->nominal) }}</td>
                                                    <td>Rp. {{ number_format($item->jumlah_nominal) }}</td>
                                                    <td>
                                                        @if ($item->status == IS_WITHDRAW_PENDING)
                                                            Menunggu Verifikasi
                                                        @elseif($item->status == IS_WITHDRAW_PROCESS)
                                                            Sedang Diproses
                                                        @elseif($item->status == IS_WITHDRAW_COMPLETED)
                                                            Sukses
                                                        @elseif($item->status == IS_WITHDRAW_FAIL)
                                                            Gagal
                                                        @else
                                                            Dibatalkan
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center">
                                                        <a href="{{ route('backend.token-bcn.withdraw.edit', ['id' => $item->id]) }}" class="btn btn-primary shadow bg-primary"> <i class="fa fa-edit"></i> Edit</a>
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
                        <div class="col-12">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h3 class="card-title"><a href="{{ route('backend.token-bcn.withdraw.create') }}" class="btn btn-primary shadow bg-primary"> <i class="fa fa-plus"></i> Withdraw</a></h3>
                                </div>
                                <div class="card-body table-responsive">
                                    <table id="example1" class="table table-hover borderless" style="width: 100%; border: 0;">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">No</th>
                                                <th>Keterangan Bank</th>
                                                <th style="width: 200px">Jumlah Token BCN</th>
                                                <th style="width: 200px">Nominal</th>
                                                <th style="width: 200px">Jumlah Nominal</th>
                                                <th style="width: 150px">Status</th>
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
                                                    <td>{{ $item->nama_bank.' / '.$item->atas_nama_bank.' / '.$item->no_rekening_bank }}</td>
                                                    <td>{{ $item->jumlah }} Token BCN</td>
                                                    <td>1 Token BCN = Rp. {{ number_format($item->nominal) }}</td>
                                                    <td>Rp. {{ number_format($item->jumlah_nominal) }}</td>
                                                    <td>
                                                        @if ($item->status == IS_WITHDRAW_PENDING)
                                                            Menunggu Verifikasi
                                                        @elseif($item->status == IS_WITHDRAW_PROCESS)
                                                            Sedang Diproses
                                                        @elseif($item->status == IS_WITHDRAW_COMPLETED)
                                                            Sukses
                                                        @elseif($item->status == IS_WITHDRAW_FAIL)
                                                            Gagal
                                                        @else
                                                            Dibatalkan
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center">
                                                        @if ($item->status == IS_WITHDRAW_PENDING)
                                                            <a href="{{ route('backend.token-bcn.withdraw.cancel', ['id' => $item->id]) }}" class="btn btn-primary shadow bg-primary" onclick="return confirm('Apakah Anda yakin ingin membatalkan data ini ?')"> <i class="fa fa-times"></i> Cancel</a>
                                                        @elseif ($item->status == IS_WITHDRAW_COMPLETED && $item->bukti_transfer)
                                                            <a href="{{ asset('photo/'.$item->bukti_transfer) }}" target="__blank" class="btn btn-primary shadow bg-primary"><i class="fa fa-image"></i> Bukti Transfer</a>
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
        @endif
    </div>
@endsection
