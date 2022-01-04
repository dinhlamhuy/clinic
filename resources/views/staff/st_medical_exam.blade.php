@extends('staff.st_layout')
@section('st_title')
    <title>Khám bệnh</title>
@endsection
@section('st_add_css')
    <link rel="stylesheet" href="{{ asset('staff/css/style_st_medical_examination.css') }}">
@endsection
@section('st_content')
    <div class="container-fluid pt-2">

        <div class="row ml-1 mr-1 pt-3">
            <div class="col-md-7 pt-2 pb-2"
                style="border-left: 2px solid #b1154a;border-right: 2px solid #b1154a;border-top: 2px solid #b1154a;">
                <!-- Thông tin bệnh nhân -->
                <div class=" row">
                    <div class="col-md-2">
                        
                                <label for="">Mã BN:</label>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control"
                                    value="{{ 'BN' . sprintf('%05d', $dsbenhnhan->bn_ma) }}" disabled>
                            </div>
                      
                  
                            <div class="col-md-2">
                                <label for="">Đối tượng:</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" disabled value="{{ $dsbenhnhan->lhk_ten }}" style="color: #0077b6;font-weight:bold;">
                            </div>
                            
                        
                </div>
                <div class=" row pt-1">
                    <div class="col-md-2">
                        
                                <label for="">Họ tên:</label>
                            </div>
                            <div class="col-md-5">
                                
                                <input type="text" class="form-control" name="hotenbn" value="{{ $dsbenhnhan->bn_ten }}" style="color:red; font-weight:bold;" disabled>
                            </div>
                        
                    
                
                            <div class="col-md-2">
                                <label for="">Mã BHYT:</label>
                            </div>
                            <?php $soBHYT='';
                            if($bhytmoi){
                                $soBHYT=$bhytmoi->dt_ten.$bhytmoi->ql_so.$bhytmoi->nc_so.$bhytmoi->bhyt_maso;
                            }
                            ?>
                            <div class="col-md-3">
                                <input type="text" disabled class="form-control" value="{{ $soBHYT }}">
                    </div>

                </div>
                <div class="row pt-1">
                    <div class="col-md-2">
                        <label for="">Năm sinh:</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" disabled value="{{ $dsbenhnhan->bn_ngaysinh }}">
                    </div>
                    <div class="col-md-1">Tuổi:</div>
                    <div class="col-md-2">
                        <input type="text" disabled  class="form-control" value="{{ floor((time() - strtotime($dsbenhnhan->bn_ngaysinh)) / 31556926) }}">
                    </div>
                    <div class="col-md-2">
                        <label for="">Giới tính:</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" disabled value="{{ $dsbenhnhan->bn_gioitinh }}">
                    </div>
                </div>
                <div class=" row pt-1">
                    <div class="col-md-2">
                                <label for="">Địa chỉ:</label>
                    </div>
                    <div class="col-md-10" >
                        <input type="text" class="form-control" disabled value="{{ $dsbenhnhan->bn_diachi.', '.$dsbenhnhan->x_ten.', '.$dsbenhnhan->h_ten.', '.$dsbenhnhan->tp_ten.'.' }}">
                    </div>
                </div>
                <div class="row pt-3">

                    <div class="col-md-12">
                        <!-- Button trigger modal -->


                        <!-- Modal -->
                        <div class="modal fade" id="chidinhcls" data-backdrop="static" data-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Chỉ định dịch vụ CLS</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="chidinhdichvu" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="mapkb" value="{{ $dsbenhnhan->pkb_ma }}">

                                                    <table width="100%" class="tbl_donthuoc">
                                                        <tr style="background-color:rgb(90, 230, 206);height:40px;">
                                                            <th class="text-center">Chọn</th>
                                                            <th class="text-center">Tên dịch vụ</th>
                                                            <th class="text-center">Giá BHYT</th>
                                                            <th class="text-center">Giá DV</th>
                                                        </tr>
                                                        {{-- <tr>
                                                            <td colspan="5" class="text-center"
                                                                style="background-color:#d8e2dc;">SIÊU ÂM</td>
                                                        </tr> --}}
                                                        <?php $tieude = ''; ?>
                                                        @foreach ($dscls as $clssieuam)
                                                            <?php if($clssieuam->ncls_ma != $tieude){?>
                                                            <tr>
                                                                <td colspan="5" class="text-center"
                                                                    style="background-color:#d8e2dc;">
                                                                    <b>{{ $clssieuam->ncls_ten }}</b>
                                                                </td>
                                                            </tr>

                                                            <?php $tieude=$clssieuam->ncls_ma;    } ?>

                                                            <tr>
                                                                <td class="text-center">
                                                                    <input type="checkbox" name="macls[]"
                                                                        value="{{ $clssieuam->cls_ma }}">
                                                                </td>
                                                                <td>{{ $clssieuam->cls_ten }}</td>

                                                                <td class="text-center">
                                                                    {{ $clssieuam->cls_giabhyt }}</td>
                                                                <td class="text-center">{{ $clssieuam->cls_giadv }}
                                                                </td>
                                                            </tr>
                                                            {{-- @if ($clssieuam->ncls_ma == '2')
                                                            @endif --}}
                                                            <?php
                                                            
                                                            ?>
                                                        @endforeach

                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Thoát</button>
                                                <button type="submit" class="btn btn-primary">Lưu</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col col-md-4 px-2">
                                <button type="button" class="btn btn-info w-100" data-toggle="modal"
                                    data-target="#chidinhcls">
                                    Chỉ định CLS
                                </button>
                            </div>
                            <div class="col col-md-4 px-2">

                                <button class="btn btn-secondary btn-info w-100" type="button" data-toggle="modal"
                                    data-target="#lichsukham">Lịch sử khám</button>
                                <div class="modal fade" id="lichsukham" data-backdrop="static" data-keyboard="false"
                                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="staticBackdropLabel">Hồ sơ bệnh án</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <?php $lan = 1; ?>
                                                        @foreach ($lichsukham as $lskham)
                                                            <div class="row">
                                                                <div class="col-md-7">
                                                                    <div class="row">
                                                                        <h3 class="ml-3 mb-2"><b style="color:#1d3557;background-color:skyblue;"><i class="fa fa-angle-double-right" aria-hidden="true">&ensp;</i>{{ 'Lần ' . $lan++ . ' - PKB' . sprintf('%05d', $lskham->pkb_ma) . ': ' . date('d/m/Y H:i:s', strtotime($lskham->ngaylap)) }}</b>
                                                                        </h3>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <b>Triệu chứng bệnh:</b>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            @foreach ($trieuchungcu as $tccu)
                                                                                @if ($tccu->pkb_ma == $lskham->pkb_ma)
                                                                                    {{ $tccu->b_ten . ', ' }}
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-4"><b>Chẩn đoán bệnh:</b>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            @foreach ($chandoancu as $cdcu)
                                                                                @if ($cdcu->pkb_ma == $lskham->pkb_ma)
                                                                                    {{ $cdcu->b_ten . ', ' }}
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-4"><b>Loại hình khám:</b>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            @foreach ($loaihinhkhamcu as $lhk)
                                                                                @if ($lhk->pkb_ma == $lskham->pkb_ma)
                                                                                    {{ $lhk->lhk_ten }}
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-4"><b>Cận lâm sàng:</b>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            @foreach ($clscu as $clsc)
                                                                                @if ($clsc->pkb_ma == $lskham->pkb_ma)
                                                                                <?php 
                                                                                if($clsc->ncls_ma=='1'){?>
                                                                                        <a target="_blank"
                                                                                        href="{{ url('staff/inphieuxetnghiem/' . $clsc->pcd_ma . '/' . $clsc->cls_ma) }}"
                                                                                        class="btn btn-info p-0 my-1">{{ $clsc->cls_ten }}</a>
                                                                                <?php }else if($clsc->ncls_ma=='2'){?>
                                                                                    <a target="_blank"
                                                                                    href="{{ url('staff/inphieusieuam/' . $clsc->pcd_ma . '/' . $clsc->cls_ma) }}"
                                                                                    class="btn btn-info p-0 my-1">{{ $clsc->cls_ten }}</a>

                                                                               <?php  }else if($clsc->ncls_ma=='3'){?>
                                                                                <a target="_blank"
                                                                                href="{{ url('staff/inphieunoisoi/' . $clsc->pcd_ma . '/' . $clsc->cls_ma) }}"
                                                                                class="btn btn-info p-0 my-1">{{ $clsc->cls_ten }}</a>
                                                                               <?php  }
                                                                                ?>
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-5" >
                                                                    <br>
                                                                    <h5 class="text-center"><b style="color: #e07a5f;">Chỉ số sức khỏe</b></h5>
                                                                    <div class="row" style="border-left: 2px solid #00b4d8;border-right: 2px solid #00b4d8;border-top: 2px solid #00b4d8;border-bottom: 2px solid #00b4d8;">
                                                                        @foreach ($chisocu as $cscu)
                                                                            @if ($cscu->pkb_ma == $lskham->pkb_ma)
                                                                                <div class="col-md-4">
                                                                                    <label><b>{{ $cscu->cs_ten }}:</b></label>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    {{ $cscu->ctcs_chitiet }}</div>
                                                                            @endif
                                                                        @endforeach

                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <table class="w-100 ml-1 mr-1">
                                                                        <tr>
                                                                            <th>STT</th>
                                                                            <th>Mã Thuốc</th>
                                                                            <th>Tên Thuốc</th>
                                                                            <th>Cách dùng</th>
                                                                            <th>Số lượng</th>
                                                                        </tr>
                                                                        <?php $i = 1; ?>
                                                                        @foreach ($donthuoccu as $toacu)
                                                                            @if ($toacu->pkb_ma == $lskham->pkb_ma)
                                                                                <tr>
                                                                                    <td>{{ $i++ }}</td>
                                                                                    <td>{{ $toacu->t_ma }}</td>
                                                                                    <td>{{ $toacu->t_ten }}</td>
                                                                                    <td>{{ $toacu->ctdt_lieudung }}</td>
                                                                                    <td>{{ $toacu->ctdt_soluong }}</td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <hr>
                                                            <br>
                                                        @endforeach


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Đóng</button>
                                                {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col col-md-4 px-2">

                                <form action="{{ URL::to('staff/hoanthanhdonthuoc') }}" method="post"
                                    onsubmit="return confirm('Bạn có chắc hoàn thành không?')">
                                    @csrf
                                    <input type="hidden" name="pkbenh_ma" value="{{ $dsbenhnhan->pkb_ma }}">
                                    <button type="submit" class="btn btn-secondary w-100 float-right btn-info">Hoàn tất
                                        khám</button>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- Thông tin sức khỏe -->
            <div class="col-md-5 pt-2 pb-2"
                style="border-left: 2px solid #b1154a;border-right: 2px solid #b1154a;border-top: 2px solid #b1154a;">
                <form id="chiso" method="post">
                    @csrf

                    <?php if(!$dschiso->isEmpty()){ ?>
                    <div class="row pt-3">
                        @foreach ($dschiso as $cs)
                            <div class="col-md-2 pt-3 ">
                                <label for="" class="">{{ $cs->cs_ten }}</label>
                            </div>
                            <div class="col-md-2 pt-3">
                                <input type="text" class="form-control" name="{{ $cs->cs_tukhoa }}"
                                    value="{{ $cs->ctcs_chitiet }}">
                            </div>
                        @endforeach
                    </div>
                    <?php } else { ?>
                    <div class="row pt-3">
                        <div class="col-md-2">
                            <label for="" class="pl-1">H.áp</label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="huyetap">
                        </div>
                        <div class="col-md-2">
                            <label for="">mmHg</label>
                        </div>
                        <div class="col-md-2">
                            <label for="" class="pl-2">Nhịp tim</label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="nhiptim">
                        </div>
                        <div class="col-md-2">
                            <label for="">lần/phút</label>
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-md-2">
                            <label for="" class="pl-1">C.nặng</label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="cannang">
                        </div>
                        <div class="col-md-2">
                            <label for="">kg</label>
                        </div>
                        <div class="col-md-2">
                            <label for="" class="pl-1">Nhiệt độ</label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="nhietdo">
                        </div>
                        <div class="col-md-2">
                            <label for="">độ C</label>
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-md-2">
                            <label for="" class="pl-1">C.cao</label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="chieucao">
                        </div>
                        <div class="col-md-2">
                            <label for="">cm</label>
                        </div>
                        <div class="col-md-2">
                            <label for="" class="pl-1">Nhóm máu</label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="nhommau" class="w-100 form-control">
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row pt-4">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <center><button type="submit" class="btn btn-secondary">Lưu chỉ số</button></center>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Toa thuốc -->
        <nav class="frames_medical_examination">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="prescription_BHYT" data-toggle="tab" href="#nav-toathuocbhyt" role="tab"
                    aria-controls="nav-home" aria-selected="true">Toa thuốc BHYT</a>
                {{-- <a class="nav-link" id="prescription" data-toggle="tab" href="#nav-toathuocle" role="tab"
                    aria-controls="nav-profile" aria-selected="false">Toa mua tại quầy</a> --}}
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-toathuocbhyt" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row ml-1 mr-1 mt-2">
                    <div class="col-md-12 mt-2 mb-2">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">BHYT còn: <span
                                        style="font-weight: bold; color:red;"><?php if ($bhyt) {
    echo floor(abs(strtotime($bhyt->bhyt_ngayketthuc) - strtotime(date('Y-m-d'))) / (60 * 60 * 24)) . ' Ngày';
} else {
    echo 'Không có';
} ?></span>
                                </label>
                            </div>
                        </div>
                        <form id="taodon" method="post" class="mt-2 pt-2">
                            @csrf
                            <div class="row mt-1">

                                <div class="col-md-1">
                                    <label for="">Triệu chứng</label>
                                </div>
                                <div class="col-md-9">
                                    {{-- <textarea name="" id="" rows="2" class="form-control" name="trieuchungls" ></textarea> --}}
                                    <select class="js-dstrieuchung js-states form-control" name="trieuchung[]"
                                        multiple="multiple">
                                        {{-- <option value="">Chọn triệu chứng</option> --}}
                                        @foreach ($trieuchungbenh as $tcbenh)
                                            <?php $selectcb=''; if (!$trieuchung->isEmpty()) { ?>

                                            @foreach ($trieuchung as $tchung)
                                            <?php if ($tchung->tcb_ma == $tcbenh->tcb_ma) {
                                                $selectcb='selected';
                                                
                                                }?>
                                            @endforeach
                                            <option value="{{ $tcbenh->tcb_ma }}" {{ $selectcb }}>
                                                {{ $tcbenh->tcb_ten }}</option>
                                            <?php }else{?>
                                            <option value="{{ $tcbenh->tcb_ma }}">
                                                {{ $tcbenh->tcb_ten }}</option>
                                            <?php }?>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-1">Chẩn đoán</div>
                                <div class="col-md-9">
                                    <select class="js-dschandoan js-states form-control" name="chandoan[]"
                                        multiple="multiple">
                                        @foreach ($dsbenh as $benh)
                                            <?php  $select='';  if (!$chuandoan->isEmpty()) { ?>
                                            @foreach ($chuandoan as $cdoan)
                                            <?php  if ($cdoan->b_ma == $benh->b_ma) {
                                                $select='selected';
                                                
                                                }?>
                                            @endforeach
                                            <option value="{{ $benh->b_ma }}"  {{ $select }}>{{ $benh->b_ten }}</option>
                                            <?php  }else{?>
                                            <option value="{{ $benh->b_ma }}">
                                                {{ $benh->b_ten }}</option>
                                            <?php }?>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-1">Bệnh phụ</div>
                                <div class="col-md-9">
                                    <select class="js-dsbenhphu js-states form-control" name="benhphu[]"
                                        multiple="multiple">
                                        @foreach ($dsbenh as $benh)
                                            <?php $selectbp=''; if (!$benhphu->isEmpty()) { ?>
                                            @foreach ($benhphu as $bphu)
                                            <?php if($bphu->b_ma == $benh->b_ma) {
                                                $selectbp='selected';
                                                
                                                }?>
                                            @endforeach
                                            <option value="{{ $benh->b_ma }}" {{ $selectbp }}>
                                                {{ $benh->b_ten }}</option>
                                            <?php }else{?>
                                            <option value="{{ $benh->b_ma }}">
                                                {{ $benh->b_ten }}</option>
                                            <?php }?>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-1">Lời dặn</div>
                                <div class="col-md-9">
                                    <textarea name="loidan" rows="2" class="form-control"><?php if (!empty($donthuoc->dthuoc_ma)) {
    echo $donthuoc->dthuoc_loidan;
} ?></textarea>
                                </div>
                                <div class="col-md-2 text-center">
                                    <button class="btn btn-info">Cập nhật</button>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-1">Lời hẹn</div>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" name="loihen" value="<?php if (!empty($donthuoc->dthuoc_ma)) {
    echo date('Y-m-d',strtotime($donthuoc->dthuoc_loihen));
} ?>">
                                </div>
                                <div class="col-md-2 text-center">
                                </div>
                            </div>
                            <!-- <div class="row mt-1 ">
                                                            <div class="col-md-5 ">
                                                                <button type="submit" class="float-right btn btn-success mt-0">Cập nhật</button>

                                                            </div>
                                                        </div> -->
                        </form>
                        <hr>
                        <div class="row mt-4">
                            <div class="col-md-12 ">
                                <table id="dsthuoc" class="display" style="width: 100%;">
                                    <thead>
                                        <tr class="tbl_header">
                                            <th class="text-center">Nhóm thuốc</th>
                                            <th class="text-center">Tên thuốc</th>
                                            <th class="text-center">Hoạt chất</th>
                                            <th class="text-center">ĐVT</th>
                                            <th class="text-center">Liều dùng</th>
                                            <th class="text-center">Cách dùng</th>
                                            <th class="text-center">Lô nhập</th>
                                            <th class="text-center">Số lượng</th>
                                            <th class="text-center">Hạn sử dụng</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dsthuoc as $thuoc)
                                            <tr>
                                                <td width="26%;">{{ $thuoc->nt_ten }}</td>
                                                <td width="20%;">{{ $thuoc->t_ten }}</td>
                                                <td width="20%;">{{ $thuoc->tg_ten }}</td>
                                                <td class="text-center" width="8%;">{{ $thuoc->dvtt_ten }}</td>
                                                <td width="9%;">{{ $thuoc->t_lieudung }}</td>
                                                <td width="10%;">{{ $thuoc->csd_ten }}</td>
                                                <td width="13%;">{{ 'LNT' . sprintf('%05d', $thuoc->lnt_ma) }}</td>
                                                <td width="9%;">{{ $thuoc->ctlnt_soluong }}</td>
                                                <td width="9%;">{{ $thuoc->ctlnt_hansudung }}</td>
                                                <td class="text-center" width="5%;">
                                                    <form method="post" class="bocthuoc">
                                                        @csrf
                                                        <input type="hidden" name="lnt_ma" class="lnt_ma"
                                                            value="{{ $thuoc->lnt_ma }}">
                                                        <input type="hidden" name="t_ma" class="t_ma"
                                                            value="{{ $thuoc->t_ma }}">
                                                        <button type="submit" class="btn btn-outline-success thuoc"><i
                                                                class="fa fa-check" aria-hidden="true"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center">Nhóm thuốc</th>
                                            <th class="text-center">Tên thuốc</th>
                                            <th class="text-center">Hoạt chất</th>
                                            <th class="text-center">ĐVT</th>
                                            <th class="text-center">Liều dùng</th>
                                            <th class="text-center">Cách dùng</th>
                                            <th class="text-center">Lô nhập</th>
                                            <th class="text-center">Số lượng</th>
                                            <th class="text-center">Hạn sử dụng</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-md-12">
                                <table class="tbl_donthuoc  mt-5" id="toathuoc" style="width: 100%;">
                                    <tr class="tbl_header">
                                        <th class="text-center">Stt</th>
                                        <th class="text-center">Thuốc</th>
                                        <th class="text-center">Liều dùng</th>
                                        <th class="text-center">CSD</th>
                                        <th class="text-center">SL</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        @if ($dsdonthuoc)
                                            @foreach ($dsdonthuoc as $donthuoc)
                                                <td width="5%" class="text-center"> {{ $donthuoc->mathuoc }}</td>
                                                <td width="30%">{{ $donthuoc->t_ten }}</td>
                                                <td width="30%">
                                                    <input type="text" value="{{ $donthuoc->ctdt_lieudung }}"
                                                        data-donthuoc="{{ $donthuoc->dthuoc_ma }}"
                                                        data-vitri="ctdt_lieudung" data-thuoc="{{ $donthuoc->t_ma }}"
                                                        class="soanthuoc form-control">
                                                </td>
                                                <td width="20%">{{ $donthuoc->csd_ten }}</td>
                                                <td width="10%" class="text-center">
                                                    <input type="number" value="{{ $donthuoc->ctdt_soluong }}"
                                                        data-donthuoc="{{ $donthuoc->dthuoc_ma }}"
                                                        data-vitri="ctdt_soluong" data-thuoc="{{ $donthuoc->t_ma }}"
                                                        min="1" class="soanthuoc form-control">
                                                </td>
                                                <td width="5%">
                                                    <button class="btn btn-outline-danger delete_thuoc"
                                                        data-donthuoc="{{ $donthuoc->dthuoc_ma }}"
                                                        data-thuoc="{{ $donthuoc->t_ma }}"><i class="fa fa-times"
                                                            aria-hidden="true"></i></button>
                                                </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            {{-- <div class="tab-pane fade" id="nav-toathuocle" role="tabpanel" aria-labelledby="nav-profile-tab">
                ...</div> --}}
        </div>
    </div>
