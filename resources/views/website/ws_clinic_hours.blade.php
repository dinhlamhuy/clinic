@extends('website.ws_layout')
@section('ws_title')
<title>Khung giờ khám bệnh</title>
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
            <h2 style="padding-top:80px;padding-bottom:10px;padding-left:120px;font-weight:bold;color:#bb3e03;">KHUNG GIỜ KHÁM BỆNH</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1 col1"></div>
        <div class="col-md-10">
            <div class="khunggio mt-4">
                <center><i class="fa fa-clock-o" aria-hidden="true" style="font-size:40px;color:#e5989b;"></i>
                    <br>
                    <h4 style="color:#0096c7; font-weight:bold;">Giờ khám bệnh</h4>
                </center>
                <center>
                    <p>Tiếp nhận <span style="font-weight:bold;color:red;">24/7</span> - Từ thứ 2 đến thứ CN</p>
                </center>
                <div class="row mt-4">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3"><span class="float-right" style="font-weight:bold;color:;#6b705c">Sáng:</span></div>
                            <div class="col-md-9"><span>Từ 07:00 đến 11:30</span>&ensp;<span>(Riêng thứ 7 từ 07:30 đến 11:00)</span></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><span class="float-right" style="font-weight:bold;color:;#6b705c">Chiều:</span></div>
                            <div class="col-md-9"><span>Từ 13:00 đến 17:30</span>&ensp;<span>(Riêng thứ 7 chỉ khám buổi sáng)</span></div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
        <div class="col-md-1 col1"></div>
    </div>
</div>
@endsection
@section('ws_js')
@endsection