<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'start_date',
        'due_date',
        'description',
        'user_created_by',
        'user_assigned_to'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
