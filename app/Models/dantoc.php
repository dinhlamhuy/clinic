<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dantoc extends Model
{
    use HasFactory;
    protected $table = 'dantoc';
    protected $primaryKey = 'dtoc_ma';

    protected $fillable = [
        'dtoc_ma',
        'dtoc_ten',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
