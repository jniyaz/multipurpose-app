<?php

namespace App\Http\Controllers\Admin;

use App\Models\Story;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::onlyTrashed()
            ->with('user')
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('pages.admin.story.index', compact('stories'));
    }

    public function restore(int $id)
    {
        $story = Story::withTrashed()->findOrFail($id);
        $story->restore();

        return redirect()->route('stories.index')->with(['type' => 'success', 'message' => 'Story restored successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $story = Story::withTrashed()->findOrFail($id);
        $story->forceDelete();

        return redirect()->route('stories.index')->with(['type' => 'success', 'message' => 'Story deleted successfully']);
    }
}
