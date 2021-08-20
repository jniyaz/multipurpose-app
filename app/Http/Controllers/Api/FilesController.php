<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Http\Requests\FileRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Project as ProjectResource;

class FilesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function store(FileRequest $request)
    {
        $project = Project::find($request->project_id);
        $this->authorize('upload', $project);
        $image = $request->file('image');
        $filename = 'project-' . time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('/public/projects', $filename);
        // $project->image = $filename;
        $project->files()->create(['file' => $filename]);

        return new ProjectResource($project);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
