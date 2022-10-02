<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;



class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['banners'] = Banner::orderBy('id')->paginate(20);
        return view('banner.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banner.add');
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
            'image' => ['required', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        ]);

        $input = $request->all();

        if ($request->file('image') != null) {
            $BannerImage = Storage::putFile('public/banners', $request->file('image'));
            $input['image'] = basename($BannerImage);
        } else {
            $input['image'] = '';
        }

        if (Banner::create($input)) {
            Alert::success('แจ้งเตือน', 'เพิ่มข้อมูลสำเร็จ');
        }

        return redirect()->route('banner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('banner.edit', ['banner' => $banner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $validatedData = $request->validate([
            'image' => ['mimes:jpg,jpeg,png,gif', 'max:2048'],

        ]);

        $request->all();

        if ($image = $request->file('image') != null) {
            $image = Storage::putFile('public/banners', $request->file('image'));
            $save_image =  $banner->image = basename($image);
        } else {
            $save_image = '';
        }

        $save_image;
        $banner->update();
        Alert::success('แจ้งเตือน', 'แก้ไขข้อมูลสำเร็จ');

        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $path = public_path('storage/banners/' . $banner->image);

        if ($banner->image != null) {
            unlink($path);
        }

        $banner->delete();

        Alert::success('แจ้งเตือน', 'ลบข้อมูลสำเร็จ');
        return redirect()->route('banner.index');
    }
}
