@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-sm-5">
                <nav class="card">
                    <div class="card-header text-center">本棚一覧</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>タイトル</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($shelves as $shelf)
                                <tr>
                                    <td>{{ $shelf->title }}</td>
                                    <td>
                                        <form action="/shelf/editShelves/edit/{{$shelf->id}}" method="get" class="text-right">
                                            @csrf
                                            <input type="submit" class="btn btn-primary" value="編集">
                                        </form>
                                    </td>
                                    <td>
                                        <form action="/shelf/editShelves/delete/{{$shelf->id}}" method="get" class="text-right">
                                            @csrf
                                            <input type="submit" class="btn btn-danger" value="削除">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">>
                        <a href="/shelf/editShelves/add" class="btn btn-primary btn-block">
                            本棚を追加する
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>

@endsection

