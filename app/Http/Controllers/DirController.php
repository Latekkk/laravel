<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DirRequest;
use App\Models\Dir;
use App\Models\Note;
use App\Models\User;
use App\Policies\DirPolicy;
use App\Providers\RouteServiceProvider;
use App\Repositories\DirRepository;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class DirController extends Controller
{

    protected DirRepository $repository;

    /**
     * @param DirRepository $dirRepository
     */

    public function __construct(DirRepository $dirRepository)
    {
        $this->repository = $dirRepository;
        $this->authorizeResource(Dir::class);
    }

    /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */


    public function index()
    {
        $user = Auth::user();
        $dir = $user->dirs;
        return Inertia::render(
            'Dirs/Index',
            [
                'dirs' => $dir,
                'users' => $user
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
        $user = User::all();
        // dd($user);
        return Inertia::render(
            'Dirs/Create',
            [
                'dir' => $dir, 'users' => $user
            ]
        );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(DirRequest $request): RedirectResponse
    {
        $request['user_id'] = auth()->user()->id;
        $this->repository->create($request);
        return redirect()->route('dirs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Inertia\Response
     */
    public function show(Dir $dir)
    {
        //
        $notes = Note::where('dir_id', $dir->id)->paginate(8);
        return Inertia::render(
            'Dirs/Show',
            [
                'dir' => $dir, 'notes' => $notes
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Inertia\Response
     */
    public function edit(Dir $dir)
    {
        return Inertia::render(
            'Dirs/Edit',
            [
                'dir' => $dir
            ]
        );
        return 0;
    }


    public function update(DirRequest $request, Dir $dir): RedirectResponse
    {

        $this->repository->update($request, $dir);
        return redirect()->route('dirs.index');
    }


/**
 * Remove the specified resource from storage.
 *
 * @param int $id
 * @return Response
 */
public
function destroy(Dir $dir)
{
    $location = "public/images/" . $dir['user_id'] . "/" . $dir['title'];
    // $dir = Dir::findOrFail($id);
    try {
        if ($dir->delete()) {
            Storage::deleteDirectory($location);
        }
    } catch (\Exception $e) {

    }
    return redirect()->route('dirs.index');
}


}
