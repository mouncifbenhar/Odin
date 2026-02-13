<?php

namespace App\Policies;

use App\Models\Lien;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LienPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Lien $lien): bool
    {
        if($user->id === $lien->user_id || $lien->user->contains(function($e) use ($user){return $e->id === $user->id;})){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Lien $lien): bool
    {
        if($user->id === $lien->user_id || $lien->user->contains(function($e) use ($user){return $e->id === $user->id && $e->pivote->access_type === 'edit';})){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Lien $lien): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Lien $lien): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Lien $lien): bool
    {
        return false;
    }
}
