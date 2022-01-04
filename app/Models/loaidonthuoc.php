<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaidonthuoc extends Model
{
    use HasFactory;
    protected $table = 'loaidonthuoc';
    protected $primaryKey = 'ldt_ma';

    protected $fillable = [
        'ldt_ma',
        'ldt_ten',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