@endsection
@section('st_add_js')
    <script src="{{ asset('staff/js/st_medical_examination.js') }}"></script>
    <script>
        $(document).on('submit', '.bocthuoc', function(e) {
            e.preventDefault();
            // alert($(this).input['type:hidden'].val());
            var form = new FormData($(this)[0]);
            form.append('pkb_ma', {{ $dsbenhnhan->pkb_ma }});
            form.append('lhk_ma', {{ $dsbenhnhan->lhk_ma }});
            $.ajax({
                url: '{{ url('staff/bocthuoc') }}',
                method: 'POST',
                data: form,
                processData: false,
                contentType: false,
            }).done(function(data) {
                // console.log(data);
                $('#toathuoc tr:last').after(
                    ' <tr>\
                                                                                                <td width="5%" class="text-center"> ' +
                    data
                    .t_ma + '</td>\
                                                                                                <td width="30%">' + data
                    .t_ten +
                    '</td>\
                                                                                                <td width="30%">\
                                                                                                    <input type="text" value="' +
                    data
                    .lieudung_ten +
                    '" data-donthuoc="' +
                    data.donthuoc + '" data-vitri="ctdt_lieudung" data-thuoc="' + data.t_ma + '" class="soanthuoc form-control">\
                                                                                                </td>\
                                                                                                <td width="20%">' + data
                    .csd_ten +
                    '</td>\
                                                                                                <td width="10%" class="text-center">\
                                                                                                    <input type="number" value="1" data-donthuoc="' +
                    data.donthuoc + '" data-vitri="ctdt_soluong" data-thuoc="' + data.t_ma +
                    '"  min="1" class="soanthuoc form-control">\
                                                                                                </td>\
                                                                                                <td width="5%">\
                                                                                                    <button data-donthuoc="' + data.donthuoc + '"  data-thuoc="' + data.t_ma + '" class="btn btn-outline-danger delete_thuoc" ><i class="fa fa-times"\
                                                                                                            aria-hidden="true"></i></button>\
                                                                                                </td>\
                                                                                            </tr>');
            });

        });
        $(document).on('submit', '#chiso', function(e) {
            e.preventDefault();
            // alert($(this).input['type:hidden'].val());
            var form = new FormData($(this)[0]);
            form.append('pkb_ma', {{ $dsbenhnhan->pkb_ma }});
            // form.append('lhk_ma', {{ $dsbenhnhan->lhk_ma }});
            $.ajax({
                url: '{{ url('staff/chiso') }}',
                method: 'POST',
                data: form,
                processData: false,
                contentType: false,
            }).done(function(data) {
                // console.log(data);
                Swal.fire({
                    icon: 'success',
                    title: 'Cập nhật chỉ số thành công',
                });
            });
        });
        $(document).on('blur', '.soanthuoc', function(e) {
            e.preventDefault();
            var vitri = $(this).attr("data-vitri");
            var thuoc = $(this).attr("data-thuoc");
            var donthuoc = $(this).attr("data-donthuoc");
            var noidung = $(this).val();
            $.ajax({
                url: '{{ url('staff/editthuoc') }}',
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    vitri: vitri,
                    thuoc: thuoc,
                    donthuoc: donthuoc,
                    noidung: noidung
                }
            }).done(function(data) {
                console.log(data);
                
            });
        });
        $(document).on('click', '.delete_thuoc', function(e) {
            e.preventDefault();
            var thuoc = $(this).attr("data-thuoc");
            var donthuoc = $(this).attr("data-donthuoc");
            var rowtr = $(this);
            $.ajax({
                url: '{{ url('staff/deletethuoc') }}',
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    thuoc: thuoc,
                    donthuoc: donthuoc,
                }
            }).done(function(data) {
                console.log(data);
                rowtr.closest('tr').remove();
            });
        });

        $(document).on('submit', '#taodon', function(e) {
            e.preventDefault();
            // alert($(this).input['type:hidden'].val());
            var form = new FormData($(this)[0]);
            form.append('pkb_ma', {{ $dsbenhnhan->pkb_ma }});

            $.ajax({
                url: '{{ url('staff/donthuoc') }}',
                method: 'POST',
                data: form,
                processData: false,
                contentType: false,
            }).done(function(data) {
                console.log(data);
                
                Swal.fire({
                    icon: 'success',
                    title: 'Tạo đơn thuốc thành công',
                });

            });
        });
        $(document).on('submit', '#chidinhdichvu', function(e) {
            e.preventDefault();
            var form = new FormData($(this)[0]);
            //             for (var value of form.values()) {
            //    console.log(value);
            // }
            $.ajax({
                url: '{{ url('staff/chidinhcls') }}',
                method: 'POST',
                data: form,
                processData: false,
                contentType: false,
            }).done(function(data) {
                console.log(data);
                $('#chidinhcls').modal('hide');
                $('#chidinhdichvu')[0].reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Chỉ định thành công',
                });
            });
        });
    </script>
@endsection
