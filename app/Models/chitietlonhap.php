<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietlonhap extends Model
{
    use HasFactory;
    protected $table = 'chitietlonhap';
    protected $primaryKey = ['t_ma','lnt_ma'];

    protected $fillable = [
        't_ma',
        'lnt_ma',
        'dvtt_ma',
        'ctlnt_gianhap',
        'ctlnt_soluong',
        'ctlnt_slchua',
        'ctlnt_dvtchua',
        'ctlnt_ngaysx',
        'ctlnt_hansudung',
        'created_at', 
        'updated_at'
    ];
    public $timestamps = true;
    public $incrementing = false;
}
