<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class benhphu extends Model
{
    use HasFactory;
    protected $table = 'benhphu';
    protected $primaryKey = ['b_ma','dthuoc_ma'];
    public $incrementing = false;

    protected $fillable = [
        'b_ma',
        'dthuoc_ma',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}