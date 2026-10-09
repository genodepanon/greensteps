<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id', 'admin_id', 'team_name', 'rating', 'points_awarded', 'comment',
    ];

    protected $casts = [
        'rating' => 'integer',
        'points_awarded' => 'integer',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function rater()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}