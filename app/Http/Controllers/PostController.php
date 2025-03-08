<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = [
            ['id' => 1, 'title' => 'laravel', 'posted_by' => 'ahmed', 'created_at' => '2025-03-08 12:47:00'],
            ['id' => 2, 'title' => 'HTML', 'posted_by' => 'mohamed', 'created_at' => '2025-04-10 11:00:00'],
        ];

        return view('posts.index',['posts' => $posts]);
    }

    public function show($id)
    {
        $post = [
            'id' => 1, 
            'title' => 'laravel',
            'description' => 'some description',
            'posted_by' => [
                'name' => 'ahmed',
                'email' => 'test@gmail.com',
                'created_at' => 'Thursday 25th of December 1975 02:15:16 PM'
            ],
            'created_at' => '2025-03-08 12:47:00',
        ];
        // dd($id);
        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        //1- get the form submission data into variable
        //2- data validation
        //3- store the data in database
        //4- redirection

        // $data = request()->all();
        // $title = $data['title'];
        // $description = $data['description'];

        $title = request()->title;
        $description = request()->description;

        // dd( $title, $description);

        return to_route('posts.show', 1);
        // return to_route('posts.index');
    }
    public function edit()
    {

        return view('posts.edit');
    }
    public function update()
    {
        // return view('posts.update');
    }
}
