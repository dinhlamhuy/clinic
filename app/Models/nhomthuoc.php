<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhomthuoc extends Model
{
    use HasFactory;
    protected $table = 'nhomthuoc';
    protected $primaryKey = 'nt_ma';

    protected $fillable = [
        'nt_ma',
        'nt_ten',
        'nt_ghichu',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
