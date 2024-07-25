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

    public function update(Request $req, $id){

        $validate = $req->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'is_published' => ['sometimes', 'boolean'],
        ]);

        Article::updateOrInsert(['id' => $id], $validate);

        return redirect('/articles');
    }

    public function show($id){
        $article = Article::find($id);
        return view('articles.show', ['article' => $article]);
    }

    public function edit($id){
        $article = Article::find($id);
        return view('articles.edit', ['article' => $article]);
    }

    public function destroy($id){
        $article = Article::find($id);
        $article->delete();
        return redirect('/articles');
    }
}
