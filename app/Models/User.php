<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'full_name', 'email', 'password', 'role', 'team_name', 'points', 'phone', 'photo_url', 'is_approved', 'is_rejected',
        'email_on_notifications', 'email_on_status',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'points' => 'integer',
        'email_on_notifications' => 'boolean',
        'email_on_status' => 'boolean',
    ];

    public function reports()
    {
        return $this->hasMany(Report::class, 'citizen_id');
    }

    public function notifications()
    {
        return $this->hasMany(UserNotification::class, 'user_id');
    }

    public function pointsLog()
    {
        return $this->hasMany(PointsLog::class, 'user_id');
    }
}