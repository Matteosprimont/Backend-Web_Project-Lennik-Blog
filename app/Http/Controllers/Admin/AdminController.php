<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all(); 
        return view('admin.dashboard', compact('users'));
    }
    public function makeAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->is_admin = true;
        $user->save();
        return redirect()->route('admin.dashboard');
    }

    public function removeAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->is_admin = false;
        $user->save();
    
        return redirect()->route('admin.dashboard');
    }

    public function delUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    
        return redirect()->route('admin.dashboard');
    }   
}
