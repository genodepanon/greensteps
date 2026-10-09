<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_id', 'team_name', 'status', 'title', 'location', 'latitude', 'longitude',
        'priority', 'reporter', 'phone', 'before_photo', 'after_photo', 'notes',
        'rejection_reason', 'rejected_by', 'rejected_at', 'completed_at',
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
        'rejected_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    public function rating()
    {
        return $this->hasOne(Rating::class);
    }

    public function teamLocation()
    {
        return $this->hasOne(TeamLocation::class);
    }
}