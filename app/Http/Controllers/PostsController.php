<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    // Adding authorization request for every route
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        // Get all posts in descending order
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }
    
    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image']
        ]);

        // Storing uploaded files into specified directory
        $imagePath = request('image')->store('uploads', 'public');

        // TODO: Figure out how to use newer version of Image
    
        // Cutting image size on upload
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        // Check if user authenticated to submit the post
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    // Showing each post as a separate route 
    public function show(\App\Models\Post $post)
    {
        return view('posts.show', compact('post'));
    } 

    public function getUserId(Request $request)
    {
        $user = auth()->user();
        $id = auth()->id();

        return (int) $id;
    }

}