<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::all();

        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:articles'],
            'content' => ['required', 'string'],
            'is_published' => ['sometimes', 'boolean'],
        ]);


        Article::create($validate);

        back()->with('success', 'Article created successfully');
        return redirect('/articles');
    }

    public function destroy(Article $article){
        Article::destroy($article->id);
        return redirect('/articles');
    }
}
