@extends('staff.st_layout')
@section('st_title')
<title>Khám cận lâm sàng</title>
@endsection
@section('st_add_css')

<link rel="stylesheet" href="{{ asset('staff/css/style_st_subclinical.css') }}">
@endsection
@section('st_content')
<div class="container-fluid pt-2 pb-4">
    <div class="row ml-1 mr-1 pt-3">
        <div class="col-md-12">
            <a href="{{URL::to('staff/subclinical_examination')}}" class="btn btn-info mt-2 mb-2">Danh sách chờ khám</a>
            <nav class="frames_subclinical">
                <div class="nav nav-tabs nav-receive" id="nav-tab" role="tablist">
                    {{-- <a class="nav-link link4" id="sieuam" href="{{URL::to('staff/subclinical_exam_sa')}}" role="tab"
                        aria-controls="nav-home" aria-selected="true">Siêu âm</a> --}}
                    <a class="nav-link link4 active" id="xetnghiem" href="#nav-contact" role="tab"
                        aria-controls="nav-contact" aria-selected="false">Xét nghiệm</a>
                </div>
            </nav>
            <div class="tab-content mt-3" id="nav-tabContent">
                <div class="tab-pane fade  " id="nav-home" role="tabpanel" aria-labelledby="sieuam">

                </div>
                <div class="tab-pane fade show active mt-3" id="nav-contact" role="tabpanel"
                    aria-labelledby="xetnghiem">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 pt-2 pb-2"
                                style="border-left: 2px solid #b1154a;border-right: 2px solid #b1154a;border-top: 2px solid #b1154a;">
                                <div class="row">
                                    <div class="col-md-1">
                                        <label for="">Mã BN</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="hoten" class="form-control" value="{{ 'BN' . sprintf('%05d',$dsxn->bn_ma) }}" disabled>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Họ tên</label>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" name="hoten" class="form-control" style="color:red;font-weight:bold;" value="{{ $dsxn->bn_ten }}" disabled>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Mã BHYT</label>
                                    </div>
                                    <div class="col-md-2">
                                        <?php 
                                        $baohiemyte='';
                                        foreach ($bhyt as $bhyte){
                                            if($bhyte->bn_ma == $dsxn->bn_ma){
                                                $baohiemyte=$bhyte->dt_ten.$bhyte->ql_so.$bhyte->nc_so.$bhyte->bhyt_maso;
                                            }
                                        }
                                        ?>
                                        <input type="text" class="form-control" name="bhyt" value="{{ $baohiemyte }}" style="color: #0077b6;font-weight:bold;" disabled>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-1">
                                        <label for="">Phòng</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="phong" value="{{ $dsxn->p_ten }}" disabled>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Giới tính</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="gtinh" value="{{ $dsxn->bn_gioitinh }}" disabled>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Năm sinh</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="gtinh" value="{{ $dsxn->bn_ngaysinh }}" disabled>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Tuổi</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="tuoi" value="{{ floor((time() - strtotime($dsxn->bn_ngaysinh)) / 31556926); }}" disabled>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    
                                </div>
                                <div class="row mt-1">
                                    
                                    <div class="col-md-1">
                                        <label for="">BS chỉ định</label>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="bsichidinh"  value="{{ $dsxn->cv_ten.' '.$dsxn->nv_ten }}" disabled>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Ngày chỉ định</label>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="ngaychidinh" value="{{ date('d-m-Y',strtotime($dsxn->ngaytaophieu)) }}" disabled>
                                    </div>
                                </div>


                            </div>
                            
                        </div>
                        <h3 class="text-center mt-2" style="font-weight:bold;color:#023e8a;">{{ $dsxn->cls_ten }}</h3>
                    </div>
                    <form action="{{URL::to('/staff/subclinical_exam/text_results')}}" method="POST">
                        @csrf
                    <div class="row mt-3">
                        <h3 class="ml-4" style="color:#005f73;font-weight:bold;">Kết quả xét nghiệm</h3>
                        <div class="col-md-12">
                            <input type="hidden" name="pcd_ma" value="{{ $dsxn->pcd_ma }}">
                            <input type="hidden" name="cls_ma" value="{{ $dsxn->cls_ma }}">
                            <textarea name="ketqua" id="editor1"  rows="100">
                                {!! $dsxn->cls_form !!}
                                </textarea>
                        </div>
                    </div>
                    {{-- <div class="row mt-2">
                        <div class="col-md-2">
                            <span style="font-weight:bold;">Kết luận</span>
                        </div>
                        <div class="col-md-10">
                            <textarea name="ketluancd" rows="2" class="form-control"></textarea>
                        </div>
                    </div> --}}
                    <div class="row mt-3">
                            <div class="col-md-9"></div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-success w-100">Hoàn tất xét nghiệm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    @endsection
    @section('st_add_js')
    <script>
    CKEDITOR.replace('editor1');
    $('#subclinical').addClass('highlight');
    $('#subclinical').addClass('active');
    </script>
    <script src="{{ asset('staff/js/st_subclinical.js') }}"></script>
    @endsection