<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietchidinh extends Model
{
    use HasFactory;
    protected $table = 'chitietchidinh';
    protected $primaryKey = ['cls_ma','pcd_ma'];
    public $incrementing = false;

    protected $fillable = [
        'cls_ma',
        'pcd_ma',
        'p_ma',
        // 'ctcd_yeucau',
        // 'ctcd_hinhanh',
        'ctcd_ctthuchien',
        'ctcd_ketquachidinh',
        'ctcd_giatien',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
