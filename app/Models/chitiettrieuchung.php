<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitiettrieuchung extends Model
{
    use HasFactory;
    protected $table = 'chitiettrieuchung';
    protected $primaryKey = ['tcb_ma','b_ma'];

    protected $fillable = [
        'b_ma',
        'tcb_ma',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
