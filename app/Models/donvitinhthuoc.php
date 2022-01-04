<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donvitinhthuoc extends Model
{
    use HasFactory;
    protected $table = 'donvitinhthuoc';
    protected $primaryKey = 'dvtt_ma';

    protected $fillable = [
        'dvtt_ma',
        'dvtt_ten',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
