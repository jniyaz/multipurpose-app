<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class WelcomeStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Story::where('status', '1');

        // search filters
        $type = request()->input('type');
        in_array($type, ['short', 'long']) ? $query->where('type', $type) : null;

        $stories = $query->orderBy('created_at', 'DESC')->paginate(8);

        if( request()->is('api/*')){
            return $stories;
        }

        return view('pages.stories', compact('stories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $story = Story::find($id);
        return view('pages.show-story', compact('story'));
    }
}
