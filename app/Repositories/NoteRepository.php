<?php

namespace App\Repositories;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoteRepository
{
    protected Note $model;

    public function __construct(Note $model)
    {
        $this->model = $model;
    }

    public function create(Request $request)
    {

    }


    public function update(Request $request, Dir $dir)
    {

    }



}
