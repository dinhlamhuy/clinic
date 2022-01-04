<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chiso extends Model
{
    use HasFactory;
    protected $table = 'chiso';
    protected $primaryKey = 'cs_ma';

    protected $fillable = [
        'cs_ma',
        'cs_ten',
        'cs_dvt',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
    
}
