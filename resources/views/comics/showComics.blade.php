@extends('shelves.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-sm-10">
            <nav class="card">
                <div class="card-header text-center">comic一覧</div>
                <div class="card-body">
                    <table class="table">
                    <thead>
                    <tr>
                        <th>タイトル</th>
                        <th>購入状態</th>
                        <th>発売日</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($comics as $comic)
                        <tr>
                            <td>{{ $comic->title }}</td>
                            <td>
                            <span class="label">{{ $comic->purchase_status }}</span>
                            </td>
                            <td>{{ $comic->release_date }}</td>
                            <td><a href="#">編集</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    <div class="card-footer">>
                        <a href="/shelf/{{$current_shelf_id}}/comics/add" class="btn btn-primary btn-block">
                            comicを追加する
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection
