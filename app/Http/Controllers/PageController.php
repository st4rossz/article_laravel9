<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Banner;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $data['articles'] = Article::orderBy('id')->get();
        $data['crypto_articles'] = Article::orderBy('id')->where("type", 1)->get();
        $data['football_articles'] = Article::orderBy('id')->where("type", 2)->get();
        $data['other_articles'] = Article::orderBy('id')->where("type", 3)->get();
        $data['banners'] = Banner::orderBy('id')->get();
        return view('articles.index', $data);
    }
}
