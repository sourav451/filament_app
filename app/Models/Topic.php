<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Topic extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'created_by',
        'subject_id',
    ];

    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }
    public function subjects(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }
}
