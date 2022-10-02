<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Filesystem\Filesystem;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Banner;

use function PHPSTORM_META\type;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['articles'] = Article::orderBy('id')->paginate(20);
        return view('backend.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'type' => ['required', 'string'],
            'title' => ['required', 'string'],
            'detail' => ['nullable', 'string'],
            'image' => ['nullable', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'views' => ['nullalble', 'integer'],
        ]);

        $input = $request->all();

        if ($request->file('image') != null) {
            $profileImage = Storage::putFile('public/images', $request->file('image'));
            $input['image'] = basename($profileImage);
        } else {
            $input['image'] = '';
        };

        if (Article::create($input)) {
            Alert::success('แจ้งเตือน', 'เพิ่มข้อมูลสำเร็จ');
        }

        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article->increment('views');
        $article['banners'] = Banner::orderBy('id')->get();
        // dd($article['banners']);
        return view('articles.article', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('backend.edit', ['ar' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $validatedData = $request->validate([
            'type' => ['required', 'string'],
            'title' => ['required', 'string'],
            'detail' => ['nullable', 'string'],
            'image' => ['nullable', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'views' => ['nullalble', 'integer'],
        ]);

        $request->all();

        if ($image = $request->file('image') != null) {
            $image = Storage::putFile('public/images', $request->file('image'));
            $save_image =  $article->image = basename($image);
        } else {
            $save_image = '';
        }

        $save_image;
        $article->type = $request->type;
        $article->title = $request->title;
        $article->detail = $request->detail;

        if ($article->update()) {
            Alert::Success('แจ้งเตือน!', 'แก้ไขข้อมูลสำเร็จ');
        }

        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $path = public_path('storage/images/' . $article->image);

        if ($article->image != null) {
            unlink($path);
        }

        $article->delete();

        Alert::success('แจ้งเตือน', 'ลบข้อมูลสำเร็จ');
        return redirect()->route('article.index');
    }
}
