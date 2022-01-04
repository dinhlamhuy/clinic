<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class benh extends Model
{
    use HasFactory;
    protected $table = 'benh';
    protected $primaryKey = 'b_ma';

    protected $fillable = [
        'b_ma',
        'nb_ma',
        'b_ten',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
    
}
