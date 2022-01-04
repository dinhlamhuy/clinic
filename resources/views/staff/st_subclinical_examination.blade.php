@extends('staff.st_layout')
@section('st_title')
    <title>Khám bệnh</title>
@endsection
@section('st_add_css')
    <link rel="stylesheet" href="{{ asset('staff/css/style_st_subclinical.css') }}">
@endsection
@section('st_content')
    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-md-12 px-0 mx-0">
                <nav class="frames_medical_examination">
                    <div class="nav nav-tabs nav-receive " id="nav-tab" role="tablist">
                        <a class="nav-link active link4" id="waitting_list" data-toggle="tab" href="#nav-dschokham"
                            role="tab" aria-controls="nav-profile" aria-selected="false">Danh sách chờ khám</a>
                        <a class="nav-link link4" id="appointment_schedule" data-toggle="tab" href="#nav-dsdakham" role="tab"
                            aria-controls="nav-home" aria-selected="true">Danh sách đã khám</a>

                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade mt-4 active show" id="nav-dschokham" role="tabpanel"
                        aria-labelledby="nav-profile-tab">
                        <table id="listchokham" class="display" style="width:100%">
                            <thead>
                                <tr class="tbl_header">
                                    <th class="text-center">Mã BN</th>
                                    <th class="text-center">Họ tên</th>
                                    <th class="text-center">Giới tính</th>
                                    <th class="text-center">Năm sinh</th>
                                    <th class="text-center">Phòng</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                        if(session()->get('p_ma')=='8'){
                        $sieuam='';  
                        ?>
                                @foreach ($dsphieuchidinh_sa as $phieusa)
                                    <?php if(empty($phieusa->ctcd_ketquachidinh)){ if($phieusa->pkb_ma != $sieuam ){
                             ?>
                                    <tr>
                                        <td width="10%;" class="text-center">
                                            {{ 'BN' . sprintf('%05d', $phieusa->bn_ma) }}</td>
                                        <td width="25%;">{{ $phieusa->bn_ten }}</td>
                                        <td width="10%;" class="text-center">{{ $phieusa->bn_gioitinh }}</td>
                                        <td width="10%;" class="text-center">{{ $phieusa->bn_ngaysinh }} </td>
                                        <td width="25%;" class="text-center">
                                            {{ $phieusa->p_ma . '-' . $phieusa->p_ten }}
                                        </td>
                                        <td width="12%;" class="text-center">{{ $phieusa->bn_gioitinh }}</td>
                                        <td width="8%;" class="text-center">
                                            {{-- <a href="{{url('staff/subclinical_exam/sa/'.$phieusa->pcd_ma)}}" class="btn btn-success ">
                                        <i class="fa fa-check" aria-hidden="true"></i></a> --}}
                                            <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#sieuam{{ $phieusa->pcd_ma }}">
                                                <i class="fa fa-list" aria-hidden="true"></i>
                                            </button>
                                            <div class="modal fade" id="sieuam{{ $phieusa->pcd_ma }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Thông tin siêu
                                                                âm</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-striped w-100">
                                                                <thead class="thead-dark">
                                                                    <tr>
                                                                        <th>STT</th>
                                                                        <th>Tên cận lâm sàng</th>
                                                                        <th>Trạng thái</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $i = 1; ?>
                                                                    @foreach ($dsphieuchidinh_sa as $tencls)
                                                                        <?php  if($tencls->pcd_ma ==$phieusa->pcd_ma ){ ?>
                                                                        <tr>
                                                                            <td>{{ $i++ }}</th>
                                                                            <td>{{ $tencls->cls_ten }}</th>

                                                                            <td>
                                                                                <?php
                                                                
                                                            if(!empty($tencls->ctcd_ketquachidinh)){?>
                                                                                <a target="_blank"
                                                                                    href="{{ url('staff/inphieusieuam/' . $tencls->pcd_ma . '/' . $tencls->cls_ma) }}"
                                                                                    class="btn ">
                                                                                    Xem phiếu</a>
                                                                                <?php   }else {?>

                                                                                <a href="{{ url('staff/subclinical_exam/sa/' . $tencls->pcd_ma . '/' . $tencls->cls_ma) }}"
                                                                                    class="btn btn-success ">
                                                                                    <i class="fa fa-check"
                                                                                        aria-hidden="true"></i></a>
                                                                                <?php } 
                                                           ?>

                                                                            </td>
                                                                        </tr>
                                                                </tbody>
                                                                <?php } ?>
                                @endforeach
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                    </div>
                </div>
            </div>
        </div>
        </td>
        </tr>
        <?php
                        }
                            $noisoi = $phieusa->pkb_ma;
                      }
                        ?>
        @endforeach

        <?php }  if(session()->get('p_ma')=='9'){ $xetnghiem=''; ?>
        @foreach ($dsphieuchidinh_xn as $phieuxn)

            <?php
             if(empty($phieuxn->ctcd_ctthuchien)){ if($phieuxn->pkb_ma != $xetnghiem ){?>
            <tr>
                <td width="10%;" class="text-center">{{ 'BN' . sprintf('%05d', $phieuxn->bn_ma) }}</td>
                <td width="25%;">{{ $phieuxn->bn_ten }}</td>
                <td width="10%;" class="text-center">{{ $phieuxn->bn_gioitinh }}</td>
                <td width="10%;" class="text-center">{{ $phieuxn->bn_ngaysinh }} </td>
                <td width="25%;" class="text-center">{{ $phieuxn->p_ma . '-' . $phieuxn->p_ten }}</td>
                <td width="12%;" class="text-center">{{ $phieuxn->bn_gioitinh }}</td>
                <td width="8%;" class="text-center">
                    {{-- <?php if($phieuxn->ctcd_ctthuchien){
                                        echo 'Đã xét nghiệm';
                                    } else {?>
                                    <a class="btn btn-success " href="{{url('staff/subclinical_exam/xn/'.$phieuxn->pcd_ma)}}"><i class="fa fa-check"
                                            aria-hidden="true"></i></a>
                                   <?php } ?> --}}

                    <button type="button" class="btn btn-success" data-toggle="modal"
                        data-target="#xetnghiem{{ $phieuxn->pcd_ma }}">
                        <i class="fa fa-list" aria-hidden="true"></i>
                    </button>
                    <div class="modal fade" id="xetnghiem{{ $phieuxn->pcd_ma }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Thông tin siêu âm</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-striped w-100">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên cận lâm sàng</th>
                                                <th>Trạng thái</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($dsphieuchidinh_xn as $tencls)
                                                <?php  if($tencls->pcd_ma ==$phieuxn->pcd_ma ){ ?>
                                                <tr>
                                                    <td>{{ $i++ }}</th>
                                                    <td>{{ $tencls->cls_ten }}</th>

                                                    <td>
                                                        <?php
                                                        
                                                    if(!empty($tencls->ctcd_ctthuchien)){?>
                                                        <a target="_blank"
                                                            href="{{ url('staff/inphieuxetnghiem/' . $tencls->pcd_ma . '/' . $tencls->cls_ma) }}"
                                                            class="btn ">
                                                            Xem phiếu</a>
                                                        <?php 
                                                        // echo 'Đã Xét nghiệm';
                                                     }else {?>

                                                        <a href="{{ url('staff/subclinical_exam/xn/' . $tencls->pcd_ma . '/' . $tencls->cls_ma) }}"
                                                            class="btn btn-success ">
                                                            <i class="fa fa-check" aria-hidden="true"></i></a>
                                                        <?php } 
                                                   ?>

                                                    </td>
                                                </tr>
                                        </tbody>
                                        <?php } ?>
        @endforeach
        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>

    </div>
    </div>
    </div>
    </div>
    </td>
    </tr>
    <?php   }
                            $xetnghiem=$phieuxn->pkb_ma;
  }
                        ?>
    @endforeach
    <?php } ?>

    <?php
                        if(session()->get('p_ma')=='10'){
                        $noisoi='';
                        
                        ?>
    @foreach ($dsphieuchidinh_ns as $phieuns)
        <?php
        // $kq='';
        //                 foreach ($dsphieuchidinh_ns as $tencls){
        //                   if($tencls->pcd_ma ==$phieuns->pcd_ma ){
        //                     if(empty($tencls->ctcd_ketquachidinh)){
        //                       $kq=1;
        //                     }
        //                   }
        //                 }
        if(empty($phieuns->ctcd_ketquachidinh)){
        if($phieuns->pkb_ma != $noisoi ){
                          

                             
                             ?>
        <tr>
            <td width="10%;" class="text-center">{{ 'BN' . sprintf('%05d', $phieuns->bn_ma) }}</td>
            <td width="25%;">{{ $phieuns->bn_ten }}</td>
            <td width="10%;" class="text-center">{{ $phieuns->bn_gioitinh }}</td>
            <td width="10%;" class="text-center">{{ $phieuns->bn_ngaysinh }} </td>
            <td width="25%;" class="text-center">{{ $phieuns->p_ma . ' - ' . $phieuns->p_ten }}</td>
            <td width="12%;" class="text-center">{{ $phieuns->bn_gioitinh }}</td>
            <td width="8%;" class="text-center">
                {{-- <a href="{{url('staff/subclinical_exam/sa/'.$phieuns->pcd_ma)}}" class="btn btn-success ">
                                        <i class="fa fa-check" aria-hidden="true"></i></a> --}}
                <button type="button" class="btn btn-success" data-toggle="modal"
                    data-target="#noisoi{{ $phieuns->pcd_ma }}">
                    <i class="fa fa-list" aria-hidden="true"></i>
                </button>
                <div class="modal fade" id="noisoi{{ $phieuns->pcd_ma }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thông tin siêu âm</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped w-100">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên cận lâm sàng</th>
                                            <th>Trạng thái</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach ($dsphieuchidinh_ns as $tencls)
                                            <?php  if($tencls->pcd_ma ==$phieuns->pcd_ma ){ ?>
                                            <tr>
                                                <td>{{ $i++ }}</th>
                                                <td>{{ $tencls->cls_ten }}</th>

                                                <td>
                                                    <?php 
                                                                
                                                            if(!empty($tencls->ctcd_ketquachidinh)){ ?>
                                                    <a target="_blank"
                                                        href="{{ url('staff/inphieunoisoi/' . $tencls->pcd_ma . '/' . $tencls->cls_ma) }}"
                                                        class="btn ">
                                                        Xem phiếu</a>
                                                    <?php   }else {?>

                                                    <a href="{{ url('staff/subclinical_exam/ns/' . $tencls->pcd_ma . '/' . $tencls->cls_ma) }}"
                                                        class="btn btn-success ">
                                                        <i class="fa fa-check" aria-hidden="true"></i></a>
                                                    <?php } 
                                                           ?>

                                                </td>
                                            </tr>
                                    </tbody>
                                    <?php } ?>
                                      @endforeach
                              </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
    </div>
    </div>
    </div>
    </div>
    </td>
    </tr>
    <?php 
             }     
             $noisoi = $phieuns->pkb_ma;
            }
                        ?>
    @endforeach
    <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <th class="text-center">Mã BN</th>
            <th class="text-center">Họ tên</th>
            <th class="text-center">Giới tính</th>
            <th class="text-center">Năm sinh</th>
            <th class="text-center">Phòng</th>
            <th class="text-center">Trạng thái</th>
            <th class="text-center"></th>
        </tr>
    </tfoot>
    </table>
    </div>

    <div class="tab-pane fade mt-4" id="nav-dsdakham" role="tabpanel" aria-labelledby="nav-home-tab">
        <table id="listdakham" class="display mt-4" style="width:100%">
            <thead>
                <tr class="tbl_header">
                    <th class="text-center">Mã BN</th>
                    <th class="text-center">Họ tên</th>
                    <th class="text-center">Giới tính</th>
                    <th class="text-center">Năm sinh</th>
                    <th class="text-center">Phòng</th>
                    <th class="text-center">Trạng thái</th>
                    <th class="text-center"></th>
                </tr>
            </thead>
            <tbody>
              <?php
              if(session()->get('p_ma')=='8'){
              $sieuam='';  
              ?>
                      @foreach ($dsphieuchidinh_sa as $phieusa)
                          <?php if(!empty($phieusa->ctcd_ketquachidinh)){ if($phieusa->pkb_ma != $sieuam ){
                   ?>
                          <tr>
                              <td width="10%;" class="text-center">
                                  {{ 'BN' . sprintf('%05d', $phieusa->bn_ma) }}</td>
                              <td width="25%;">{{ $phieusa->bn_ten }}</td>
                              <td width="10%;" class="text-center">{{ $phieusa->bn_gioitinh }}</td>
                              <td width="10%;" class="text-center">{{ $phieusa->bn_ngaysinh }} </td>
                              <td width="25%;" class="text-center">
                                  {{ $phieusa->p_ma . '-' . $phieusa->p_ten }}
                              </td>
                              <td width="12%;" class="text-center">{{ $phieusa->bn_gioitinh }}</td>
                              <td width="8%;" class="text-center">
                                  {{-- <a href="{{url('staff/subclinical_exam/sa/'.$phieusa->pcd_ma)}}" class="btn btn-success ">
                              <i class="fa fa-check" aria-hidden="true"></i></a> --}}
                                  <button type="button" class="btn btn-success" data-toggle="modal"
                                      data-target="#sieuam{{ $phieusa->pcd_ma }}">
                                      <i class="fa fa-list" aria-hidden="true"></i>
                                  </button>
                                  <div class="modal fade" id="sieuam{{ $phieusa->pcd_ma }}" tabindex="-1"
                                      aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Thông tin siêu
                                                      âm</h5>
                                                  <button type="button" class="close"
                                                      data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                  <table class="table table-striped w-100">
                                                      <thead class="thead-dark">
                                                          <tr>
                                                              <th>STT</th>
                                                              <th>Tên cận lâm sàng</th>
                                                              <th>Trạng thái</th>

                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                          <?php $i = 1; ?>
                                                          @foreach ($dsphieuchidinh_sa as $tencls)
                                                              <?php  if($tencls->pcd_ma ==$phieusa->pcd_ma ){ ?>
                                                              <tr>
                                                                  <td>{{ $i++ }}</th>
                                                                  <td>{{ $tencls->cls_ten }}</th>

                                                                  <td>
                                                                      <?php
                                                      
                                                  if(!empty($tencls->ctcd_ketquachidinh)){?>
                                                                      <a target="_blank"
                                                                          href="{{ url('staff/inphieusieuam/' . $tencls->pcd_ma . '/' . $tencls->cls_ma) }}"
                                                                          class="btn ">
                                                                          Xem phiếu</a>
                                                                      <?php   }else {?>

                                                                      <a href="{{ url('staff/subclinical_exam/sa/' . $tencls->pcd_ma . '/' . $tencls->cls_ma) }}"
                                                                          class="btn btn-success ">
                                                                          <i class="fa fa-check"
                                                                              aria-hidden="true"></i></a>
                                                                      <?php } 
                                                 ?>

                                                                  </td>
                                                              </tr>
                                                      </tbody>
                                                      <?php } ?>
                      @endforeach
              </table>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
              {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
          </div>
      </div>
  </div>
</div>
</td>
</tr>
<?php
              }
                  $noisoi = $phieusa->pkb_ma;
            }
              ?>
@endforeach

<?php }  if(session()->get('p_ma')=='9'){ $xetnghiem=''; ?>
@foreach ($dsphieuchidinh_xn as $phieuxn)

  <?php
   if(!empty($phieuxn->ctcd_ctthuchien)){ if($phieuxn->pkb_ma != $xetnghiem ){?>
  <tr>
      <td width="10%;" class="text-center">{{ 'BN' . sprintf('%05d', $phieuxn->bn_ma) }}</td>
      <td width="25%;">{{ $phieuxn->bn_ten }}</td>
      <td width="10%;" class="text-center">{{ $phieuxn->bn_gioitinh }}</td>
      <td width="10%;" class="text-center">{{ $phieuxn->bn_ngaysinh }} </td>
      <td width="25%;" class="text-center">{{ $phieuxn->p_ma . '-' . $phieuxn->p_ten }}</td>
      <td width="12%;" class="text-center">{{ $phieuxn->bn_gioitinh }}</td>
      <td width="8%;" class="text-center">
          {{-- <?php if($phieuxn->ctcd_ctthuchien){
                              echo 'Đã xét nghiệm';
                          } else {?>
                          <a class="btn btn-success " href="{{url('staff/subclinical_exam/xn/'.$phieuxn->pcd_ma)}}"><i class="fa fa-check"
                                  aria-hidden="true"></i></a>
                         <?php } ?> --}}

          <button type="button" class="btn btn-success" data-toggle="modal"
              data-target="#xetnghiem{{ $phieuxn->pcd_ma }}">
              <i class="fa fa-list" aria-hidden="true"></i>
          </button>
          <div class="modal fade" id="xetnghiem{{ $phieuxn->pcd_ma }}" tabindex="-1"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Thông tin siêu âm</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <table class="table table-striped w-100">
                              <thead class="thead-dark">
                                  <tr>
                                      <th>STT</th>
                                      <th>Tên cận lâm sàng</th>
                                      <th>Trạng thái</th>

                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $i = 1; ?>
                                  @foreach ($dsphieuchidinh_xn as $tencls)
                                      <?php  if($tencls->pcd_ma ==$phieuxn->pcd_ma ){ ?>
                                      <tr>
                                          <td>{{ $i++ }}</th>
                                          <td>{{ $tencls->cls_ten }}</th>

                                          <td>
                                              <?php
                                              
                                          if(!empty($tencls->ctcd_ctthuchien)){?>
                                              <a target="_blank"
                                                  href="{{ url('staff/inphieuxetnghiem/' . $tencls->pcd_ma . '/' . $tencls->cls_ma) }}"
                                                  class="btn ">
                                                  Xem phiếu</a>
                                              <?php 
                                              // echo 'Đã Xét nghiệm';
                                           }else {?>

                                              <a href="{{ url('staff/subclinical_exam/xn/' . $tencls->pcd_ma . '/' . $tencls->cls_ma) }}"
                                                  class="btn btn-success ">
                                                  <i class="fa fa-check" aria-hidden="true"></i></a>
                                              <?php } 
                                         ?>

                                          </td>
                                      </tr>
                              </tbody>
                              <?php } ?>
@endforeach
</table>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>

</div>
</div>
</div>
</div>
</td>
</tr>
<?php   }
                  $xetnghiem=$phieuxn->pkb_ma;
}
              ?>
@endforeach
<?php } ?>

              <?php
              if(session()->get('p_ma')=='10'){
              $noisoi='';
              
              ?>
@foreach ($dsphieuchidinh_ns as $phieuns)
<?php

if(!empty($phieuns->ctcd_ketquachidinh)){
if($phieuns->pkb_ma != $noisoi ){
                

                   
                   ?>
<tr>
  <td width="10%;" class="text-center">{{ 'BN' . sprintf('%05d', $phieuns->bn_ma) }}</td>
  <td width="25%;">{{ $phieuns->bn_ten }}</td>
  <td width="10%;" class="text-center">{{ $phieuns->bn_gioitinh }}</td>
  <td width="10%;" class="text-center">{{ $phieuns->bn_ngaysinh }} </td>
  <td width="25%;" class="text-center">{{ $phieuns->p_ma . ' - ' . $phieuns->p_ten }}</td>
  <td width="12%;" class="text-center">{{ $phieuns->bn_gioitinh }}</td>
  <td width="8%;" class="text-center">
      {{-- <a href="{{url('staff/subclinical_exam/sa/'.$phieuns->pcd_ma)}}" class="btn btn-success ">
                              <i class="fa fa-check" aria-hidden="true"></i></a> --}}
      <button type="button" class="btn btn-success" data-toggle="modal"
          data-target="#noisoi{{ $phieuns->pcd_ma }}">
          <i class="fa fa-list" aria-hidden="true"></i>
      </button>
      <div class="modal fade" id="noisoi{{ $phieuns->pcd_ma }}" tabindex="-1"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Thông tin siêu âm</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <table class="table table-striped w-100">
                          <thead class="thead-dark">
                              <tr>
                                  <th>STT</th>
                                  <th>Tên cận lâm sàng</th>
                                  <th>Trạng thái</th>

                              </tr>
                          </thead>
                          <tbody>
                              <?php $i = 1; ?>
                              @foreach ($dsphieuchidinh_ns as $tencls)
                                  <?php  if($tencls->pcd_ma ==$phieuns->pcd_ma ){ ?>
                                  <tr>
                                      <td>{{ $i++ }}</th>
                                      <td>{{ $tencls->cls_ten }}</th>

                                      <td>
                                          <?php 
                                                      
                                                  if(!empty($tencls->ctcd_ketquachidinh)){ ?>
                                          <a target="_blank"
                                              href="{{ url('staff/inphieunoisoi/' . $tencls->pcd_ma . '/' . $tencls->cls_ma) }}"
                                              class="btn ">
                                              Xem phiếu</a>
                                          <?php   }?>

                                          

                                      </td>
                                  </tr>
                          </tbody>
                          <?php } ?>
                            @endforeach
                    </table>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
{{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
</div>
</div>
</div>
</div>
</td>
</tr>
<?php 
   }     
   $noisoi = $phieuns->pkb_ma;
  }
              ?>
@endforeach
<?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th class="text-center">Mã BN</th>
                    <th class="text-center">Họ tên</th>
                    <th class="text-center">Giới tính</th>
                    <th class="text-center">Năm sinh</th>
                    <th class="text-center">Phòng</th>
                    <th class="text-center">Trạng thái</th>
                    <th class="text-center"></th>
                </tr>
            </tfoot>
        </table>



    </div>

    </div>

    </div>
    </div>
    </div>
@endsection
@section('st_add_js')
    <script>
        $('#subclinical').addClass('highlight');
        $('#subclinical').addClass('active');
    </script>
    <script src="{{ asset('staff/js/st_subclinical_examination.js') }}"></script>
    <script>
        $(document).ready(function() {
            <?php
            $mess = session()->get('thongbao');
            $icon = '';
            $tb = '';
            if ($mess == 'Hoàn tất xét nghiệm') {
                $icon = 'success';
                $tb = 'Hoàn tất xét nghiệm';
            } else
            if ($mess == 'Siêu âm thành công') {
                $icon = 'success';
                $tb = 'Siêu âm thành công';
            } else
            if ($mess == 'Nội soi thành công') {
                $icon = 'success';
                $tb = 'Nội soi thành công';
            } 
            if ($mess) {
            ?>
            Swal.fire({
                position: 'top-end',
                icon: '<?= $icon ?>',
                title: '<?= $tb ?>',
                showConfirmButton: false,
                timer: 1500
            });
            <?php session()->put('thongbao', null);
            }
            ?>
        });
    </script>

@endsection
