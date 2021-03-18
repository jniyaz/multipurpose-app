<?php

namespace App\Http\Controllers;

use App\Models\User;
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
    public function edit()
    {
        $user = auth()->user();
        return view('pages.profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, User $user)
    {
        // $this->authorize('update', $user->profile);

        $user->name = $request->name;
        $user->save();

        if (!$user->profile) {
            $user->profile()->create($request->only(['phone', 'address', 'website', 'biography']));
        } else {
            $user->profile->update($request->only(['phone', 'address', 'website', 'biography']));
        }

        if ($request->roles) {
            $user->roles()->sync($request->roles);
        }

        return redirect()->route('profile.index')->with(['type' => 'success', 'message' => 'Profile saved successfully']);
    }
}
