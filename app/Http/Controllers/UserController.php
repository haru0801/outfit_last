<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    //
    
     public function show(Request $request,User $user)
    {
        $user_flg = $request->path();
        $user_flg = preg_replace('/[^0-10000]/', '', $user_flg);
        return view('users/show',['user' => $user,'user_flg' => $user_flg]);
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
   
   

   
   
}
