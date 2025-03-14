<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\models\Post;
use App\models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
class PostController extends Controller
{
    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }
    public function index()
    {
        $posts = Post::all();
        $posts = Post::paginate(20);

        return view('posts.index',['posts' => $posts]);
    }

    public function show($id)
    {
        $post = Post::find($id);
        // dd($id);
        
        return view('posts.show', ['post' => $post]);
    }
    public function apiShow($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        return response()->json([
            'title'       => $post->title,
            'description' => $post->description,
            'username'    => $post->user->name ?? 'Unknown User',
            'email'  => $post->user->email ?? 'Unknown Email',
        ]);
}

    

    public function store(StorePostRequest $request) 
    {
        //1- get the form submission data into variable
        //2- data validation
        //3- store the data in database
        //4- redirection

        $validated = $request->validated();
        if($request->hasFile('photo')){
            $path = $request->file('photo')->store('photos','public');
            $validated['photo'] = $path;
        }
 
        // dd( $title, $description);
        $post = Post::create([
        'title' => $validated['title'],
        'description' => $validated['description'],
        'user_id' => $validated['post_creator'],
        'photo' => $validated['photo'],
    ]);

        return to_route('posts.show', $post->id);
        // return to_route('posts.index');
    }
    public function edit($id)
    {
        $post = Post::find($id);
        $users = User::all();
        return view('posts.edit',['post' => $post, 'users' => $users]);
    }
    public function update(StorePostRequest $request,Post $post)
    {
        $validated = $request->validated();
        
        // $post = Post::find($id); // Find the post by its ID
        if($request->hasFile('photo')){
            if($post->photo){
                Storage::disk('public')->delete($post->photo);
                $path = $request->file('photo')->store('photos','public');
            $validated['photo'] = $path;
            }else {
                $validated['photo'] = $post->photo;
            }
        }
        

        $post->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'user_id' => $validated['post_creator'],
            'photo' => $validated['photo'],
        ]);
        return redirect()->route('posts.show', $post->id);
        // return view('posts.show', ['post' => $post]);
               
    }
    public function destroy(Post $post)
    {
        if($post->photo){
            Storage::disk('public')->delete($post->photo);
        }
        $post->delete();
        // dd($id);
        return to_route('posts.index', $post->id);
    }
}
