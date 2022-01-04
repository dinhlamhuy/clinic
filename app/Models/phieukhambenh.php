<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phieukhambenh extends Model
{
    use HasFactory;
    protected $table = 'phieukhambenh';
    protected $primaryKey = 'pkb_ma';

    protected $fillable = [
        'pkb_ma',
        'pkb_sttkham',
        'bn_ma',
        'lhk_ma',
        'p_ma',
        'ttk_ma',
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

}
