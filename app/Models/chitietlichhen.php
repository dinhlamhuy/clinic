<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietlichhen extends Model
{
    use HasFactory;
    protected $table = 'chitietlichhen';
    protected $primaryKey = ['tclh_ma','lh_ma'];
    public $incrementing = false;
    protected $fillable = [
        'tclh_ma',
        'lh_ma',
        'created_at',
        'updated_at'
    ];
    // public $timestamps = true;
}
