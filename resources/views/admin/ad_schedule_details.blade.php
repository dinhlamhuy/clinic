@extends('admin.ad_layout')
@section('admin_add_title')
<title>Sắp lịch trực</title>
@endsection
@section('admin_add_css')
<!-- <link href="{{asset('admin/css/style_ad_provider.css')}}" rel="stylesheet" /> -->
<style>

</style>
@endsection
@section('admin_add_content')

<div class="row mx-1">
    <div class="col-md-12  px-0" style="background-color: #edf2f4;">


        <div class="row mt-2 ">
            <div class="col-md-2">Nhân viên</div>
            <div class="col-md-2 font-weight-bold text-center">Thứ 2</div>
            <div class="col-md-2 font-weight-bold text-center">Thứ 3</div>
            <div class="col-md-2 font-weight-bold text-center">Thứ 4</div>
            <div class="col-md-2 font-weight-bold text-center">Thứ 5</div>
            <div class="col-md-2 font-weight-bold text-center">Thứ 6</div>
        </div>
        <div class="row mt-5">
            <div class="col-md-2">
                <span class="font-weight-bold">Nhân viên(Bác sĩ)</span>
            </div>
            <div class="col-md-2"><select name="NV1T2" id="" class="w-100 select2">
                    <option value="">BS.moi</option>
                </select></div>
            <div class="col-md-2"><select name="NV1T3" id="" class="w-100 select2">
                    <option value="">BS.moi</option>
                </select></div>
            <div class="col-md-2"><select name="NV1T4" id="" class="w-100 select2">
                    <option value="">BS.moi</option>
                </select></div>
            <div class="col-md-2"><select name="NV1T5" id="" class="w-100 select2">
                    <option value="">BS.moi</option>
                </select></div>
            <div class="col-md-2"><select name="NV1T6" id="" class="w-100 select2">
                    <option value="">BS.moi</option>
                </select></div>
        </div>
        <div class="row mt-4">
            <div class="col-md-2">
                <span class="font-weight-bold">Nhân viên(Y tá)</span>
            </div>
            <div class="col-md-2"><select name="NV2T2" id="" class="w-100 select2">
                    <option value="">BS.moi</option>
                </select>
            </div>
            <div class="col-md-2"><select name="NV2T3" id="" class="w-100 select2">
                    <option value="">BS.moi</option>
                </select>
            </div>
            <div class="col-md-2"><select name="NV2T4" id="" class="w-100 select2">
                    <option value="">BS.moi</option>
                </select>
            </div>
            <div class="col-md-2"><select name="NV2T5" id="" class="w-100 select2">
                    <option value="">BS.moi</option>
                </select>
            </div>
            <div class="col-md-2"><select name="NV2T6" id="" class="w-100 select2">
                    <option value="">BS.moi</option>
                </select>
            </div>

        </div>

    </div>
</div>


@endsection
@section('admin_add_js')
<script>
    $(document).ready(function() {
        $('#dsbenh').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json'
            },
        });
        $(".select2").select2();
    });


    $('#quanlylichtruc').addClass('active');
</script>
@endsection