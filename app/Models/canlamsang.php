<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class canlamsang extends Model
{
    use HasFactory;
    protected $table = 'canlamsang';
    protected $primaryKey = 'cls_ma';

    protected $fillable = [
        'ncls_ma',
        'cls_ten',
        'cls_giabhyt',
        'cls_giadv',
        'cls_tienchenhlech',
        'created_at',
        'updated_at',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
    
}
