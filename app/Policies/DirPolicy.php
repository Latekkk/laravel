<?php

namespace App\Policies;

use App\Models\Dir;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class DirPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return Auth::id() === $user->id;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Dir  $dir
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Dir $dir)
    {
        return $user->id === $dir->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return Auth::id() === $user->id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Dir  $dir
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Dir $dir)
    {
        //
        return $user->id === $dir->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Dir  $dir
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Dir $dir)
    {
        return $user->id === $dir->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Dir  $dir
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Dir $dir)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Dir  $dir
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Dir $dir)
    {
        //
    }
}
