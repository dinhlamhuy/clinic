<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thanhpho extends Model
{
    use HasFactory;
    protected $table = 'thanhpho';
    protected $primaryKey = 'tp_ma';

    protected $fillable = [
        'tp_ma',
        'tp_ten',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
