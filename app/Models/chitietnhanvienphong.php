<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietnhanvienphong extends Model
{
    use HasFactory;
    protected $table = 'chitietnhanvienphong';
    protected $primaryKey = ['nv_ma','p_ma'];
    public $incrementing = false;

    protected $fillable = [
        'nv_ma',
        'p_ma',
        'ngaybatdau',
        'ngayketthuc',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
