<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        //
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'caption' => 'required',
            'image' => 'required|image',
        ];
        $this->validate($request, $rules);

        $post = new Post;
        $post->user_id = Auth::id();
        $post->caption = $request->caption;

        $image = $request->file('image');
        $imageName = Auth::user()->username . '_' . time() . Str::random(20);
        $extension = strtolower($image->getClientOriginalExtension());
        $imageFullName = $imageName. '.' .$extension;
        $uploadPath = 'img/postsimg/';
        $imageURL = $uploadPath . $imageFullName;
        Image::make($image)->fit(600, 600)->save($imageURL);
        $post['image'] = $imageURL;

        $post->save();
        return redirect('/profile/' . Auth::id());
    }

    public function show($post)
    {
        $postt = Post::findOrFail($post);
        return view('posts.show', compact('postt'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
