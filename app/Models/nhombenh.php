<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhombenh extends Model
{
    use HasFactory;
    protected $table = 'nhombenh';
    protected $primaryKey = 'nb_ma';

    protected $fillable = [
        'nb_ma',
        'nb_ten',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
