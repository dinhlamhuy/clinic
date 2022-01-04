<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhomcanlamsang extends Model
{
    use HasFactory;
    protected $table = 'nhomcanlamsang';
    protected $primaryKey = 'ncls_ma';

    protected $fillable = [
        'ncls_ma',
        'ncls_ten',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
