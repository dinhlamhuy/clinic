<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quoctich extends Model
{
    use HasFactory;
    protected $table = 'quoctich';
    protected $primaryKey = 'qt_ma';

    protected $fillable = [
        'qt_ma',
        'qt_ten',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
