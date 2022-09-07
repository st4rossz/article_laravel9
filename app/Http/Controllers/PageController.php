<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('articles.index');
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
