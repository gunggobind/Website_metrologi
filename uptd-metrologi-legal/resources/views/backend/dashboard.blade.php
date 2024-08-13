@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Beranda</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content ml-4 mr-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-4">
                        <div class="small-box shadow" style="background-color: #0193de;">
                            <div class="inner" style="color: white;">
                                <h3>{{ $pengujian }}</h3>
                                <p>Pengujian</p>
                            </div>
                            <div class="icon">
                                <i class="far fa-edit" style="color: white;"></i>
                            </div>
                            <a style="background-color: #ffcc01; color: black;" href="{{ route('backend.pengujian') }}" class="small-box-footer">Baca selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
