<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donthuoc extends Model
{
    use HasFactory;
    protected $table = 'donthuoc';
    protected $primaryKey = 'dthuoc_ma';

    protected $fillable = [
        'dthuoc_ma',
        'ldt_ma',
        'pkb_ma',
        'dthuoc_loidan',
        'dthuoc_loihen',
        'dthuoc_trangthai',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
