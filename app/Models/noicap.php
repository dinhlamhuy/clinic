<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class noicap extends Model
{
    use HasFactory;
    protected $table = 'noicap';
    protected $primaryKey = 'nc_ma';

    protected $fillable = [
        'nc_ma',
        'nc_so',
        'nc_thanhpho',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
