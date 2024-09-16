<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index(User $user){
        $user_id= Auth::id();
        
        return view('users.index') ->with([
            'user' =>$user->find($user_id),
        ]);
    }
    
    public function create(){
        
        $user_id= Auth::id();
        $user=User::find($user_id);
        
        return view('users.create')->with([
           'user'=> $user,
        ]);
    }
    
    public function store(UserRequest $request,User $user){
        $user_id= Auth::id();
        $user=User::find($user_id);
        
        $input=$request['user'];
        $user->fill($input)->save();
        
        return view('users.index') ->with([
            'user'=>$user,    
        ]);
    }
    
    public function edit(User $user){
        $user_id= Auth::id();
        $user=User::find($user_id);
        
        return view('users.edit') ->with([
            'user' =>$user,
        ]);
    }
    
    public function update(UserRequest $request,User $user){
        $user_id= Auth::id();
        $user=User::find($user_id);
        
        $input=$request['user'];
        $user->fill($input)->save();
        
        return view('users.index') ->with([
            'user'=>$user,    
        ]);
    }
}
