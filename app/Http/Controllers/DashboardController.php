<?php

namespace App\Http\Controllers;

use App\Models\News;

class DashboardController extends Controller
{
    public function index()
    {
        $newsItems = News::orderBy('publication_date', 'desc')->get();
        return view('dashboard', compact('newsItems'));
    }
}
