<?php

namespace App\Http\Controllers;
use App\Models\Hashtag;
use Illuminate\Support\Facades\Session;


use App\Models\ArtCategory;
use App\Models\Article;
use App\Models\ArticleVisitor;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {

        Session::put('prod_url', request()->fullUrl());
        return view('articles.index', [
            'articles' => Article::orderByDesc('created_at')->filter(
                request(['search', 'category', 'hashtag'])
            )->paginate(12)->withQueryString()
        ]);
    }
    public function show($locale,Article $article)
    {

    if (auth()->id() == 0) {
        Article::where('id', $article->id)->update(array('views' => $article->views + 1));
    }
        return view('articles.show', [
            'article' => $article,

        ]);
    }

}
