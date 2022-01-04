<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phanloai extends Model
{
    use HasFactory;
    protected $table = 'phanloai';
    protected $primaryKey = 'pl_ma';

    protected $fillable = [
        'pl_ma',
        'pl_ten',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
