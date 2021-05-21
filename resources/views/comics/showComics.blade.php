@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-sm-10">
            <nav class="card">
                <div class="card-header text-center">title一覧</div>
                <div class="card-body">
                    <table class="table">
                    <thead>
                    <tr>
                        <th>タイトル</th>
                        <th>所持</th>
                        <th>発売日</th>
                        <th></th>
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
                            <td>
                                <form action="/shelf/{{ $current_shelf_id }}/comics/delete/{{ $comic->id }}" method="get" class="text-right">
                                    @csrf
                                    <input type="submit" class="btn btn-danger" value="削除">
                                </form>
                                {{-- <a href="/shelf/{{ $current_shelf_id }}/comics/delete/{{ $comic->id }}">削除</a> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    <div class="card-footer">>
                        <a href="/shelf/{{ $current_shelf_id }}/comics/add" class="btn btn-primary btn-block">
                            comicを追加する
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection
