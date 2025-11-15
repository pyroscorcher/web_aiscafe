<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'date'    => 'required|date',
            'photo'   => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->date = $request->date;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('articles', 'public');
            $article->photo = $path;
        }

        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'date'    => 'required|date',
            'photo'   => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->content = $request->content;
        $article->date = $request->date;

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($article->photo && Storage::disk('public')->exists($article->photo)) {
                Storage::disk('public')->delete($article->photo);
            }
            // Store new photo
            $path = $request->file('photo')->store('articles', 'public');
            $article->photo = $path;
        }

        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        if ($article->photo && Storage::disk('public')->exists($article->photo)) {
            Storage::disk('public')->delete($article->photo);
        }

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully!');
    }


        public function showArticle()
    {
        // Fetch all articles from DB
        $articles = Article::orderBy('date', 'desc')->get();
        return view('artikel', compact('articles'));
    }

        public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('artikel-detail', compact('article'));
    }

}
