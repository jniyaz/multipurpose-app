<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Story;
use Illuminate\Http\Request;
use App\Http\Requests\StoryRequest;
use Intervention\Image\Facades\Image;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::orderBy('id', 'desc')->paginate(10);
        return view('pages.story.index', compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $story = new Story();
        $tags = Tag::get();
        return view('pages.story.create', compact('story', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoryRequest $request)
    {
        $story = auth()->user()->stories()->create([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'status' => $request->status
        ]);

        if ($request->hasFile('cover_image')) {
            $this->_uploadImage($request, $story);
        }

        if ($request->tags) {
            $story->tags()->sync($request->tags);
        }

        return redirect()->route('story.index')->with(['type' => 'success', 'message' => 'Story added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        $tags = Tag::get();
        return view('pages.story.edit', compact('story', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(StoryRequest $request, Story $story)
    {
        $story->update([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'status' => $request->status
        ]);

        if ($request->hasFile('cover_image')) {
            $this->_uploadImage($request, $story);
        }

        if ($request->tags) {
            $story->tags()->sync($request->tags);
        }

        return redirect()->route('story.index')->with(['type' => 'success', 'message' => 'Story saved successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        $story->delete();
        return redirect()->route('story.index')->with(['type' => 'success', 'message' => 'Story deleted successfully']);
    }

    private function _uploadImage($request, $story)
    {
        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $filename = 'story' . '-' . time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('storage/stories/' . $filename);

            if (!file_exists(public_path('storage/stories'))) {
                mkdir(public_path('storage/stories'), 666, true);
            }

            Image::make($image)->resize(300, 300)->save($location);
            $story->cover_image = $filename;
            $story->save();
        }
    }
}
