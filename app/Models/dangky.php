<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dangky extends Model
{
    use HasFactory;
    protected $table = 'dangky';
    protected $primaryKey = 'dk_ma';

    protected $fillable = [
        'dk_ma',
        'dk_hotennd',
        'dk_sdtnd',
        'dk_emailnd',
        'dk_hoten',
        'dk_diachi',
        'dk_gioitinh',
        'dk_ngaysinh',
        'dk_sdt',
        'dk_email',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
