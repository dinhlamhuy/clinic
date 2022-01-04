<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nghenghiep extends Model
{
    use HasFactory;
    protected $table = 'nghenghiep';
    protected $primaryKey = 'nn_ma';

    protected $fillable = [
        'nn_ma',
        'nn_ten',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
