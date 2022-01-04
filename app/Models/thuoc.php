<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thuoc extends Model
{
    use HasFactory;
    protected $table = 'thuoc';
    protected $primaryKey = 't_ma';

    protected $fillable = [
        't_ma',
        'nt_ma',
        'pl_ma',
        'csd_ma',
        'tg_ma',
        't_ten',
        't_hamluong',
        't_lieudung',
        't_giabhyt',
        't_giadv',
        't_hinhanh',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
