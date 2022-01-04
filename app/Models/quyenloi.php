<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quyenloi extends Model
{
    use HasFactory;
    protected $table = 'quyenloi';
    protected $primaryKey = 'ql_ma';

    protected $fillable = [
        'ql_ma',
        'ql_so',
        'ql_ghichu',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
