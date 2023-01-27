<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    
    public function show(Post $post)
    {
        $average = collect();
        foreach($post->reviews as $r){
            $average->add($r->stars);
        }
        $average=$average->avg();
        return view('posts/show')->with(['post' => $post, 'average' => $average]);
     
    }
    
    public function create()
    {
        return view('posts/create');
    }
    
    public function store(Post $post, Request $request)
    {
        $post->user_id = \Auth::id(); 
        $input = $request['post'];
        $post->fill($input);
        $post->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/posts/index');
    }
    
    public function timeline(Post $post) 
    {
        // dd($post->get());
        $post = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('followed_id'))->latest()->paginate(10);
        return view('posts/timeline')->with(['posts' => $post ]);
    }
    
 }
?>