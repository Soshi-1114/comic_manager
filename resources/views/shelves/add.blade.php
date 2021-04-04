@extends('shelves.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-sm-10">
                <nav class="card">
                    <div class="card-header text-center">本棚のタイトル</div>
                        <div class="card-body">
                            <form action="/shelf/editShelves/add" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" placeholder="Enter title">
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

