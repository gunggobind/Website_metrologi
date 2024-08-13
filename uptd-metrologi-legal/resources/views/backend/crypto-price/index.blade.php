@extends('layouts.backend.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header ml-4 mr-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Harga Crypto</h1>
                    </div>
                </div>
            </div>
        </div>

        {{-- <section class="content ml-4 mr-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <div id="chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        

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
                                            <th>Koin</th>
                                            <th style="width: 250px;">Harga</th>
                                            <th style="width: 150px;">Grafik Harga Koin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach($items as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>
                                                    <img src="{{ $item['image'] }}" style="width: 30px;"> &nbsp;
                                                    <b>{{ $item['name'] }}</b> &nbsp;
                                                    {{ strtoupper($item['symbol']) }} &nbsp;
                                                </td>
                                                <td>Rp {{ number_format($item['current_price']) }}</td>
                                                {{-- <td><coingecko-coin-price-chart-widget  coin-id="{{ $item['id'] }}" currency="idr" height="200" locale="id" background-color="#ffffff"></coingecko-coin-price-chart-widget></td> --}}
                                                <td><button type="button" class="btn btn-primary" onclick="showGrafik('{{ $item['id'] }}')">Lihat Grafik</button></td>
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

    <div class="modal fade" id="grafikModal" tabindex="-1" role="dialog" aria-labelledby="grafikModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Grafik Harga Koin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function showGrafik(id){
            $('.modal-body').text('')
            $('.modal-body').append('<coingecko-coin-price-chart-widget  coin-id="'+id+'" currency="idr" height="200" locale="id" background-color="#ffffff"></coingecko-coin-price-chart-widget>')
            $('#grafikModal').modal('show')
        }
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
            chart: {
                type: 'bar',
                height: 600
            },
            series: [{
                name: 'sales',
                data: @json($data)
            }],
            xaxis: {
                categories: @json($label)
            }
        }
        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script> --}}
@endsection
