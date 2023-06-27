<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Trainingweek extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'week_no',
        'status',
        'lesson_ids',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'lesson_ids' => 'array',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }
}
