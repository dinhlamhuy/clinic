<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trieuchungbenh extends Model
{
    use HasFactory;
    protected $table = 'trieuchungbenh';
    protected $primaryKey = 'tcb_ma';

    protected $fillable = [
        'tcb_ma',
        'tcb_ten',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
