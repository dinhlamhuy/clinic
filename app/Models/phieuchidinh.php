<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phieuchidinh extends Model
{
    use HasFactory;
    protected $table = 'phieuchidinh';
    protected $primaryKey = 'pcd_ma';

    protected $fillable = [
        'pcd_ma',
        'pcd_ghichu',
        'pkb_ma',
        'pcd_trangthai',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;

}
