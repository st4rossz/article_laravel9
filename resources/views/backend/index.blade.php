@extends('backend.backendmaster')

@section('content')
    <section class="article my-5">
        <a class="btn btn-success" href="{{ route('article.create') }}">
            เพิ่มบทความ
        </a>
        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th>ประเภท</th>
                <th>ชื่อบทความ</th>
                <th>รายละเอียด</th>
                <th>รูปภาพ</th>
                <th>เพิ่มเติม</th>
            </tr>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>
                        @if ($article->type == 1)
                            ข่าวคริปโต
                        @elseif($article->type == 2)
                            ข่าวฟุตบอล
                        @else
                            ข่าวอื่น ๆ
                        @endif
                    </td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->detail }}</td>
                    <td>{{ $article->image }}</td>
                    <td class="d-flex"><a type="button" class="btn btn-warning" href="{{ route('article.edit', $article->id) }}">แก้ไข</a>
                        <form action="{{ route('article.destroy', $article->id) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger ml-auto">ลบ</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{-- {!! $article->links('pagination::bootstrap-5') !!} --}}
    </section>
@endsection
