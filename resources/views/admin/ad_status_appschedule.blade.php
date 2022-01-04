@extends('admin.ad_layout')
@section('admin_add_title')
    <title>Quản lý trạng thái lịch hẹn</title>
@endsection
@section('admin_add_css')
    <!-- <link href="{{ asset('admin/css/style_ad_provider.css') }}" rel="stylesheet" /> -->
@endsection
@section('admin_add_content')
    <div class="row">
        <div class="col-md-12 px-0" style="background-color: #edf2f4;">
            <div class="row ">
                <div class="col-md-12 pl-4 pr-4">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <span class="admin_titile">Quản lý trạng thái lịch hẹn</span>
                            {{-- <button class="btn btn-info mb-3 mt-2 float-right" id="btnexcel"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Xuất file excel</button> --}}
                        </div>

                    </div>
                    <div class="row ml-1 mr-1">
                        <div class="col-md-12 pl-3 pr-1 " style="background-color: white;">
                            <div class="row pt-1">
                               
                                <div class="col-md-8 ">
                                    <table id="dstrangthailh" class="display pt-2" style="width:100%; font-size:20px;">
                                        <thead>
                                            <tr class="tbl_header">
                                                <th class="text-center">Mã trạng thái</th>
                                                <th >Tên trạng thái</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dstrangthailh as $ttlh)
                                                <tr>
                                                    <td width="30%;" class="text-center">{{ 'TTLH'.sprintf('%02d',$ttlh->ttlh_ma) }}</td>
                                                    <td width="70%;" class="text-break">
                                                        {{ $ttlh->ttlh_ten }}
                                                    </td>
                                              
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('admin_add_js')
<script>
    $('#quanlylichhen').addClass('active');
    $('#quanlytrangthailh').addClass('active');
    $(document).ready(function() {
            
        $('#dstrangthailh').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json'
            },
        });
        $(".select2").select2();
    });
</script>

@endsection
