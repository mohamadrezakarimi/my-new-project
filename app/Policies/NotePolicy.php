<?php

namespace App\Policies;

use App\Note;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function edite(User $user,Note $note)
    {
        return $user->id == $note->user_id;
    }
}
