<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaihinhkham extends Model
{
    use HasFactory;
    protected $table = 'loaihinhkham';
    protected $primaryKey = 'lhk_ma';

    protected $fillable = [
        'lhk_ma',
        'lhk_ten',
        'lhk_giatien',
        'lhk_giachenhlech',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
