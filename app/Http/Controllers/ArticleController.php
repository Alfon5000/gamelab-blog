<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        $count = $articles->count();
        return view('articles.index', compact('articles', 'count'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $title = $request->title;
        $body = $request->title;
        Article::create(['title' => $title, 'body' => $body]);
        return redirect('/articles');
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->body = $request->body;
        $article->save();
        return redirect('/articles');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect('/articles');
    }
}
