<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cachsudung extends Model
{
    use HasFactory;
    protected $table = 'cachsudung';
    protected $primaryKey = 'csd_ma';

    protected $fillable = [
        'csd_ma',
        'csd_ten',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
