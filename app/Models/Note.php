<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    const PUBLIC_STATUS = 1;
    const UNLISTED_STATUS = 2;
    const PRIVATE_STATUS = 3;

    protected $guarded = [];

    use HasFactory;

    public function scopePublic($query)
    {
        return $query->where('status_id', self::PUBLIC_STATUS);
    }

    public function scopeUnlisted($query)
    {
        return $query->where('status_id', self::UNLISTED_STATUS);
    }

    public function scopePrivate($query)
    {
        return $query->where('status_id', self::PRIVATE_STATUS);
    }

    public function syntax()
    {
        return $this->belongsTo(NotesSyntax::class);
    }

    public function status()
    {
        return $this->belongsTo(NotesStatus::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
