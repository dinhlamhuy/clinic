<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lichhen extends Model
{
    use HasFactory;
    protected $table = 'lichhen';
    protected $primaryKey = 'lh_ma';

    protected $fillable = [
        'lh_ma',
        'lh_ngay',
        'ttlh_ma',
        'nv_ma',
        'kg_ma',
        'bn_ma',
        'dk_ma',
        'created_at',
        'updated_at'
    ];
    // public $timestamps = true;
}
