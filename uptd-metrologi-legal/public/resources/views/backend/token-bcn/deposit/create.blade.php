@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Tambah Deposit Token BCN</h1>
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
                                <form action="{{ route('backend.token-bcn.deposit.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Jumlah Token BCN<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" id="token-bcn" name="token_bcn" class="form-control" value="0" min="2" autocomplete="off" required>
                                            <span>1 Token BCN = Rp. {{ number_format($setting->nominal_bcn) }}</span>
                                            @if ($errors->has('token_bcn'))
                                                <span style="color:red;">{{ $errors->first('token_bcn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Jumlah Nominal (Rp)<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" id="nominal" class="form-control" readonly>
                                            <input type="hidden" id="amount" name="amount">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Metode Pembayaran<span style="color:red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <select name="method" class="form-control" required>
                                                <option value="MYBVA">Maybank Virtual Account</option>
                                                <option value="PERMATAVA">Permata Virtual Account</option>
                                                <option value="BNIVA">BNI Virtual Account</option>
                                                <option value="BRIVA">BRI Virtual Account</option>
                                                <option value="MANDIRIVA">Mandiri Virtual Account</option>
                                                <option value="SMSVA">Sinarmas Virtual Account</option>
                                                <option value="MUAMALATVA">Muamalat Virtual Account</option>
                                                <option value="CIMBVA">CIMB Virtual Account</option>
                                                <option value="SAMPOERNAVA">Sahabat Sampoerna Virtual Account</option>
                                                <option value="ALFAMART">Alfamart</option>
                                                <option value="INDOMARET">Indomaret</option>
                                                <option value="ALFAMIDI">Alfamidi</option>
                                                <option value="OVO">OVO</option>
                                                <option value="QRIS">QRIS (ShopeePay)</option>
                                                <option value="QRISD">QRIS (DANA)</option>
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

@section('js')
    <script>
        var nominal = {!! $setting->nominal_bcn !!}

        $('#token-bcn').on('input', function() {
            $('#nominal').val('Rp. '+addCommas($(this).val()*nominal))
            $('#amount').val($(this).val()*nominal)
        });

        function addCommas(nStr)
        {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }
    </script>
@endsection
