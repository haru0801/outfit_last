<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Review;
use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Cloudinary;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index(Post $post)
    {
        $posts = $post->withAvg("reviews as stars_review", "stars")->orderBy('created_at', 'DESC')->paginate(4);
        return view('posts/index')->with(['posts' => $posts ]);
    }
    
    
    public function show(Post $post)
    {
        $post = Post::withCount('reviews')->where('id', $post->id)->first();
        $post->loadAvg("reviews as stars_review", "stars");
        return view('posts/show')->with(['post' => $post]);
        dd($post);
     
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
        $post = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('followed_id'))->latest();
       
        $posts = $post->withAvg("reviews as stars_review", "stars")->orderBy("created_at","DESC")->paginate(4);
        return view('posts/timeline')->with(['posts' => $posts ]);
    }
    
    public function ranking(Post $post)
    {
        $days=Carbon::today()->subDay(30);
        $posts = $post->withAvg("reviews as stars_review", "stars")->whereDate('created_at', '>=', $days)->orderBy("stars_review","DESC")->limit(5)->get();
        return view('posts/ranking')->with(['posts' => $posts]);
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
    
    public function like(Post $post)
    {
        $post->likes()->create([
            'user_id' => auth()->id(),
        ]);
    
        return back();
    }

 }
?>