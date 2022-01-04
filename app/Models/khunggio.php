<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khunggio extends Model
{
    // use HasFactory;
    // public $timestamps = false;
    protected $table = 'khunggio';
    protected $primarykey = 'kg_ma';
    protected $fillable = ['kg_ma','buoi_ma','kg_khunggio','created_at','updated_at'];
    public $timestamps = true;
    // public function buoi(){
    //     return $this->belongsTo('App\Post\Models\buoi','buoi_ma');
    // }
}
