<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;

    protected $fillable = [
        'return_id',
        'amount',
        'status',
    ];

    public function return()
    {
        return $this->belongsTo(Return::class);
    }
} 