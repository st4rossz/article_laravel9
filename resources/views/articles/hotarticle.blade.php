@extends('master')

@section('content')
    <section class="hot-article my-5">
        <div class="row mb-3">
            <div class="col-md-6">
                <h5>บทความมาแรง</h5>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <a class="btn btn-outline-secondary" href="">ดูทั้งหมด <i class="fas fa-long-arrow-right ml-2"></i></a>
            </div>
        </div>
        <div class="row">
            @for ($i = 1; $i <= 3; $i++)
            <div class="col-md-4">
                <div class="card">
                    <img src="https://dummyimage.com/600x400/000/fff" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
            @endfor
        </div>
    </section>
@endsection
