@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-sm-10">
                <nav class="card">
                    <div class="card-header text-center">comic新規登録</div>
                        <div class="card-body">
                            <form action="/shelf/{{ $current_shelf_id }}/comics/add" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="shelf_id" class="form-control" value="{{ $current_shelf_id }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">タイトル</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter title">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">発売日</label>
                                    <input type="date" name="release_date" class="form-control">
                                </div>
                                <div class="form-group form-check">
                                    <input type="hidden" name="purchase_status" value="0">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="purchase_status" value="1">
                                    <label class="form-check-label" for="exampleCheck1">購入済み</label>
                                </div>
                                <button type="submit" class="btn btn-primary">追加</button>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection
