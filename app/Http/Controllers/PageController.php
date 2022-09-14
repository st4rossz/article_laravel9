<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $data['articles'] = Article::orderBy('id')->paginate(20);
        return view('articles.index', $data);
    }

    public function hotarticle()
    {
        return view('');
    }

    public function crypto()
    {
        return view('');
    }

    public function soccer()
    {
        return view('');
    }

    public function others()
    {
        return view('');
    }
}
