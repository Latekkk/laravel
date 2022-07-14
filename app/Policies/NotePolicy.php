<?php

namespace App\Policies;

use App\Models\Dir;
use App\Models\Note;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class NotePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user)
    {
        return Auth::id() === $user->id;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Note $note
     * @return Response|bool
     */
    public function view(User $user, Note $note)
    {
        $dir = $note->dir;
        return ((Auth::id() === $user->id) && ( $user->id === $dir->user_id));
    }



    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user)
    {
        //
        return Auth::id() === $user->id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Note $note
     * @return Response|bool
     */
    public function update(User $user, Note $note)
    {
        $dir = $note->dir;
        return ((Auth::id() === $user->id) && ( $user->id === $dir->user_id));
    }


    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Note $note
     * @return Response|bool
     */
    public function delete(User $user, Note $note)
    {
        //
        $dir = $note->dir;
        return ((Auth::id() === $user->id) && ( $user->id === $dir->user_id));

    }



}
