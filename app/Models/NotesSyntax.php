<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotesSyntax extends Model
{
    protected $table = 'notes_syntax';

    public function notes()
    {
        return $this->hasMany(Note::class, 'syntax_id');
    }
}
