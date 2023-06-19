<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'trainingweek_id',
        'topic',
        'title',
        'description',
        ];
        
    public function trainingweeks(): BelongsTo
    {
        return $this->belongsTo(Trainingweek::class);
    }
    
}
