<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chucvu extends Model
{
    use HasFactory;
    protected $table = 'chucvu';
    protected $primaryKey = 'cv_ma';

    protected $fillable = [
        'cv_ma',
        'cv_ten',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
