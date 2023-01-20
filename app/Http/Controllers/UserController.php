<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    //
    
     public function show(User $user)
    {
        return view('users/show')->with(['user' => $user]);
     
    }
    
    public function edit(User $user)
    {
        return view('users/edit')->with(['user' => $user]);
    }
    
    public function update(UserRequest $request, User $user)
    {
        $input_user = $request['user'];
        $user->fill($input_user)->save();
    
        return redirect('/users/{user}' . $user->id);
    }
    
    public function store(User $user, UserRequest $request)
    {
        $input = $request['user'];
        $user->fill($input)->save();
        return redirect('/users/{user}' . $user->id);
    }
}
