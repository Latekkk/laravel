<?php

namespace App\Repositories;

use App\Http\Requests\NoteRequest;
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

        $this->model->create($request->all());
    }


    public function update(Request $request, Note $note)
    {
        $note->title = $request->title;
        $note->description = $request->description;
        $note->update($request->all());
    }

    public function remove(Note $note)
    {
        $note->delete();
    }



}
