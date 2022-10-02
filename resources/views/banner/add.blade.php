@extends('backend.backendmaster')
@section('content')
    <div class="row my-5">
        <div class="col-md-12">
            <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="image">Choose your image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">เพิ่มแบนเนอร์</button>
            </form>
        </div>
    </div>
@endsection
