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
        $id=request()->id;
        $title = request()->title;
        $description = request()->description;

        // dd( $title, $description);

        return to_route('posts.show', $id);
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
