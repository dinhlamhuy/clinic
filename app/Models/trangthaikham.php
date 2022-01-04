<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trangthaikham extends Model
{
    use HasFactory;
    protected $table = 'trangthaikham';
    protected $primaryKey = 'ttk_ma';

    protected $fillable = [
        'ttk_ma',
        'ttk_ten',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
