@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-sm-10">
                <div class="card text-center">
                    <div class="card-header">
                        注意！！
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">comic : 『{{ $comic->title }}』を削除しますか？</h5>
                        <p class="card-text"></p>
                        <form action="/shelf/{{ $current_shelf_id }}/comics/delete" method="post">
                            @csrf
                            <input type="hidden" name="shelf_id" value="{{ $current_shelf_id }}">
                            <input type="hidden" name="id" value="{{ $comic->id }}">
                            <input type="submit" class="btn btn-danger" value="削除">
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        元に戻せません。
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
