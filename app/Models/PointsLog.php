<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointsLog extends Model
{
    use HasFactory;

    protected $table = 'points_log';

    protected $fillable = [
        'user_id', 'points', 'reason', 'awarded_by',
    ];

    protected $casts = [
        'points' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function awarder()
    {
        return $this->belongsTo(User::class, 'awarded_by');
    }
}