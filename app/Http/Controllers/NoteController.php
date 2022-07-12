<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dir;
use App\Models\Note;
use App\Models\User;
use App\Providers\RouteServiceProvider;

use App\Repositories\NoteRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Integer;

class NoteController extends Controller
{


    public function __construct(NoteRepository $noteRespositry)
    {
        $this->repository = $noteRespositry;
        $this->authorizeResource(Note::class);
    }


    /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */




    public function index(Dir $dir)
    {
        $notes = $dir->notes;
        return Inertia::render(
            'Notes/Index',
            [
                'dirs' => $dir,
                'notes' => $notes
            ]
        );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        $dir = Dir::all();
        return Inertia::render(
            'Notes/Create',
            [
                'dir' => $dir
            ]
        );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): RedirectResponse
    {
        $note = new Note($request->all());

        $note->save();
        return redirect()->route('dirs.show', $request->dir_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Note $note
     * @return \Inertia\Response
     */
    public function edit(Note $note)
    {
        return Inertia::render(
            'Notes/Edit',
            [
                'note' => $note
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Note $note
     * @return RedirectResponse
     */
    public function update(Request $request, Note $note)
    {
        $note->title = $request->title;
        $note->description = $request->description;
        $note->save();
        return redirect()->route('dirs.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Note $note)
    {
        //


        // $dir = Dir::findOrFail($id);
        $note->delete();
        return redirect()->route('dirs.index');
    }


}
