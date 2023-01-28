<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


class ReviewController extends Controller
{
    //
    public function create(Post $post)
    {
        return view('reviews/create')->with(['post'=>$post]);
    }
    
     public function store(Review $review, Request $request)
   {

        $result = false;

        $request->validate([
            'post_id' => [
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
            'review.stars' => 'required|integer|min:1|max:5',
            'review.comment' => 'required'
        ]);
        $review->post_id = $request->post_id;
        $review->user_id = \Auth::id(); 
        $review->stars = $request->review['stars'];
        $review->comment = $request->review['comment'];
        $result = $review->save();
        return  redirect('/posts/' . $review->post_id);

    }
    
    public function delete(Review $review)
    {
        $review->delete();
        return  redirect('/posts/' . $review->post_id);
    }
}
