<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhanvien extends Model
{
    use HasFactory;
    protected $table = 'nhanvien';
    protected $primaryKey = 'nv_ma';

    protected $fillable = [
        'nv_ma',
        'p_ma',
        'nv_ten',
        'nv_tentaikhoan',
        'nv_hinhanh',
        'nv_matkhau',
        'nv_gioitinh',
        'nv_ngaysinh',
        'nv_cmnd',
        'nv_sdt',
        'nv_email',
        'nv_diachi',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
