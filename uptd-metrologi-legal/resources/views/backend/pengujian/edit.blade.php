@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Pengujian</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content ml-4 mr-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline card-tabs shadow">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pengujian-tab" data-toggle="pill" href="#pengujian" role="tab" aria-controls="pengujian" aria-selected="true">Pengujian</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="penguji-tab" data-toggle="pill" href="#penguji" role="tab" aria-controls="penguji" aria-selected="false">Penguji</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="alat-tab" data-toggle="pill" href="#alat" role="tab" aria-controls="alat" aria-selected="false">Alat</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="pengujian" role="tabpanel" aria-labelledby="pengujian-tab">
                                        <form action="{{ route('backend.pengujian.update', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                            <label class="col-sm-2 col-form-label font-weight-bold">Nomor Pengujian <span style="color:red;"> *</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="nomor_pengujian" class="form-control" value="{{ $item->nomor_pengujian }}" required>
                                                    @if ($errors->has('nomor_pengujian'))
                                                        <span style="color:red;">{{ $errors->first('nomor_pengujian') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-sm-2 col-form-label font-weight-bold">Alat Ukur Yang Diuji <span style="color:red;"> *</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="alat_ukur_yang_diuji" class="form-control" value="{{ $item->alat_ukur_yang_diuji }}" required>
                                                    @if ($errors->has('alat_ukur_yang_diuji'))
                                                        <span style="color:red;">{{ $errors->first('alat_ukur_yang_diuji') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-sm-2 col-form-label font-weight-bold">Pemilik <span style="color:red;"> *</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="pemilik" class="form-control" value="{{ $item->pemilik }}" required>
                                                    @if ($errors->has('pemilik'))
                                                        <span style="color:red;">{{ $errors->first('pemilik') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-sm-2 col-form-label font-weight-bold">Alamat Pemilik <span style="color:red;"> *</span></label>
                                                <div class="col-sm-10">
                                                    <textarea name="alamat_pemilik" class="form-control" rows="5" required>{{ $item->alamat_pemilik }}</textarea>
                                                    @if ($errors->has('nomor_pengujian'))
                                                        <span style="color:red;">{{ $errors->first('nomor_pengujian') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-sm-2 col-form-label font-weight-bold">Tanggal Pengujian <span style="color:red;"> *</span></label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="tanggal_pengujian" class="form-control" value="{{ $item->tanggal_pengujian }}" required>
                                                    @if ($errors->has('tanggal_pengujian'))
                                                        <span style="color:red;">{{ $errors->first('tanggal_pengujian') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-sm-2 col-form-label font-weight-bold">Metoda Pengujian <span style="color:red;"> *</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="metoda_pengujian" class="form-control" value="{{ $item->metoda_pengujian }}" required>
                                                    @if ($errors->has('metoda_pengujian'))
                                                        <span style="color:red;">{{ $errors->first('metoda_pengujian') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-sm-2 col-form-label font-weight-bold">Standar Pengujian <span style="color:red;"> *</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="standar_pengujian" class="form-control" value="{{ $item->standar_pengujian }}" required>
                                                    @if ($errors->has('standar_pengujian'))
                                                        <span style="color:red;">{{ $errors->first('standar_pengujian') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-sm-2 col-form-label font-weight-bold">Hasil Pengujian <span style="color:red;"> *</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="hasil_pengujian" class="form-control" value="{{ $item->hasil_pengujian }}" required>
                                                    @if ($errors->has('hasil_pengujian'))
                                                        <span style="color:red;">{{ $errors->first('hasil_pengujian') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-sm-2 col-form-label font-weight-bold">Berlaku Sampai Dengan <span style="color:red;"> *</span></label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="berlaku_sampai_dengan" class="form-control" value="{{ $item->berlaku_sampai_dengan }}" required>
                                                    @if ($errors->has('berlaku_sampai_dengan'))
                                                        <span style="color:red;">{{ $errors->first('berlaku_sampai_dengan') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-sm-2 col-form-label font-weight-bold">Telepon (628)<span style="color:red;"> *</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="telepon" class="form-control" value="{{ $item->telepon }}" required>
                                                    @if ($errors->has('telepon'))
                                                        <span style="color:red;">{{ $errors->first('telepon') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-sm-2 col-form-label font-weight-bold">Harga <span style="color:red;"> *</span></label>
                                                <div class="col-sm-10">
                                                    <input type="number" name="harga" class="form-control" value="{{ $item->harga }}" required>
                                                    @if ($errors->has('harga'))
                                                        <span style="color:red;">{{ $errors->first('harga') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-save shadow bg-primary">Simpan</button>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="penguji" role="tabpanel" aria-labelledby="penguji-tab">
                                        <div class="card-body">
                                            <form action="{{ route('backend.pengujian.penguji.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                    <input type="hidden" name="pengujian_id" value="{{ $item->id }}">
                                                    <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label font-weight-bold">Nama <span style="color:red;"> *</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                                                            @if ($errors->has('nama'))
                                                                <span style="color:red;">{{ $errors->first('nama') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label font-weight-bold">NIP <span style="color:red;"> *</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="nip" class="form-control" value="{{ old('nip') }}" required>
                                                            @if ($errors->has('nip'))
                                                                <span style="color:red;">{{ $errors->first('nip') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                <button type="submit" class="btn btn-primary btn-save shadow bg-primary">Tambah Penguji</button>
                                            </form>
                                        </div>
                                        <div class="card-body table-responsive">
                                            <table class="table table-hover borderless" style="width: 100%; border: 0;">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px;">No</th>
                                                        <th style="width: 500px;">Nama</th>
                                                        <th>NIP</th>
                                                        <th style="width: 150px; text-align: center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach($item->penguji as $penguji)
                                                        <tr>
                                                            <td>{{ $no++ }}</td>
                                                            <td>{{ $penguji->nama }}</td>
                                                            <td>{{ $penguji->nip }}</td>
                                                            <td style="text-align: center">
                                                                <a href="{{ route('backend.pengujian.penguji.delete', ['id' => $penguji->id]) }}" class="btn btn-primary shadow bg-primary" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ?')"> <i class="fa fa-trash"></i> Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="alat" role="tabpanel" aria-labelledby="alat-tab">
                                        <div class="card-body">
                                            <form action="{{ route('backend.pengujian.alat.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                    <input type="hidden" name="pengujian_id" value="{{ $item->id }}">
                                                    <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label font-weight-bold">Jenis UTTP <span style="color:red;"> *</span></label>
                                                        <div class="col-sm-10">
                                                            <select name="jenis_uttp" class="form-control" required>
                                                                {{-- <option value="Alat Ukur Panjang">Alat Ukur Panjang</option>
                                                                <option value="Takaran">Takaran</option>
                                                                <option value="Alat Ukur dari Gelas">Alat Ukur dari Gelas</option>
                                                                <option value="Bejana Ukur">Bejana Ukur</option> --}}
                                                                <option value="Alat Ukur Massa">Alat Ukura Massa</option>
                                                                <option value="Alat Ukur Volume">Alat Ukur Volume</option>
                                                                <option value="Alat Ukur Panjang">Alat Ukur Panjang</option>
                                                            </select>
                                                            @if ($errors->has('jenis_uttp'))
                                                                <span style="color:red;">{{ $errors->first('jenis_uttp') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label font-weight-bold">Nama Alat <span style="color:red;"> *</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="nama_alat" class="form-control" value="{{ old('nama_alat') }}" required>
                                                            @if ($errors->has('nama_alat'))
                                                                <span style="color:red;">{{ $errors->first('nama_alat') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label font-weight-bold">Kapasitas / Skala Terkecil <span style="color:red;"> *</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="kapasitas_skala_terkecil" class="form-control" value="{{ old('kapasitas_skala_terkecil') }}" required>
                                                            @if ($errors->has('kapasitas_skala_terkecil'))
                                                                <span style="color:red;">{{ $errors->first('kapasitas_skala_terkecil') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label font-weight-bold">Merk / Model <span style="color:red;"> *</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="merk_model" class="form-control" value="{{ old('merk_model') }}" required>
                                                            @if ($errors->has('merk_model'))
                                                                <span style="color:red;">{{ $errors->first('merk_model') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label font-weight-bold">No Seri <span style="color:red;"> *</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="no_seri" class="form-control" value="{{ old('no_seri') }}" required>
                                                            @if ($errors->has('no_seri'))
                                                                <span style="color:red;">{{ $errors->first('no_seri') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label font-weight-bold">Keterangan <span style="color:red;"> *</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="keterangan" class="form-control" value="{{ old('keterangan') }}" required>
                                                            @if ($errors->has('keterangan'))
                                                                <span style="color:red;">{{ $errors->first('keterangan') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                <button type="submit" class="btn btn-primary btn-save shadow bg-primary">Tambah Alat</button>
                                            </form>
                                        </div>
                                        <div class="card-body table-responsive">
                                            <table class="table table-hover borderless" style="width: 100%; border: 0;">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px;">No</th>
                                                        <th style="width: 250px;">Jenis UTTP</th>
                                                        <th style="width: 250px;">Nama Alat</th>
                                                        <th style="width: 250px;">Kapasitas / Skala Terkecil</th>
                                                        <th style="width: 250px;">Merk / Model</th>
                                                        <th style="width: 250px;">No Seri</th>
                                                        <th>Keterangan</th>
                                                        <th style="width: 150px; text-align: center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach($item->alat as $alat)
                                                        <tr>
                                                            <td>{{ $no++ }}</td>
                                                            <td>{{ $alat->jenis_uttp }}</td>
                                                            <td>{{ $alat->nama_alat }}</td>
                                                            <td>{{ $alat->kapasitas_skala_terkecil }}</td>
                                                            <td>{{ $alat->merk_model }}</td>
                                                            <td>{{ $alat->no_seri }}</td>
                                                            <td>{{ $alat->keterangan }}</td>
                                                            <td style="text-align: center">
                                                                <a href="{{ route('backend.pengujian.alat.delete', ['id' => $alat->id]) }}" class="btn btn-primary shadow bg-primary" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ?')"> <i class="fa fa-trash"></i> Delete</a>
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
                    </div>
            </div>
        </section>
    </div>
@endsection
