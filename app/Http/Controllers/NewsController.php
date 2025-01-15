<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Comment;
class NewsController extends Controller
{
    public function showNewsForm()
    {
        return view('admin.news.form');
    }

    public function storeNews(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:10240',
        ]);

        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('news-images', 'public');
            $news->image = $path;
        }

        $news->publication_date = now();
        $news->save();

        return redirect()->route('admin.news.form')->with('status', 'Nieuws is opgeslagen!');
    }

    public function show($id)
    {
        $news = News::find($id);

        if (!$news) {
            return redirect()->route('news.index')->with('error', 'Nieuwsitem niet gevonden.');
        }

        return view('news.show', ['news' => $news]);
    }

    public function edit($id)
    {
        $news = News::find($id);

        if (!$news) {
            return redirect()->route('admin.news.form')->with('error', 'Nieuwsitem niet gevonden.');
        }

        return view('news.edit', ['news' => $news]);
    }

    public function update(Request $request, $id)
    {
        $news = News::find($id);

        if (!$news) {
            return redirect()->route('admin.news.form')->with('error', 'Nieuwsitem niet gevonden.');
        }

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $news->title = $request->title;
        $news->content = $request->content;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('news-images', 'public');
            $news->image = $path;
        }

        $news->save();

        return redirect()->route('admin.news.form')->with('status', 'Nieuws is bijgewerkt!');
    }

    public function destroy($id)
    {
        $news = News::find($id);

        if (!$news) {
            return redirect()->route('admin.news.form')->with('error', 'Nieuwsitem niet gevonden.');
        }

        $news->delete();

        return redirect()->route('admin.news.form')->with('status', 'Nieuws is verwijderd!');
    }

    public function storeComment(Request $request, $newsId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Comment::create([
            'news_id' => $newsId,
            'user_id' => \Illuminate\Support\Facades\Auth::user()->id,
            'content' => $request->content,
        ]);

        return back()->with('success', 'Comment toegevoegd!');
    }

    public function replyToComment(Request $request, $id)
{
    $request->validate([
        'content' => 'required|string|max:500',
    ]);

    $comment = Comment::findOrFail($id);

    Comment::create([
        'user_id' => \Illuminate\Support\Facades\Auth::user()->id,
        'news_id' => $comment->news_id,
        'content' => $request->content,
        'parent_id' => $comment->id,
    ]);

    return back()->with('success', 'Reactie geplaatst.');
}

}
