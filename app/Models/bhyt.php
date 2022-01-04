<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bhyt extends Model
{
    use HasFactory;
    protected $table = 'bhyt';
    protected $primaryKey = ['dt_ma','ql_ma','nc_ma','bhyt_ma'];
    public $incrementing = false;
    protected $fillable = [
        'dt_ma',
        'ql_ma',
        'nc_ma',
        'bn_ma',
        'bhyt_maso',
        'bhyt_ngaybatdau',
        'bhyt_ngayketthuc',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
    
}
