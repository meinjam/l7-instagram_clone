<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index($user)
    {
        $users = User::findOrFail($user);
        return view('profiles.index', compact('users'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        // $usr = User::findOrFail($user);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'title' => '',
            'description' => '',
            'url' => 'url',
            'image' => '',
        ]);

        $image = request('image');
        if ($image) {
            $imageName = Auth::user()->username . '_' . time() . Str::random(20);
            $extension = strtolower($image->getClientOriginalExtension());
            $imageFullName = $imageName. '.' .$extension;
            $uploadPath = 'img/profilepic/';
            $imageURL = $uploadPath . $imageFullName;
            Image::make($image)->fit(600, 600)->save($imageURL);
        }

        auth()->user()->profile->update(array_merge(
            $data,
            ['image' => $imageURL]
        ));
        return redirect("/profile/{$user->id}");
    }
}
