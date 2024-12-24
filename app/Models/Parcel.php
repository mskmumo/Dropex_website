<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    protected $fillable = [
        'user_id',
        'tracking_number',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}