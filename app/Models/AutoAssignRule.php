<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AutoAssignRule extends Model
{
    protected $fillable = ['category_match', 'category_pattern', 'team_name', 'is_active', 'sort_order'];

    protected $appends = ['category_pattern'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getCategoryPatternAttribute(): string
    {
        return (string) ($this->attributes['category_match'] ?? '');
    }

    public function setCategoryPatternAttribute(string $value): void
    {
        $this->attributes['category_match'] = $value;
    }
}