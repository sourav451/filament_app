<?php

namespace App\Policies;

use App\Models\Trainingweek;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TrainingweekPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(['Admin','Employee']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Trainingweek $trainingweek): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Trainingweek $trainingweek): bool
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Trainingweek $trainingweek): bool
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Trainingweek $trainingweek): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Trainingweek $trainingweek): bool
    {
        //
    }
}
