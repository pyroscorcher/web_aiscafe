<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'date' => 'required|date',
            'photo_news' => 'nullable|image|max:2048'
        ]);

        $path = $request->file('photo_news') ? $request->file('photo_news')->store('news', 'public') : null;

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'date' => $request->date,
            'photo_news' => $path
        ]);

        return redirect()->route('news.index')->with('success', 'News created successfully.');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'date' => 'required|date',
            'photo_news' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('photo_news')) {
            $path = $request->file('photo_news')->store('news', 'public');
            $news->photo_news = $path;
        }

        $news->update($request->only('title', 'content', 'date', 'photo_news'));

        return redirect()->route('news.index')->with('success', 'News updated successfully.');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('success', 'News deleted successfully.');
    }
}
