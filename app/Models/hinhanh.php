<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hinhanh extends Model
{
    use HasFactory;
    protected $table = 'hinhanh';
    protected $primaryKey = 'ha_id';

    protected $fillable = [
        'pcd_ma',
        'cls_ma',
        'ha_ten',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
