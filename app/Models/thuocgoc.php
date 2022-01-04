<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thuocgoc extends Model
{
    use HasFactory;
    protected $table = 'thuocgoc';
    protected $primaryKey = 'tg_ma';

    protected $fillable = [
        'tg_ma',
        'tg_ten',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
