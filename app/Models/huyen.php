<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class huyen extends Model
{
    use HasFactory;
    protected $table = 'huyen';
    protected $primaryKey = 'h_ma';

    protected $fillable = [
        'h_ma',
        'h_ten',
        'tp_ma',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
