@extends('backend.backendmaster')
@section('content')
    <div class="row mt-5">
        <div class="col-md-12">
            <a href="{{ route('article.index') }}" class="btn btn-warning">กลับ</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('article.update', $ar->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-2">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="image">Choose your image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="type">ประเภท</label>
                            <select class="form-control" name="type">
                                <option>เลือกประเภทบทความ</option>
                                <option value="1"{{ $ar->type == 1 ? 'selected' : '' }}>ข่าวคริปโต</option>
                                <option value="2"{{ $ar->type == 2 ? 'selected' : '' }}>ข่าวฟุตบอล</option>
                                <option value="3"{{ $ar->type == 3 ? 'selected' : '' }}>ข่าวอื่น ๆ</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title">ชื่อบทความ</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Title"
                                name="title" value="{{ $ar->title }}">
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="detail">เนื้อหา</label>
                            <textarea class="form-control" id="detail" rows="3" name="detail">{{ $ar->title }}</textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">เพิ่มบทความ</button>
            </form>
        </div>
    </div>
@endsection
