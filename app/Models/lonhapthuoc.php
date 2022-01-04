<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lonhapthuoc extends Model
{
    use HasFactory;
    protected $table = 'lonhapthuoc';
    protected $primaryKey = 'lnt_ma';

    protected $fillable = [
        'lnt_ma',
        'lnt_ten',
        'lnt_ghichu',
        'ncc_ma',
        'created_at',
        'updated_at'


    ];
    public $timestamps = true;
}
