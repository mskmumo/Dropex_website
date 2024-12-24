<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'description', 'priority', 'due_date', 'is_recurring', 'recurrence_pattern', 'is_completed'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function delegatedUser()
    {
        return $this->belongsTo(User::class, 'delegated_to');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
} 