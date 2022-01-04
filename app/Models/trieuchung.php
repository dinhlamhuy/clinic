<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trieuchung extends Model
{
    use HasFactory;
    protected $table = 'trieuchung';
    protected $primaryKey = ['tcb_ma','dthuoc_ma'];
    public $incrementing = false;

    protected $fillable = [
        'dthuoc_ma',
        'tcb_ma',
        // 'created_at',
        // 'updated_at'
    ];
    public $timestamps = true;
}
