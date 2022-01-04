@extends('website.ws_layout')
@section('ws_title')
<title>Bệnh nhân</title>
@endsection
@section('ws_css')
<style>
    .star {
        font-weight: bold;
        color: red;
    }
</style>
@endsection
@section('ws_content')
<div class="container" style="padding-bottom:200px;">
    <div class="row mt-3">
        <div class="col-md-5"></div>
        <div class="col-md-7 ">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lsdatlich">
                Lịch sử đặt lịch hẹn
            </button>
            <div class="modal fade" id="lsdatlich" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Lịch sử đặt lịch hẹn của bệnh nhân</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <?php $arrcolor=['#F2B950', '#D95F18', '#1A3873', '#8C3B3B','#3C7363','#BF3B84','#F2B950', '#D95F18', '#1A3873', '#8C3B3B','#3C7363','#BF3B84','#F2B950', '#D95F18', '#1A3873', '#8C3B3B','#3C7363','#BF3B84','#F2B950', '#D95F18', '#1A3873', '#8C3B3B','#3C7363','#BF3B84'];  
                        
                        ?>
                        @foreach($lslichhen as $lslh)
                      <div class="card p-0 mt-2">
                          <div class="card-body p-0">
                              <div class="row">
                                  <div class="col-md-4" style=" max-height:100px; display: flex;  flex-direction: column;  justify-content: center; text-align: center; vertical-align: middle; background-color: {{ $arrcolor['1'] }};">
                                    <span style="vertical-align: middle; font-weight: bold; color:white;  ">{{ date('d/m/Y',strtotime($lslh->lh_ngay)) }}</span>
                                  </div>
                                  <div class="col-md-8" style="max-height:100px; vertical-align: middle; background-color: white;">
                                    <div class="row mt-1">
                                        <div class="col-md-6 mt-1">Khung giờ: {{ $lslh->kg_khunggio }}</div>
                                        <div class="col-md-6 mt-1">Trạng thái: 
                                            <?php
                                                            if($lslh->ttlh_ma == '1'){
                                                    echo '<span  style="color:white;background-color:#c73866;padding:3px 3px 3px 3px;">'.$lslh->ttlh_ten.'</span>';
                                                }else if($lslh->ttlh_ma == '2'){
                                                    echo '<span  style="color:white;background-color:#428cd4;padding:3px 11px 3px 11px;">'.$lslh->ttlh_ten.'</span>';
                                                
                                                }else if($lslh->ttlh_ma == '3'){
                                                    echo '<span  style="color:white;background-color:#3eac0f;padding:3px 11px 3px 11px;">'.$lslh->ttlh_ten.'</span>';
                                                }
                                                else if($lslh->ttlh_ma == '4'){
                                                    echo '<span  style="color:white;background-color:#ac0f0f;padding:3px 11px 3px 11px;">'.$lslh->ttlh_ten.'</span>';
                                                }
                                                ?>
                                           </div>
                                        <div class="col-md-12 mt-1">Triệu chứng: <?php 
                                        $tchung='';
                                        foreach ($lstclichhen as $trieuchunglh) {
                                            if($lslh->lh_ma==$trieuchunglh->lh_ma){

                                                $tchung.=$trieuchunglh->tclh_ten.', ';
                                            }
                                        }
                                        echo $tchung;
                                        ?></div>
                                        <div class="col-md-12 "><span class="text-muted float-right" style="font-size: 12px;">{{ date('d/m/Y',strtotime($lslh->ngaydat)) }}</span></div>
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      @endforeach
                    
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                     
                    </div>
                  </div>
                </div>
              </div>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                Đăng ký khám bệnh
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Đăng ký đặt lịch hẹn khám bệnh</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ URL::to('/clinic/register_for_re_examination')}}" method="post">
                                @csrf
                                <input type="hidden" name="bn_ma" value="{{ $benhnhan->bn_ma}}">
                                <div class="row mt-1">

                                    <div class="col-md-12" style="border-left: 2px solid #b1154a;border-right: 2px solid #b1154a;border-top: 2px solid #b1154a;">
                                        <div class="row mt-1">
                                            <div class="col-md-7 ">
                                                <div class=" row">
                                                    <div class="col-md-3">
                                                        <label for="">Mã BN</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" value="{{ 'BN'.sprintf('%05d',$benhnhan->bn_ma)}}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 ">
                                            </div>

                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-7 ">
                                                <div class=" row">
                                                    <div class="col-md-3">
                                                        <label for="">Họ tên<span class="star">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control"  name="hoten" value="{{ $benhnhan->bn_ten }}" autocomplete="off" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 ">
                                                <!-- <div class=" row ">
                                                    <div class="col-md-3">
                                                        <label for="">Ngày khám</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" disabled>
                                                    </div>

                                                </div> -->
                                            </div>

                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-7 ">
                                                <div class=" row ">
                                                    <div class="col-md-3">
                                                        <label for="">Ngày sinh<span class="star">*</span></label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="date" class="form-control" style="font-size: 13px;" name="ngaysinh" value="{{ date('Y-m-d',strtotime($benhnhan->bn_ngaysinh)) }}" disabled>
                                                    </div>
                                                    <div class="col-md-1 px-0">
                                                        <label>Tuổi</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="number" class="form-control" value="{{ floor((time() - strtotime($benhnhan->bn_ngaysinh)) / 31556926); }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 ">
                                                <div class=" row ">
                                                    <div class="col-md-3">
                                                        <label for="">Lịch hẹn</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="date" class="form-control" name="lh_ngay" style="font-size: 14px;" value="{{date('Y-m-d')}}" min="{{date('Y-m-d')}}">

                                                    </div>
                                                    <div class="col-md-1">Giờ</div>
                                                    <div class="col-md-4">
                                                        <select name="kg_ma" class="form-control">
                                                            @foreach($dskhunggio as $khunggio)
                                                            <option value="{{ $khunggio->kg_ma }}">{{ $khunggio->kg_khunggio }}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-7 ">
                                                <div class=" row ">
                                                    <div class="col-md-3">
                                                        <label class="float-left">Ng.nghiệp</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select name="nghenghiep" class="form-control" disabled>

                                                            @foreach($dsnghenghiep as $nghenghiep)

                                                            <option value="{{$nghenghiep->nn_ma}}" <?php if ($nghenghiep->nn_ma == $benhnhan->nn_ma) {
                                                                                                        echo 'selected';
                                                                                                    } ?>>{{$nghenghiep->nn_ten}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 px-0">
                                                        <label for="">G.tính<span class="star">*</span></label>
                                                    </div>
                                                    <div class="col-md-3">

                                                        <input type="text" class="form-control" value="{{$benhnhan->bn_gioitinh}}" disabled>


                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <?php if (!$bnhan) { ?> --}}
                                                {{-- <div class="col-md-6 ">
                                                    <div class=" row ">
                                                        <div class="col-md-3 ">
                                                            <label for="">Số BHYT</label>
                                                        </div>
                                                        <div class="col-md-2 pr-1">

                                                            <input type="text" name="othunhat" class="form-control" value="" disabled>
                                                        </div>
                                                        <div class="col-md-2 px-1">
                                                            <input type="text" name="othuhai" class="form-control" value="" disabled>
                                                        </div>
                                                        <div class="col-md-2 px-1">

                                                            <input type="text" name="othuba" class="form-control" value="" disabled>
                                                        </div>
                                                        <div class="col-md-3 pl-1">
                                                            <input type="text" class="form-control" name="bhyt" value="" disabled>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            {{-- <?php } else { ?> --}}
                                                {{-- <div class="col-md-6 ">
                                                    <div class=" row ">
                                                        <div class="col-md-3 ">
                                                            <label for="">Số BHYT</label>
                                                        </div>
                                                        <div class="col-md-2 pr-1">

                                                            <input type="text" name="othunhat" class="form-control" value="{{ $benhnhan->otn_ten }}" disabled>
                                                        </div>
                                                        <div class="col-md-2 px-1">
                                                            <input type="text" name="othuhai" class="form-control" value="{{ $benhnhan->oth_so }}" disabled>
                                                        </div>
                                                        <div class="col-md-2 px-1">

                                                            <input type="text" name="othuba" class="form-control" value="{{ $benhnhan->otb_so }}" disabled>
                                                        </div>
                                                        <div class="col-md-3 pl-1">
                                                            <input type="text" class="form-control" name="bhyt" value="{{ $benhnhan->bhyt_maso }}" disabled>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            {{-- <?php } ?> --}}
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-7 ">
                                                <div class=" row ">
                                                    <div class="col-md-3">
                                                        <label for="">Số điện thoại</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="sdt" value="{{ $benhnhan->bn_sdt }}">
                                                    </div>
                                                    <div class="col-md-1 px-0">
                                                        <label for="">CMND</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="cmnd" value="{{ $benhnhan->bn_cmnd }}">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <?php if (!$bnhan) { ?> --}}
                                                {{-- <div class="col-md-6 ">
                                                    <div class=" row ">
                                                        <div class="col-md-3">
                                                            <label for="">Thời gian BHYT</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="date" class="form-control" style="font-size: 14px;" value="" name="ngaybdbhyt" disabled>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label for="">đến</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="date" class="form-control" style="font-size: 14px;" name="ngayktbhyt" value="" disabled>
                                                        </div>
                                                    </div>
                                                </div> --}}

                                            {{-- <?php  } else { ?> --}}
                                                {{-- <div class="col-md-6 ">
                                                    <div class=" row ">
                                                        <div class="col-md-3">
                                                            <label for="">Thời gian BHYT</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="date" class="form-control" style="font-size: 14px;" value="{{ $benhnhan->bhyt_ngaybatdau }}" name="ngaybdbhyt" disabled>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label for="">đến</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="date" class="form-control" style="font-size: 14px;" name="ngayktbhyt" value="{{ $benhnhan->bhyt_ngayketthuc }}" disabled>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            {{-- <?php } ?> --}}
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-7 ">
                                                <div class=" row ">
                                                    <div class="col-md-3">
                                                        <label for="">Quốc tịch</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" value="{{ $benhnhan->qt_ten }}" class="form-control" disabled>
                                                    </div>
                                                    <div class="col-md-1 px-0">
                                                        <label for="">D.Tộc</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" value="{{ $benhnhan->dtoc_ten }}" class="form-control" disabled>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="">Triệu chứng</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        @foreach($dstrieuchung as $trieuchung)
                                                        <label for="tc{{ $trieuchung->tclh_ma }}">
                                                            <input type="checkbox" name="trieuchung[]" id="tc{{ $trieuchung->tclh_ma }}" value="{{ $trieuchung->tclh_ma }}" >&ensp;{{ $trieuchung->tclh_ten }}</label>&emsp;
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-7 ">
                                                <div class=" row ">
                                                    <div class="col-md-3">
                                                        <label for="">Thành phố<span class="star">*</span></label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select name="thanhpho" id="thanhpho" class="thanhpho form-control">
                                                            <option selected>Chọn thành phố</option>
                                                            @foreach($dsthanhpho as $thanhpho)
                                                            <option value="{{$thanhpho->tp_ma}}" <?php if ($thanhpho->tp_ma == $benhnhan->tp_ma) {
                                                                                                        echo 'selected';
                                                                                                    }  ?>>{{$thanhpho->tp_ten}}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                    <div class="col-md-1 px-0">
                                                        <label class="">Huyện<span class="star">*</span></label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select name="huyen" id="huyen" class="form-control huyen">
                                                            <option value="{{$benhnhan->h_ten}}">{{$benhnhan->h_ten}}</option>

                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5"></div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-7 ">
                                                <div class=" row ">
                                                    <div class="col-md-3">
                                                        <label for="">Thị xã<span class="star">*</span></label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select name="xa" class="form-control xa" id="xa">
                                                            <option value="{{$benhnhan->x_ten}}">{{$benhnhan->x_ten}}</option>

                                                        </select>
                                                        <!-- <input type="text" name="thixa" class="form-control"> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 "></div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-7 ">
                                                <div class=" row ">
                                                    <div class="col-md-3">
                                                        <label for="">Địa chỉ cụ thể<span class="star">*</span></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea name="diachi" rows="2" class="form-control">{{ $benhnhan->bn_diachi }}</textarea>
                                                        <!-- <input type="text" name="diachi" class="form-control"> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 "></div>
                                        </div>
                                        <center class="mt-4">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                            <button type="submit" class="btn btn-primary">Đăng ký</button>
                                        </center>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
       
      
            <button class="btn btn-secondary " type="button" data-toggle="modal"
            data-target="#lichsukham">Lịch sử khám</button>
        <div class="modal fade" id="lichsukham" data-backdrop="static" data-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#0096c7;">
                        <h4 class="modal-title" id="staticBackdropLabel" style="font-weight:bold;color:white;">Hồ sơ bệnh án</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form id="loc_thongke" class="text-center mx-auto" method="post">
                                    <div class="row mb-3">
                                        <div class="col-md-1">
                                            <label class="mt-1">Từ: </label>
                                        </div>
                                        <div class="col-md-4 ">
                                            <input type="date" name="ngaybd" class="form-control " id="ngaybd" min="{{ date('Y-m-d',strtotime('2018-12-31'))}}" max="{{ date('Y-m-d')}}" required>
                                        </div>
                                      <div class="col-md-1">
                                          <label class="mt-1">Đến: </label>
                                      </div>
                                        <div class="col-md-4">
                                            <input type="date" name="ngaykt" class="form-control " id="ngaykt" min="{{ date('Y-m-d',strtotime('2018-12-31'))}}" max="{{ date('Y-m-d')}}" required>
                                        </div>
                                        <div class="col-md-2">
                                       
                                            <button type="submit" class="btn btn-info"><i class="fa fa-filter" aria-hidden="true">&ensp;</i>Tìm kiếm</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row" id="bangkq">
                            <div class="col-md-12">
                                <?php $lan = 1; ?>
                                @foreach ($lichsukham as $lskham)
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="row">
                                                <div class="col-md-12" style="background-color:#ade8f4">
                                                    <h4><b>{{ 'Lần ' . $lan++ . ' - PKB' . sprintf('%05d', $lskham->pkb_ma) . ': '. date('d/m/Y H:i:s',strtotime($lskham->ngaylap)) }}</b></h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4"><span>Loại hình khám:</span>
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
                                                <div class="col-md-4">
                                                    <span>Triệu chứng bệnh:</span>
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
                                                <div class="col-md-4"><span>Chẩn đoán bệnh:</span>
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
                                                <div class="col-md-4"><span>Bệnh phụ:</span>
                                                </div>
                                                <div class="col-md-8">
                                                    @foreach ($benhphu as $bp)
                                                        @if ($bp->pkb_ma == $lskham->pkb_ma)
                                                            {{ $bp->b_ten . ', ' }}
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4"><span>Lời dặn:</span>
                                                </div>
                                                <div class="col-md-8">
                                                    @foreach ($loidan as $ld)
                                                    @if ($ld->pkb_ma == $lskham->pkb_ma)
                                                        {{ $ld->dthuoc_loidan }}
                                                    @endif
                                                @endforeach
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4"><span>Lịch hẹn:</span>
                                                </div>
                                                <div class="col-md-8">
                                                        @foreach ($loidan as $lh)
                                                        @if ($lh->pkb_ma == $lskham->pkb_ma)
                                                            {{ $lh->dthuoc_loihen }}
                                                        @endif
                                                    @endforeach
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-md-5">
                                            <br>
                                            <span style="font-size: 20px;color:#005f73;font-weight:bold;">Chỉ số sức khỏe</span>
                                            <div class="row">
                                                @foreach ($chisocu as $cscu)
                                                @if ($cscu->pkb_ma == $lskham->pkb_ma)
                                                <div class="col-md-4">
                                                    <label>{{ $cscu->cs_ten }}:</label>
                                                </div>
                                                <div class="col-md-2">{{ $cscu->ctcs_chitiet }}</div>
                                                @endif
                                                @endforeach                                           
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <table class="w-100 ml-1 mr-1 table">
                                                <tr>
                                                    <th class="text-center">STT</th>
                                                    <th class="text-center">Tên Thuốc</th>
                                                    <th class="text-center">Cách dùng</th>
                                                    <th class="text-center">Số lượng</th>
                                                </tr>
                                                <?php $i = 1; ?>
                                                @foreach ($donthuoccu as $toacu)
                                                    @if ($toacu->pkb_ma == $lskham->pkb_ma)
                                                        <tr>
                                                            <td class="text-center">{{ $i++ }}</td>
                                                            <td>{{ $toacu->t_ten }}</td>
                                                            <td>{{ $toacu->ctdt_lieudung }}</td>
                                                            <td class="text-center">{{ $toacu->ctdt_soluong }}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr style="background-color:red;">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <center>
                            <button type="button" class="btn btn-secondary text-center"  data-dismiss="modal">Đóng</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
            <a href="{{URL::to('/clinic/logout_patient')}}" class="btn btn-secondary">Thoát <i class="fa fa-sign-in" aria-hidden="true"></i></a>

        </div>
    </div>
    <div class="row mt-3 ">
        <div class="col-md-12 " style="border-left: 2px solid #b1154a;border-right: 2px solid #b1154a;border-top: 2px solid #b1154a;border-bottom: 2px solid #b1154a;">
            <div class="row" style="margin-top:50px;">
                <div class="col-md-12 text-center">
                    <h3 style="font-weight:bold;color:#023e8a;">THÔNG TIN BỆNH NHÂN</h3>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-2">
                    <label for="" class="chu">Mã bệnh nhân:</label>
                </div>
                <div class="col-md-4">
                    <span style="font-weight:bold; color:#0096c7;">{{ 'BN'.sprintf('%05d',$benhnhan->bn_ma)}}</span>
                </div>
        
            </div>
            
            <div class="row mt-3">
                <div class="col-md-2">
                    <label for="" class="chu" >Tên bệnh nhân:</label>
                </div>
                <div class="col-md-3">
                    <span style="font-weight:bold;color:red;">{{$benhnhan->bn_ten}}</span>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4">
                    <label for="" class="chu">Nghề nghiệp:</label>&emsp;
                    <span style="padding-left:60px;">{{ $benhnhan->nn_ten }}</span>
        
                </div>
                <div class="col-md-4">
                    <label for="" class="chu">Dân tộc:</label>&emsp;
                    <span style="padding-left:45px;">{{$benhnhan->dtoc_ten}}</span>
                </div>
                <div class="col-md-4">
                    <label for="" class="chu">Quốc tịch:</label>&emsp;
                    <span >{{$benhnhan->qt_ten}}</span>
        
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="" class="chu">Giới tính:</label>
                    <span style="margin-left:110px;">{{$benhnhan->bn_gioitinh}}</span>
                </div>
                <div class="col-md-4">
                    <label for="" class="chu">Ngày sinh</label>&emsp;
                    <span style="margin-left:30px;">{{date('d/m/Y',strtotime($benhnhan->bn_ngaysinh))}}</span>
        
                </div>
                <div class="col-md-4">
                    <label for="" class="chu">Tuổi:</label>&emsp;
                    <span style="margin-left:40px;">{{ floor((time() - strtotime($benhnhan->bn_ngaysinh)) / 31556926); }}</span>
        
                </div>
        
            </div>
            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="" class="chu">Số điện thoại:</label>
                    <span style="margin-left:70px;">{{$benhnhan->bn_sdt}}</span>
                </div>
                <div class="col-md-8">
                    <label for="" class="chu">Email:</label>&emsp;
                    <span style="margin-left:60px;">{{$benhnhan->bn_email}}</span>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-2">
                    <label for="" class="chu">Địa chỉ:</label>
                </div>
                <div class="col-md-10"><span >{{$benhnhan->bn_diachi.' '.$benhnhan->x_ten.', '.$benhnhan->h_ten.', '. $benhnhan->tp_ten}}</span></div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('ws_js')
<script>
    $(document).ready(function() {
        $(document).on('submit', '#loc_thongke', function(e){
    e.preventDefault();
    var ngaybd=$('#ngaybd').val();
    var ngaykt=$('#ngaykt').val();
    if(ngaybd >= ngaykt){
        alert('Ngày bắt đầu không được lớn hơn hoặc bằng ngày kết thúc của kết quả tìm kiếm!');

    }else {
    var bangkq=$('#bangkq');
    var data = new FormData(this);
    data.append('bn_ma', {{ $benhnhan->bn_ma }});
    $.ajax({
                    url: "{{ url('/clinic/lichsukham') }}",
                    method: "POST",
                    data: data,
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        bangkq.html(data.output);
                        // console.log('thành công');
                    }
                });
    }
});
    $('#thanhpho').change(function(event) {
        event.preventDefault();

        let thanhpho = $('#thanhpho').val();
        $.ajax({
            method: "POST",
            url: "{{ url('clinic/loadquanhuyen') }}",
            data: {
                tp_ma: thanhpho
            }
        }).done(function(msg) {
            if (msg.data) {
                html = "<option>Chọn quận huyện</option>"
                $.each(msg.data, function(index, value) {
                    html += "<option value='" + value.h_ma + "'>" + value.h_ten + "</option>";
                })
                $('#huyen').html('').append(html);
            }
        })
    });



    $('#huyen').change(function(event) {
        event.preventDefault();

        let huyen = $('#huyen').val();
        $.ajax({
            method: "POST",
            url: "{{ url('clinic/loadthixa') }}",
            data: {
                h_ma: huyen
            }
        }).done(function(msg) {
            if (msg.data) {
                html = "<option>Chọn thị xã</option>"
                $.each(msg.data, function(index, value) {
                    html += "<option value='" + value.x_ma + "'>" + value.x_ten + "</option>";
                })
                $('#xa').html('').append(html);
            }
        })
    });
    <?php
    $mess = session()->get('thongbao');
    $icon = '';
    $tb = '';
    if ($mess == 'Đăng ký thành công') {
        $icon = 'success';
        $tb = 'Đăng ký thành công';
    }
    if ($mess == 'Đăng nhập thành công') {
        $icon = 'success';
        $tb = 'Đăng nhập thành công';
    }
    if ($mess) {


    ?>
        Swal.fire(
            '<?= $tb ?>',
            'Vui lòng chờ nhân viên xác nhận',
            '<?= $icon ?>'

        )
    <?php session()->put('thongbao', null);
    }
    ?>

    
   
    <?php
    $messs = session()->get('tbao');
    $icons = '';
    $tbs = '';
    
    if ($messs == 'Đăng nhập thành công') {
        $icons = 'success';
        $tbs = 'Đăng nhập thành công';
    }
    if ($messs) {


    ?>
        Swal.fire(
            '<?= $tbs ?>',
            'Nhớ không để lộ thông tin của bản thân nha',
            '<?= $icons ?>'

        )
    <?php session()->put('tbao', null);
    }
    ?>

    
    });
</script>
@endsection