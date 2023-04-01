<?php

namespace App\Http\Controllers;


use App\Models\Hashtag;
use Illuminate\Http\Request;

class AdminHashtagController extends Controller
{
    public function index($locale,Hashtag $hashtag)
    {

        return view('admin.articles.hashtag.index', [
            'hashtag' => $hashtag
        ]);
    }

    public function create($locale,Hashtag $hashtag)
    {

        return view('admin.articles.hashtag.create', ['hashtag' => $hashtag]);
    }

    public function store()
    {
        Hashtag::create(array_merge($this->validateHashtag()));

        return redirect('/'.app()->getLocale().'/admin/hashtag')->with('success', 'price created');
    }
//
    public function edit($locale,Hashtag $hashtag)
    {
        return view('admin.articles.hashtag.edit', ['hashtag' => $hashtag]);
    }

//
    public function update($locale,Hashtag $hashtag)
    {
        $attributes = $this->validateHashtag($hashtag);
        $hashtag->update($attributes);
        return redirect('/'.app()->getLocale().'/admin/hashtag')->with('success', 'Product Updated!');
    }

    public function destroy($locale,Hashtag $hashtag)
    {

        $hashtag->delete();

        return redirect('/'.app()->getLocale().'/admin/hashtag')->with('success', 'Price Deleted!');
    }

    protected function validateHashtag(?Hashtag $hashtag = null): array
    {
        $hashtag ??= new Hashtag();

        return request()->validate([
            'name' => 'required',
            'name_ru' => 'required',
        ]);
    }
}
