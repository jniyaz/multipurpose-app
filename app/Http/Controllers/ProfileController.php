<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        return view('pages.profile.index', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('pages.profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, Profile $profile)
    {
        $user = $profile->user;
        $user->name = $request->name;
        $user->save();

        if (!$user->profile) {
            $user->profile()->create($request->all());
        }

        $user->profile->update($request->only(['phone', 'address', 'website', 'biography']));

        return redirect()->route('profile.index')->with(['type' => 'success', 'message' => 'Profile saved successfully']);
    }
}
