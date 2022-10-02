@extends('backend.backendmaster')
@section('content')
    <div class="row my-5">
        <div class="col-md-12">
            <a class="btn btn-success" href="{{ route('banner.create') }}">เพิ่ม Banner</a>
        </div>
    </div>
    <div class="row">
        @foreach ($banners as $banner)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <img src="{{ url('storage/banners/' . $banner->image) }}" class="w-100" alt="">
                    </div>
                    <div class="card-body d-flex justify-content-end">
                        <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-warning">แก้ไข</a>
                        <form action="{{ route('banner.destroy', $banner->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ms-2">ลบ</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
