<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buoi extends Model
{
    // use HasFactory;
    protected $table = 'buoi';
    protected $primaryKey = 'buoi_ma';
    protected $fillable = [
        'buoi_ma',
        'buoi_ten',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
    // public function khunggio(){
    //     return $this->hasMany('App\Post\Models\khunggio','buoi_ma');
    // }
}
