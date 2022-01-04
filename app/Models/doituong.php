<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doituong extends Model
{
    use HasFactory;
    protected $table = 'doituong';
    protected $primaryKey = 'dt_ma';

    protected $fillable = [
        'dt_ma',
        'dt_ten',
        'dt_ghichu',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
