<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Cloudinary;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' =>  $post->withAvg("reviews as stars_review", "stars")->orderBy('updated_at', 'DESC')->paginate(3)]);
    }
    
    
    public function show(Post $post)
    {
        $post = Post::withCount('reviews')->where('id', $post->id)->first();
        $post->loadAvg("reviews as stars_review", "stars");
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
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input += ['image_url' => $image_url];  
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
       ;
        $post = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('followed_id'))->latest()->paginate(10);
        return view('posts/timeline')->with(['posts' => $post ]);
    }
    
    public function ranking(Post $post)
    {
        $post->withAvg("reviews as stars_review", "stars")->orderBy("stars_review","DESC")->limit(5)->get();
        return view('posts/ranking')->with(['posts' => $post->withAvg("reviews as stars_review", "stars")->orderBy("stars_review","DESC")->limit(5)->get()]);
    }
    
     public function search(Request $request)
    {
        $posts = Post::paginate(20);

        $search = $request->input('search');

        $query = Post::query();

        if ($search) {

            $spaceConversion = mb_convert_kana($search, 's');

            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where('body', 'like', '%'.$value.'%');
            }
            
             $posts = $query->paginate(20);

        }

        return view('posts.search')
            ->with([
                'posts' => $posts,
                'search' => $search,
            ]);
    }
 }
?>