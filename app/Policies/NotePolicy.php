<?php

namespace App\Policies;

use App\Models\Note;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotePolicy
{
    use HandlesAuthorization;

    public function update(User $user, Note $note)
    {
        return $note->owner_id == $user->id;
    }

    public function show(User $user, Note $note)
    {
        return $note->owner_id == $user->id || $note->status_id != Note::PRIVATE_STATUS;
    }
}
