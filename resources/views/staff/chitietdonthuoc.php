<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietdonthuoc extends Model
{
    use HasFactory;
    protected $table = 'chitietdonthuoc';
    protected $primaryKey = ['dthuoc_ma', 't_ma','lnt_ma'];
    public $incrementing = false;

    protected $fillable = [
        'dthuoc_ma',
        't_ma',
        'lnt_ma',
        'ctdt_lieudung',
        'ctdt_giaban',
        'ctdt_soluong',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
