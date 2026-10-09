<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'citizen_id', 'category', 'description', 'location', 'latitude', 'longitude',
        'photo_url', 'status', 'priority', 'assigned_team', 'rejection_reason',
        'rejected_by', 'rejected_at',
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
        'rejected_at' => 'datetime',
    ];

    public function citizen()
    {
        return $this->belongsTo(User::class, 'citizen_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function latestTask()
    {
        return $this->hasOne(Task::class)->latestOfMany();
    }

    public function comments()
    {
        return $this->hasMany(ReportComment::class);
    }

    public function statusHistory()
    {
        return $this->hasMany(ReportStatusHistory::class)->orderBy('created_at')->orderBy('id');
    }
}