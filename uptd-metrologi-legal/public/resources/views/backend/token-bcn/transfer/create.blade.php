@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Tambah Transfer Token BCN</h1>
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
                                <form action="{{ route('backend.token-bcn.transfer.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Jumlah Token BCN <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" name="jumlah" class="form-control" step="0.00001" value="{{ old('jumlah') }}" max="{{ auth()->user()->token_bcn }}" required>
                                            <span>Maksimum token adalah {{ auth()->user()->token_bcn }}</span>
                                            <span></span>
                                            @if ($errors->has('jumlah'))
                                                <span style="color:red;">{{ $errors->first('jumlah') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Alamat BCN <span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input id="alamat-bcn" type="text" name="alamat_bcn" class="form-control" value="{{ old('alamat_bcn') }}" required>
                                            @if ($errors->has('alamat_bcn'))
                                                <span style="color:red;">{{ $errors->first('alamat_bcn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">&nbsp;</label>
                                        <div class="col-sm-10">
                                            <button id="check" type="button" class="btn btn-primary btn-save shadow bg-primary">Cek Alamat BCN</button>
                                        </div>
                                    </div>
                                <button id="submit" type="submit" class="btn btn-primary btn-save shadow bg-primary" disabled>Kirim</button>
                                </form>
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
        $('#alamat-bcn').on('input', function() {
            $('#submit').prop('disabled', true)
        });

        $("#check").click(function(){
            if($('#alamat-bcn').val() == ''){
                swal.fire({
                    title: 'Warning!',
                    text: 'Silahkan isi alamat BCN terlebih dahulu',
                    icon: 'warning',
                    confirmButtonColor: '#113897',
                })
                $('#submit').prop('disabled', true)
            }else{
                $.get("{{ url('/') }}/c-panel/token-bcn/transfer/check-bcn-address/"+$('#alamat-bcn').val(), function(result){
                    if(result == true){
                        swal.fire({
                            title: 'Success!',
                            text: 'Alamat BCN tersedia',
                            icon: 'success',
                            confirmButtonColor: '#113897',
                        })
                        $('#submit').prop('disabled', false)
                    }else{
                        swal.fire({
                            title: 'Warning!',
                            text: 'Alamat BCN tidak tersedia',
                            icon: 'warning',
                            confirmButtonColor: '#113897',
                        })
                        $('#submit').prop('disabled', true)
                    }
                });
            }
        });
    </script>
@endsection