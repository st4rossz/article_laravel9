@extends('master')

@section('content')
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($banners as $key => $banner)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ url('storage/banners/' . $banner->image) }}" class="d-block w-100">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container">
        <section class="hot-article my-5">
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>บทความมาแรง</h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a class="btn btn-outline-secondary" href="">ดูทั้งหมด <i
                            class="fas fa-long-arrow-right ml-2"></i></a>
                </div>
            </div>
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <img src="{{ url('storage/images/' . $article->image) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p class="card-text">{{ $article->detail }}</p>
                                <div class="col-md-12 d-flex justify-content-end">
                                    <a href="{{ url('article/' . $article->id) }}" class="btn btn-primary">ดูเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="crypto my-5">
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>ข่าวคริปโต</h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a class="btn btn-outline-secondary" href="">ดูทั้งหมด <i
                            class="fas fa-long-arrow-right ml-2"></i></a>
                </div>
            </div>
            <div class="row">
                @foreach ($crypto_articles as $article)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ url('storage/images/' . $article->image) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p class="card-text">{{ $article->detail }}</p>
                                <div class="col-md-12 d-flex justify-content-end">
                                    <a href="#" class="btn btn-primary">ดูเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="soccer my-5">
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>ข่าวฟุตบอล</h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a class="btn btn-outline-secondary" href="">ดูทั้งหมด <i
                            class="fas fa-long-arrow-right ml-2"></i></a>
                </div>
            </div>
            <div class="row">
                @foreach ($football_articles as $article)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ url('storage/images/' . $article->image) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p class="card-text">{{ $article->detail }}</p>
                                <div class="col-md-12 d-flex justify-content-end">
                                    <a href="#" class="btn btn-primary">ดูเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="others my-5">
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5>ข่าวอื่น ๆ</h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a class="btn btn-outline-secondary" href="">ดูทั้งหมด <i
                            class="fas fa-long-arrow-right ml-2"></i></a>
                </div>
            </div>
            <div class="row">
                @foreach ($other_articles as $article)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ url('storage/images/' . $article->image) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p class="card-text">{{ $article->detail }}</p>
                                <div class="col-md-12 d-flex justify-content-end">
                                    <a href="#" class="btn btn-primary">ดูเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <div id="scrolltest">
            TEST SCROLL
        </div>
    </div>
@endsection
