<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $newsItems = News::latest()->take(5)->get(); 
        $users = User::where('is_admin', false)->get(); 

        return view('dashboard', compact('newsItems', 'users'));
    }
}
