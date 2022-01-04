@extends('website.ws_layout')
@section('ws_title')
<title>Quy trình khám bệnh</title>
@endsection
@section('ws_css')
<style>
.radien {
    background-color: #e8e8e4;
    background-image: linear-gradient(180deg, #fcd5ce, #90e0ef);
}

.col1 {
    background-color: #f8edeb;
}
</style>
@endsection
@section('ws_content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 radien">
            <h2 style="padding-top:80px;padding-bottom:10px;padding-left:120px;font-weight:bold;color:#bb3e03;">QUY TRÌNH KHÁM BỆNH</h2>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-1 col1"></div>
        <div class="col-md-10">
            <div class="row mt-2">
                <div class="col-md-8 text-center">
                    <img src="{{asset('website/images/quitrinh.png')}}" >
                </div>
                <div class="col-md-4">
                    <img src="{{asset('website/images/congthongtindientuphapdien.png')}}" >
                    <img class="mt-2" src="{{asset('website/images/khaosatkhachhang.png')}}" >
                </div>
            </div>
        </div>
        <div class="col-md-1 col1"></div>
</div>
@endsection
@section('ws_js')
@endsection