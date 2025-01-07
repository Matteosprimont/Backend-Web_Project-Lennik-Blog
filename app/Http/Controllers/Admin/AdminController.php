<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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



    public function createUserForm()
{
    return view('admin.admin_create_user');
}

public function storeUser(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'role' => 'required|in:user,admin',
    ]);

    $user = new User();
    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->password = Hash::make($validated['password']);
    $user->is_admin = $validated['role'] === 'admin' ? 1 : 0;
    $user->save();

    return redirect()->route('admin.user.create')->with('success', 'Gebruiker succesvol aangemaakt.');
}
}
