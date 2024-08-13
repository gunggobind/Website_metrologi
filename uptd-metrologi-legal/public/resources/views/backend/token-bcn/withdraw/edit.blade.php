@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Withdraw Token BCN</h1>
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
                                <form action="{{ route('backend.token-bcn.withdraw.update', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Bukti Transfer</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="bukti_transfer" class="dropify" data-show-remove="false" data-default-file="{{ $item->bukti_transfer ? asset('photo/'.$item->bukti_transfer) : '' }}" @if($item->status == IS_WITHDRAW_COMPLETED) disabled @endif>
                                            @if ($errors->has('bukti_transfer'))
                                                <span style="color:red;">{{ $errors->first('bukti_transfer') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Member <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $item->user->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Nama Bank <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <select name="nama_bank" class="form-control" @if($item->status == IS_WITHDRAW_COMPLETED) disabled @else required @endif>
                                                @foreach (IS_LIST_BANK as $bank)
                                                    <option value="{{ $bank }}" @if($bank == $item->nama_bank) selected @endif>{{ $bank }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('nama_bank'))
                                                <span style="color:red;">{{ $errors->first('nama_bank') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Atas Nama Bank <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="atas_nama_bank" class="form-control" value="{{ $item->atas_nama_bank }}" @if($item->status == IS_WITHDRAW_COMPLETED) disabled @else required @endif>
                                            @if ($errors->has('atas_nama_bank'))
                                                <span style="color:red;">{{ $errors->first('atas_nama_bank') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">No Rekening Bank <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" name="no_rekening_bank" class="form-control" value="{{ $item->no_rekening_bank }}" @if($item->status == IS_WITHDRAW_COMPLETED) disabled @else required @endif>
                                            @if ($errors->has('no_rekening_bank'))
                                                <span style="color:red;">{{ $errors->first('no_rekening_bank') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Jumlah Token BCN<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" name="jumlah" class="form-control" value="{{ $item->jumlah }}" @if($item->status == IS_WITHDRAW_COMPLETED) disabled @else required @endif>
                                            @if ($errors->has('jumlah'))
                                                <span style="color:red;">{{ $errors->first('jumlah') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Nominal 1 Token BCN<span style="color:red;"> *</span> (Rp)</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="nominal" class="form-control" value="{{ $item->nominal }}" @if($item->status == IS_WITHDRAW_COMPLETED) disabled @else required @endif>
                                            @if ($errors->has('nominal'))
                                                <span style="color:red;">{{ $errors->first('nominal') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Jumlah Nominal<span style="color:red;"> *</span> (Rp)</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="jumlah_nominal" class="form-control" value="{{ $item->jumlah_nominal }}" @if($item->status == IS_WITHDRAW_COMPLETED) disabled @else required @endif>
                                            @if ($errors->has('jumlah_nominal'))
                                                <span style="color:red;">{{ $errors->first('jumlah_nominal') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Status <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <select name="status" class="form-control" @if($item->status == IS_WITHDRAW_COMPLETED) disabled @else required @endif>
                                                <option value="{{ IS_WITHDRAW_PENDING }}" @if($item->status == IS_WITHDRAW_PENDING) selected @endif>Menunggu Verifikasi</option>
                                                <option value="{{ IS_WITHDRAW_PROCESS }}" @if($item->status == IS_WITHDRAW_PROCESS) selected @endif>Sedang Diproses</option>
                                                <option value="{{ IS_WITHDRAW_COMPLETED }}" @if($item->status == IS_WITHDRAW_COMPLETED) selected @endif>Sukses</option>
                                                <option value="{{ IS_WITHDRAW_FAIL }}" @if($item->status == IS_WITHDRAW_FAIL) selected @endif>Gagal</option>
                                                <option value="{{ IS_WITHDRAW_CANCEL }}" @if($item->status == IS_WITHDRAW_CANCEL) selected @endif>Dibatalkan</option>
                                            </select>
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
