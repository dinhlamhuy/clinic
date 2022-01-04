<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class benhnhan extends Model
{
   
    use HasFactory;
    protected $table = 'benhnhan';
    protected $primaryKey = 'bn_ma';

    protected $fillable = [
        'bn_ma',
        'bn_ten',
        'bn_gioitinh',
        'bn_sdt',
        'bn_ngaysinh',
        'bn_diachi',
        'bn_cmnd',
        'bn_email',
        'bn_matkhau',
        'qt_ma',
        'nn_ma',
        'dt_ma',
        'dt_ma',
        'x_ma',
        'p_ma',
        'created_at',
        'updated_at'
        
    ];
    public $timestamps = true;
    
}
