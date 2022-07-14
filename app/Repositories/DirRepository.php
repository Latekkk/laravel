<?php

namespace App\Repositories;

use App\Http\Requests\DirRequest;
use App\Models\Dir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DirRepository
{
    protected Dir $model;

    public function __construct(Dir $model)
    {
        $this->model = $model;
    }

    public function create(DirRequest $request)
    {
        $url = $this->saveImage("images/" . $request['user_id'] . "/" . $request['title'] . "/");
        $request['photoURL'] = $url;
        if ($request['photoURL'] != "") {
            $this->model->create($request->all());
        }
    }


    public function update(DirRequest $request, Dir $dir)
    {
        $request['photoURL'] = $this->saveImage("images/" . $dir->user_id . "/" . $request->get('title') . "/");
        $dir->update($request->all());
    }

    public function remove(Dir $dir) {
        $location = "public/images/" . $dir['user_id'] . "/" . $dir['title'];
        // $dir = Dir::findOrFail($id);
        try {
            if ($dir->delete()) {
                Storage::deleteDirectory($location);
            }
        } catch (\Exception $e) {

        }
    }

    private function saveImage(String $location): String
    {
        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $ext = $image->getClientOriginalExtension();
            $location .= "img.$ext";
            if (file_exists($location)) {
                Storage::deleteDirectory($location);
            }
            Storage::put("public/" . $location, $image->getContent());
            return  "storage/" . $location;
        }
        return '';
    }

}
