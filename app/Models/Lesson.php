<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'created_by',
        'topic_id',
    ];
    public function topics(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }
    
    public function trainingweeks(): BelongsTo
    {
        return $this->belongsTo(Trainingweek::class);
    }
}