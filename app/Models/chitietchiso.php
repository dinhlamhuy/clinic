<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietchiso extends Model
{
    use HasFactory;
    protected $table = 'chitietchiso';
    protected $primaryKey = ['cs_ma','pkb_ma'];

    protected $fillable = [
        'cs_ma',
        'pkb_ma',
        'ctcs_chitiet',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
    
}
