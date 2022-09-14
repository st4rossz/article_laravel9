<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

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

        // $imagePath = null;
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('image', 'public');
        // }

        $input = $request->all();

        // $path = $request->image->store('public/photos');
        // $replace_path = str_replace("public", "storage", $path);

        // $post = Article::create([
        //     'type' => $request->type,
        //     'title' => $request->title,
        //     'detail' => $request->detail,
        //     'image' => $replace_path,
        //     'views' => $request->views,
        // ]);

        if ($request->file('image') != null) {
            // $path = 'storage/images';
            // $replace_path = str_replace("public", "storage", $path);
            // $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            // $image->move($path, $profileImage);
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
            'type' => 'required',
            'title' => 'required',
            'detail' => 'required',
        ]);

        if ($image = $request->file('image') != null) {
            $image = Storage::putFile('public/images', $request->file('image'));
            $save_image =  $article->image = basename($image);
        } else {
            $save_image = '';
        }

        Alert::Success('แจ้งเตือน!', 'แก้ไขข้อมูลสำเร็จ');

        // $path = $request->image->store('public/photos');
        // $replace_path = str_replace("public", "storage", $path);

        $save_image;
        $article->type = $request->type;
        $article->title = $request->title;
        $article->detail = $request->detail;
        $article->update();

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
       

        if ($article->image != null) {
             $image_path = 'storage/images/' . $article->image;
            unlink($image_path);
            $article->delete();
        } else {
            $article->delete();
        };

        Alert::success('แจ้งเตือน', 'ลบข้อมูลสำเร็จ');
        return redirect()->route('article.index');
    }
}
