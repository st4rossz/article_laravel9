@extends('master')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 form-inline">
                <small>เพิ่มเมื่อ {{ $article->created_at->thaidate('j F Y H.i น.') }}</small>
                <small class="ms-2"><i class="fas fa-eye me-1"></i>{{ $article->views }}</small>
                <hr>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-12 d-flex ">
                <h3>{{ $article->title }}</h3>
                <h4 class="ms-2 mt-1 text-danger">
                    @if ($article->type == 1)
                        (ข่าวคริปโต)
                    @elseif($article->type == 2)
                        (ข่าวฟุตบอล)
                    @elseif($article->type == 3)
                        (ข่าวอื่น ๆ)
                    @endif
                </h4>
            </div>
            <div class="col-md-12 text-center">
                <img src="{{ url('storage/images/' . $article->image) }}" width="450" height="450" alt="">
            </div>
            <div class="col-md-12 mx-5 mt-5 mb-5">
                <p>{{ $article->detail }}</p>
            </div>
            <div class="col-md-12 d-flex justify-content-end">
                <small>แก้ไขเมื่อ {{ $article->updated_at->thaidate('j F Y H.i น.') }}</small>
            </div>
        </div>
    </div>
@endsection
