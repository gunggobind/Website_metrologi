@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Pengujian</h1>
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
                                <h3 class="card-title"><a href="{{ route('backend.pengujian.create') }}" class="btn btn-primary shadow bg-primary"> <i class="fa fa-plus"></i> Tambah</a></h3>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-hover borderless" style="width: 100%; border: 0;">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th style="width: 200px">Alat Ukur Yang Di Uji</th>
                                            <th style="width: 200px">Pemilik</th>
                                            <th style="width: 175px">Tanggal Pengujian</th>
                                            <th>Hasil Pengujian</th>
                                            <th style="width: 175px">Berlaku Sampai Dengan</th>
                                            <th style="width: 300px; text-align: center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach($items as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->alat_ukur_yang_diuji }}</td>
                                                <td>{{ $item->pemilik }}</td>
                                                <td>{{ date('d M Y', strtotime($item->tanggal_pengujian)) }}</td>
                                                <td>{{ $item->hasil_pengujian }}</td>
                                                <td>{{ date('d M Y', strtotime($item->berlaku_sampai_dengan)) }}</td>
                                                <td style="text-align: center">
                                                    <a href="https://wa.me/{{ $item->telepon }}?text=Halo+{{ $item->pemilik }},+Pembayaran+untuk+nomor+pengujian+{{ $item->nomor_pengujian }}+adalah+Rp+{{ number_format($item->harga) }}.+Terima+kasih." class="btn btn-primary shadow bg-primary"> <i class="fab fa-whatsapp"></i> Pembayaran</a>
                                                    <a href="{{ route('backend.pengujian.edit', ['id' => $item->id]) }}" class="btn btn-primary shadow bg-primary"> <i class="fa fa-edit"></i> Edit</a>
                                                    <a href="{{ route('backend.pengujian.delete', ['id' => $item->id]) }}" class="btn btn-primary shadow bg-primary" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ?')"> <i class="fa fa-trash"></i> Delete</a>
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
