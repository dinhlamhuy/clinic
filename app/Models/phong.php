<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phong extends Model
{
    use HasFactory;
    protected $table = 'phong';
    protected $primaryKey = 'p_ma';

    protected $fillable = [
        'p_ma',
        'p_ten',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
