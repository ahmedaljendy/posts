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
        return view('posts.create');
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
        $post = [
            'id' => $id, 
            'title' => 'laravel',
            'description' => 'some description',
            'posted_by' => [
                'name' => 'ahmed',
                'email' => 'test@gmail.com',
                'created_at' => 'Thursday 25th of December 1975 02:15:16 PM'
            ],
            'created_at' => '2025-03-08 12:47:00',
        ];
        return view('posts.edit',['post' => $post]);
    }
    public function update($id)
    {
        $data = request()->all();
        $post = [
            'id' => $id, 
            'title' => $data['title'],
            'description' => $data['description'],
            'posted_by' => [
                'name' => $data['description']['name'],
                'email' => 'test@gmail.com',
                'created_at' => 'Thursday 25th of December 1975 02:15:16 PM'
            ],
            'created_at' => '2025-03-08 12:47:00',
        ];
        return view('posts.show', ['post' => $post]);
                
               
    }
    public function destroy($id)
    {
        // dd($id);
        return to_route('posts.index',$id);
    }
}
