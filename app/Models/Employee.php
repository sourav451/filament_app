<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'street',
        'city',
        'region',
        'postal_code',
        'country',
        'email',
        'phone_no',
    ];

    public function trainingweeks(): HasMany
    {
        return $this->hasMany(Trainingweek::class);
    }
}
