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
        $stories = Story::get();
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