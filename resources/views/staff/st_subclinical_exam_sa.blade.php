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
                    <a class="nav-link  active link4" id="sieuam" data-toggle="tab" href="#nav-home" role="tab"
                        aria-controls="nav-home" aria-selected="true">Siêu âm</a>
                    {{-- <a class="nav-link link4 disable" id="xetnghiem" href="{{URL::to('staff/subclinical_exam_xn')}}"
                        role="tab" aria-controls="nav-contact" aria-selected="false">Xét nghiệm</a> --}}
                </div>
            </nav>
            <div class="tab-content mt-3" id="nav-tabContent">
                <div class="tab-pane fade show active " id="nav-home" role="tabpanel" aria-labelledby="sieuam">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 pt-2 pb-2"
                                style="border-left: 2px solid #b1154a;border-right: 2px solid #b1154a;border-top: 2px solid #b1154a;">
                                <div class="row">
                                    <div class="col-md-1">
                                        <label for="">Mã BN</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="hoten" class="form-control" value="{{ 'BN' . sprintf('%05d',$dssa->bn_ma) }}" disabled>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Họ tên</label>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" name="hoten" class="form-control" style="color:red;font-weight:bold;" value="{{ $dssa->bn_ten }}" disabled>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">BHYT</label>
                                    </div>
                                    <div class="col-md-2">
                                        <?php 
                                        $baohiemyte='';
                                        foreach ($bhyt as $bhyte){
                                            if($bhyte->bn_ma == $dssa->bn_ma){
                                                $baohiemyte=$bhyte->dt_ten.$bhyte->ql_so.$bhyte->nc_so.$bhyte->bhyt_maso;
                                            }
                                        }
                                        ?>
                                        <input type="text" class="form-control" name="bhyt" value="{{ $baohiemyte }}" disabled style="color: #0077b6;font-weight:bold;">
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-1">
                                        <label for="">Phòng</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="phong" value="{{ $dssa->p_ten }}" disabled>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Năm sinh</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="namsinh" value="{{ $dssa->bn_ngaysinh }}" disabled>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Giới tính</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="gtinh" value="{{ $dssa->bn_gioitinh }}" disabled>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Tuổi</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="tuoi" value="{{ floor((time() - strtotime($dssa->bn_ngaysinh)) / 31556926); }}" disabled>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-1">
                                        <label for="">BS chỉ định</label>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="bsichidinh"  value="{{ $dssa->cv_ten.' '.$dssa->nv_ten }}" disabled>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">Ngày chỉ định</label>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="ngaychidinh" value="{{ date('d-m-Y',strtotime($dssa->ngaytaophieu)) }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-center mt-2" style="font-weight:bold;color:#023e8a;">SIÊU ÂM Ổ BỤNG TỔNG QUÁT</h3>
                        <form action="{{URL::to('/staff/subclinical_exam/kq_sieuam')}}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="pcd_ma" value="{{ $dssa->pcd_ma }}">
                            <input type="hidden" name="cls_ma" value="{{ $dssa->cls_ma }}">
                        <div class="row mt-3">
                            <h3 class="ml-4" style="color:#005f73;font-weight:bold;">Chụp và lưu hình ảnh</h3>
                            <div class="col-md-12"
                                style="border-left: 2px solid #b1154a;border-right: 2px solid #b1154a;border-top: 2px solid #b1154a;">
                                <div class="row">
                                    {{-- <div class="col-md-8" style="border-right: 2px solid #b1154a;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <center>
                                                    <div class="anhsa"></div>
                                                </center>
                                            </div>
                                            <div class="col-md-6">
                                                <center>
                                                    <div class="anhsa"></div>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        tự tạo cái input ảnh cho em đi=))))
                                    </div> --}}
                                    <div class="col-md-12">
                                        <div id="preview"></div>
                                        <input type="file" name="anhsieuam[]" id="anhsieuam" multiple="multiple">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                        <h3 class="ml-4" style="color:#005f73;font-weight:bold;">Kết quả siêu âm</h3>
                            <div class="col-md-12">
                                <textarea name="ketquasa" id="editor1" cols="30" rows="30">
                                    {!! $dssa->cls_form !!}
                                </textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <span style="font-weight:bold;">Kết luận</span>
                            </div>
                            <div class="col-md-10">
                                <textarea name="ketluancd" rows="2" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-9"></div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-success w-100">Hoàn tất</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="tab-pane fade mt-3" id="nav-contact" role="tabpanel" aria-labelledby="xetnghiem">
                </div>
            </div>
        </div>

    </div>
    @endsection
    @section('st_add_js')
    <script>
    $('#subclinical').addClass('highlight');
    $('#subclinical').addClass('active');

    CKEDITOR.replace('editor1');

    function previewImages() {

var $preview = $('#preview').empty();
if (this.files) $.each(this.files, readAndPreview);

function readAndPreview(i, file) {
  
  if (!/\.(jpe?g|png|gif|jpg)$/i.test(file.name)){
    $('#anhsieuam').val('');
    return alert(file.name +" không phải hình ảnh");
  } else {

  var reader = new FileReader();

  $(reader).on("load", function() {
    $preview.append($("<img/>", {src:this.result, height:200, width:200}));
  });

  reader.readAsDataURL(file);
  }
  
  
}

}

$('#anhsieuam').on("change", previewImages);
    </script>
    <script src="{{ asset('staff/js/st_subclinical.js') }}"></script>
    @endsection