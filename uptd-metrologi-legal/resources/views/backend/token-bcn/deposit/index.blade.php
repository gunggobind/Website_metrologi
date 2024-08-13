@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Deposit Token BCN</h1>
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
                                    <h3 class="card-title"><a href="{{ route('backend.token-bcn.deposit.create') }}" class="btn btn-primary shadow bg-primary"> <i class="fa fa-plus"></i> Deposit</a></h3>
                                </div>
                            @endif
                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-hover borderless" style="width: 100%; border: 0;">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th>Metode Pembayaran</th>
                                            <th style="width: 175px">Total Harga</th>
                                            <th style="width: 250px">Kode / Link Pembayaran</th>
                                            <th style="width: 150px">Status</th>
                                            <th style="width: 175px">Batas Pembayaran</th>
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
                                                <td>{{ $item['results']['payment_name'] }}</td>
                                                <td>Rp. {{ number_format($item['results']['amount']) }}</td>
                                                <td>
                                                    @if (isset($item['results']['qr_url']))
                                                        @if ($item['results']['qr_url'])
                                                            <a href="{{ $item['results']['qr_url'] }}" target="__blank"><u>{{ $item['results']['qr_url'] }}</u></a>
                                                        @endif
                                                    @elseif (isset($item['results']['pay_url']))
                                                        @if ($item['results']['pay_url'])
                                                            <a href="{{ $item['results']['pay_url'] }}" target="__blank"><u>{{ $item['results']['pay_url'] }}</u></a>
                                                        @endif
                                                    @else
                                                        {{-- {{ $item['results']['pay_code'] }} <button class="btn btn-sm btn-primary shadow bg-primary" onclick="myFunction()"><i class="fa fa-copy"></i></button> --}}
                                                        <div class="row">
                                                            <input type="text" value="{{ $item['results']['pay_code'] }}" class="form-control" style="width: 60%; border-radius: 10px 0px 0px 10px;" readonly><button style="border-radius: 0px 10px 10px 0px;" class="btn btn-sm btn-primary shadow bg-primary" onclick="copy({{ $item['results']['pay_code'] }})"><i class="fa fa-copy"></i></button>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>{{ $item->status }}</td>
                                                <td>{{ \Carbon\Carbon::createFromTimestamp($item['results']['expired_time'])->timeZone('Asia/Jakarta')->toDateTimeString() }} WIB</td>
                                                <td style="text-align: center">
                                                    <a href="{{ $item['results']['checkout_url'] }}" class="btn btn-primary shadow bg-primary"><i class="fa fa-file"></i> Detail</a>
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

@section('js')
    <script>
        function copy(text) {
            navigator.clipboard.writeText(text);
            alert("Kode berhasil di copy");
        }
    </script>
@endsection
