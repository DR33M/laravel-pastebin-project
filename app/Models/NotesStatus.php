<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotesStatus extends Model
{
    protected $table = 'notes_status';

    public function notes()
    {
        return $this->hasMany(Note::class, 'status_id');
    }
}
