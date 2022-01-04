<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhacungcap extends Model
{
    use HasFactory;
    protected $table = 'nhacungcap';
    protected $primaryKey = 'ncc_ma';

    protected $fillable = [
        'ncc_ma',
        'ncc_ten',
        'ncc_sdt',
        'ncc_email',
        'ncc_diachi',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
