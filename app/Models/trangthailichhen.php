<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trangthai extends Model
{
    use HasFactory;
    protected $table = 'trangthai';
    protected $primaryKey = 'ttlh_ma';

    protected $fillable = [
        'ttlh_ten',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
