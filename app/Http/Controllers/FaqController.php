<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use App\Models\FaqVragen;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::with('questions')->get();
        return view('faq.index', compact('categories'));
    }

    public function createCategory()
    {
        return view('faq.make_cat');
    }

    public function storeCategory(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        FaqCategory::create(['name' => $request->name]);
        return redirect()->route('faq.index')->with('success', 'Categorie toegevoegd.');
    }

    public function createQuestion()
    {
        $categories = FaqCategory::all();
        return view('faq.question', compact('categories'));
    }

    public function storeQuestion(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'category_id' => 'required|exists:faq_categories,id',
        ]);

        FaqVragen::create($request->all());
        return redirect()->route('faq.index')->with('success', 'Vraag toegevoegd.');
    }

    public function manageFaq()
{
    $categories = FaqCategory::all();
    return view('faq.question', compact('categories'));
}

}
