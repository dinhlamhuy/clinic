<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class xa extends Model
{
    use HasFactory;
    protected $table = 'xa';
    protected $primaryKey = 'x_ma';

    protected $fillable = [
        'x_ma',
        'x_ten',
        'h_ma',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
