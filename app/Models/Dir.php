<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dir extends Model
{
    protected $fillable = [
        'title',
        'photoURL',
        'user_id'
    ];

    public function notes()
    {
        return $this->hasMany(Note::class); // odwrotnosc względem note
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
