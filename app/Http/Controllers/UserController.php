<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    //
    
     public function show(Request $request,User $user)
    {
        $followed_count = $user->follows()->count();
        $user_flg = $request->path();
        $user_flg = preg_replace('/[^0-10000]/', '', $user_flg);
        return view('users/show',['user' => $user,'user_flg' => $user_flg, 'followed_count' => $followed_count]);
    }
    
    public function edit(User $user)
    {
        return view('users/edit')->with(['user' => $user]);
    }
    
    public function update(UserRequest $request, User $user)
    {
        $input_user = $request['user'];
        $user->fill($input_user)->save();
    
        return redirect('/users/' . $user->id);
    }
    
    public function store(User $user, UserRequest $request)
    {
        $input = $request['user'];
        $user->fill($input)->save();
        return redirect('/users/' . $user->id);
    }
    
    public function follow(User $user)
   {
       $follower = auth()->user();
       $is_following = $follower->isFollowing($user->id);
       if(!$is_following) {
           $follower->follow($user->id);
           return back();
       }
   }
 
   
   public function unfollow(User $user)
   {
       $follower = auth()->user();
       $is_following = $follower->isFollowing($user->id);
       if($is_following) {
           $follower->unfollow($user->id);
           return back();
       }
   }
   
   public function male(User $user,Post $post)
    {
        $users = $user->where('gender', 1)->get();
        $user_id = array();
        foreach($users as $value){
            array_push($user_id, $value->id);
        }
        $posts = $post->whereIn('user_id', $user_id)->paginate(5);
        return view('users.male')->with(['posts' => $posts]);
    }
    
    public function female(User $user,Post $post)
    {
        $users = $user->where('gender', 2)->get();
        $user_id = array();
        foreach($users as $value){
            array_push($user_id, $value->id);
        }
        $posts = $post->whereIn('user_id', $user_id)->paginate(5);
        return view('users.female')->with(['posts' => $posts]);
    }
   
  

   
   
}
