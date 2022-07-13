<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'dir_id'
    ];
//
//    protected $table = 'notes';

    public function dir() {
        return $this->belongsTo(Dir::class); //relacje jeden do wielu
        // wiele do wielu belongsToMany
    }
}
