@section('title',$title)
@section('description',$description)
@extends('layout.app')
@push('js')
    <script src="http://neowa.krapoex.com:8083/assets/js/jquery.min.js"></script>
    <script src="http://neowa.krapoex.com:8083/assets/js/socket.io.js"></script>
    <script>
        $(document).ready(function() {
            var socket = io('http://38.47.64.53:4011');

            socket.on('connection', function (socket) {
                console.log("connc");
            });

            socket.on('message', function(msg) {
                $('#data_logs').append($('<li class="list-group-item">').text(msg));
            });

            socket.on('qr', function(src) {
                $('#qrcode').attr('src', src);
                $('#qrcode').show();
            });

            socket.on('ready', function(data) {
                $('#qrcode').hide();
            });

            socket.on('authenticated', function(data) {
                $('#qrcode').hide();
            });
        });
    </script>
@endpush
@section('content')
<div class="crm mb-25">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">{{ trans('page_title.dashboard') }}</h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>{{ trans('page_title.dashboard') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <img src="" alt="QR Code" id="qrcode" class="img-fluid">
            <p>Engine Logs : </p>
            <ul class="list-group" id="data_logs">
                <!--<li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Cras justo odio</li>-->
                <li class="list-group-item">Menghubungkan Whatsapp Web ......</li></ul>
            @include('components.dashboard.demo_one.overview_cards')
            @include('components.dashboard.demo_one.sales_report')
            @include('components.dashboard.demo_one.sales_growth')
            @include('components.dashboard.demo_one.sales_location')
            @include('components.dashboard.demo_one.top_sale_products')
            @include('components.dashboard.demo_one.browser_state')

        </div>
    </div>
</div>
@endsection
