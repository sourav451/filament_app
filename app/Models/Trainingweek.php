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
        'employee_id',
        'week_no',
        'status',
        'start_date',
        'end_date',
        ];

    public function employees(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
        
        
}
