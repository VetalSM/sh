<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\Rule;

class AdminArticleController extends Controller
{

//    public function show(){
//
//    }
    public function index()
    { $locale = App::currentLocale();

        return view('admin.articles.index', [
            'articles' => Article::paginate(50)]);

    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store()
    {
        $thumbnailName= $this->validateArticle()['slug'].'.jpg';

            $attributes = array_merge($this->validateArticle(), [
                'user_id' => request()->user()->id,
                'thumbnail' => request()->file('thumbnail')->storeAs('thumbnails',$thumbnailName)
            ]);
            $article = Article::create($attributes);

            $article->hashtags()->sync(request()->input('hashtags', []));


        return redirect('/'.app()->getLocale().'/articles');
    }

    public function edit($locale,Article $article)
    {
        return view('admin.articles.edit', ['article' => $article]);
    }

    public function update($locale,Article $article)
    {

        $attributes = $this->validateArticle($article);
        $thumbnailName= $attributes['slug'].'.jpg';
        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->storeAs('thumbnails',$thumbnailName);
        }

        $article->update($attributes);
        $article->hashtags()->sync(request()->input('hashtags', []));
        return back()->with('success', 'Article Updated!');
    }

    public function destroy($locale,Article $article)
    {
        $article->delete();

        return back()->with('success', 'Article Deleted!');
    }

    protected function validateArticle(?Article $article = null): array
    {
        $article ??= new Article();

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $article->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('articles', 'slug')->ignore($article)],
            'excerpt' => 'required',
            'body' => 'required',
            'status' => '',
            'prices' =>  '',
            'meta_title' =>'',
            'meta_keywords' =>'',
            'meta_description' =>'',
            'title_ru' => '',
            'excerpt_ru' => '',
            'body_ru' => '',
            'meta_title_ru' =>'',
            'meta_description_ru' =>'',
            'category_id' => ['required', Rule::exists('art_categories', 'id')]
        ]);
    }
}
