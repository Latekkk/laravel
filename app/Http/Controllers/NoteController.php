<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoteRequest;
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


    protected NoteRepository $repository;

    public function __construct(NoteRepository $noteRepository)
    {
        $this->repository = $noteRepository;
        $this->authorizeResource(Note::class);
    }


    /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */


//poprawic na requesty

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
    public function store(NoteRequest $request): RedirectResponse
    {

        $this->repository->create($request);
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
        return 0;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Note $note
     * @return \Inertia\Response
     */
    public function edit(NoteRequest $note)
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
    public function update(NoteRequest $request, Note $note)
    {
        $this->repository->update($request, $note);
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
        $this->repository->remove($note);
        return redirect()->route('dirs.index');
    }


}
