@extends('shelves.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-sm-10">
                <div class="card text-center">
                    <div class="card-header">
                        注意！！
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">本棚：：{{ $shelf->title }}を削除しますか？</h5>
                        <p class="card-text"></p>
                        <form action="/editShelves/delete" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $shelf->id }}">
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
