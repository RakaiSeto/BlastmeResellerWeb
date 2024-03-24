@section('title',$title)
@section('description',$description)
@extends('layout.app')
@push('js')
    <script src="http://neowa.krapoex.com:8083/assets/js/jquery.min.js"></script>
    <script src="http://neowa.krapoex.com:8083/assets/js/socket.io.js"></script>
    <script>
        $(document).ready(function () {
            buttons = document.querySelectorAll('.btn-scan');
            buttons.forEach(function (button) {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                })
            });

            // var socket = io('http://38.47.64.53:4011');
            //
            // socket.on('connection', function (socket) {
            //     console.log("connc");
            // });
            //
            // socket.on('message', function (msg) {
            //     $('#data_logs').append($('<li class="list-group-item">').text(msg));
            // });
            //
            // socket.on('qr', function (src) {
            //     $('#qrcode').attr('src', src);
            //     $('#qrcode').show();
            // });
            //
            // socket.on('ready', function (data) {
            //     $('#qrcode').hide();
            // });
            //
            // socket.on('authenticated', function (data) {
            //     $('#qrcode').hide();
            // });
        });
    </script>
@endpush
@section('content')
    <div class="crm mb-25">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">{{$title}}
                    </div>
                </div>
                <div class="row">
{{--                    @foreach($nodes as $key => $node)--}}
{{--                        <div class="col-lg-4 col-md-6">--}}
{{--                            <div class="card card-block card-stretch card-height nodes-card">--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="d-flex justify-content-between w-100 align-items-center gap-2">--}}
{{--                                        <h6 class="mb-0">Node {{ $key+1 }}</h6>--}}
{{--                                        @if($node->is_scanned == 1)--}}
{{--                                            <span class="rounded-pill bg-success text-bg-success flex-1">$node->phone</span>--}}
{{--                                        @elseif($node->health != 'yes')--}}
{{--                                            <span--}}
{{--                                                class="rounded-pill bg-danger text-bg-danger flex-1">Offline</span>--}}
{{--                                        @else--}}
{{--                                            <span--}}
{{--                                                class="rounded-pill bg-warning text-bg-warning flex-1 text-center text-white" style="font-size: 11px; padding: 0 6.64px; line-height: 20px; height: 20px"">Available</span>--}}
{{--                                        @endif--}}
{{--                                        @if($node->is_scanned == 0 && $node->health == 'yes')--}}
{{--                                            <a href="#" class="btn btn-sm btn-info flex-1 btn-scan"--}}
{{--                                               style="font-size: 11px; padding: 0 6.64px; line-height: normal; height: 20px">Scan--}}
{{--                                                Node</a>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
                    @foreach($nodes as $key => $node)
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Scan</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>
                                        @if($node->is_scanned == 1)
                                            <span class="rounded-pill bg-success text-bg-success flex-1 text-center text-white" style="font-size: 14px; padding: 0 6.64px; line-height: 20px; height: 20px">$node->phone</span>
                                        @elseif($node->health != 'yes')
                                            <span
                                                class="rounded-pill bg-danger text-bg-danger flex-1 text-center text-white" style="font-size: 14px; padding: 0 6.64px; line-height: 20px; height: 20px">Offline</span>
                                        @else
                                            <span
                                                class="rounded-pill bg-warning text-bg-warning flex-1 text-center text-white" style="font-size: 14px; padding: 0 6.64px; line-height: 20px; height: 20px">Available</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($node->is_scanned == 1 && $node->health == 'yes')
                                            {{ $node->phobe }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($node->is_scanned == 0 && $node->health == 'yes')
                                            <a href="#" class="btn btn-sm btn-info flex-1 btn-scan"
                                               style="font-size: 14px; padding: 0 6.64px; line-height: normal; height: 20px">Scan
                                                Node</a>
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
