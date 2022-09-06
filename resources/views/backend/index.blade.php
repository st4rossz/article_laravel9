@extends('backend.backendmaster')

@section('content')
    <section class="article my-5">
        <div class="btn btn-success">
            เพิ่มบทความ
        </div>
        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th>ชื่อบทความ</th>
                <th>รายละเอียด</th>
                <th>รูปภาพ</th>
                <th>เพิ่มเติม</th>
            </tr>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->detail }}</td>
                    <td>{{ $article->image }}</td>
                    <td><a type="button" class="btn btn-warning" href="">แก้ไข</a>
                        <a type="button" class="btn btn-danger" href="">ลบ</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
@endsection