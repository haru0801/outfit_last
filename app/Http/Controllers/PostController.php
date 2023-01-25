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
        return view('posts/show')->with(['post' => $post]);
     
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
    
    public function review_create()
    {
        return view('posts/review');
    }
    
     public function review_store(Review $review, Request $request)
   {

        $result = false;

        $request->validate([
            'product_id' => [
                'required',
                function($attribute, $value, $fail) use($request) {

                    
                    $exists = Review::where('user_id', $request->user()->id)
                        ->where('post_id', $request->post_id)
                        ->exists();

                    if($exists) {

                        $fail('すでにレビューは投稿済みです。');
                        return;

                    }

                }
            ],
            'stars' => 'required|integer|min:1|max:5',
            'comment' => 'required'
        ]);

        $review->post_id = $request->post_id;
        $review->user_id = \Auth::id(); 
        $review->stars = $request->stars;
        $review->comment = $request->comment;
        $result = $review->save();
        return  redirect('/posts/' . $review->post_id);

    }
 }
?>