<?php

namespace App\Http\Controllers;
use App\models\Post;
use App\models\User;

use Illuminate\Http\Request;
class PostController extends Controller
{
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

    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    public function store()
    {
        //1- get the form submission data into variable
        //2- data validation
        //3- store the data in database
        //4- redirection

        
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        // dd( $title, $description);
        $post = Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $postCreator,
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
    public function update($id)
    {
        $data = request()->all();
        $post = Post::find($id); // Find the post by its ID

        $post->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
        ]);

        return view('posts.show', ['post' => $post]);
                
               
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        // dd($id);
        return to_route('posts.index',$id);
    }
}
