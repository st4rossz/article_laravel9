@extends('backend.backendmaster')
@section('content')
    <div class="row my-5">
        <div class="col-md-12">
            <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="image">โปรดเลือกรูปภาพที่ต้องการแก้ไข</label>
                            <img src="{{ url('storage/banners/' . $banner->image) }}"
                                class="w-100 mx-auto d-flex mb-3 justify-content-start" alt="" />
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
            </form>
        </div>
    </div>
@endsection
