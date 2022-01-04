<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietnhanvien extends Model
{
    use HasFactory;
    protected $table = 'chitietnhanvien';
    protected $primaryKey = ['nv_ma','cv_ma'];
    public $incrementing = false;

    protected $fillable = [
        'nv_ma',
        'cv_ma',
        'ngaybatdau',
        'ngayketthuc',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
