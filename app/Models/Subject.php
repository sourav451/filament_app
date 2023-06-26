<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Subject extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'description',
        'created_by',
    ];

    public function lessons(): HasMany
    {
        return $this->hasMany(Lessons::class);
    }
    
}
