<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::where('role', 'user')->get();
        return view('admin.users.index', compact('users'));
    }

    public function update($id){
        $user = User::find($id);
        $user->status = !$user->status;
        $user->save();
        return back()->with('success', __("messages.user_updated"));
    }
}
