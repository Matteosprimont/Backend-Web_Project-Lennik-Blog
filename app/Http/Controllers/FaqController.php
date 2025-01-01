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

    public function editFaq()
    {
        $categories = FaqCategory::with('questions')->get();
        return view('faq.edit', compact('categories'));
    }

    public function editCategory($id)
    {
        $category = FaqCategory::with('questions')->findOrFail($id);
        return view('faq.edit_category', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $category = FaqCategory::findOrFail($id);
        $category->update(['name' => $request->name]);
        return redirect()->route('faq.edit')->with('success', 'Categorie bijgewerkt.');
    }

    public function updateQuestion(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);
        $question = FaqVragen::findOrFail($id);
        $question->update([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);
        return redirect()->route('faq.category.edit', $question->category_id)->with('success', 'Vraag bijgewerkt.');
    }

    public function deleteCategory($id)
    {
        $category = FaqCategory::findOrFail($id);
        $category->questions()->delete();
        $category->delete(); 

        return redirect()->route('faq.edit')->with('success', 'Categorie en bijbehorende vragen succesvol verwijderd.');
    }
    public function deleteQuestion($id)
{
    $question = FaqVragen::findOrFail($id);
    $question->delete();

    return back()->with('success', 'Vraag succesvol verwijderd.');
}
}
