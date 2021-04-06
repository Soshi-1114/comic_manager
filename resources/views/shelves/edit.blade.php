@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-sm-10">
                <nav class="card">
                    <div class="card-header text-center">本棚の更新</div>
                        <div class="card-body">
                            <a>現在のタイトルは:『{{ $shelf->title }}』です。</a>
                            <form action="/shelf/editShelves/edit" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{ $shelf->id }}">
                                    <input type="text" name="title" class="form-control" placeholder="New title">
                                </div>
                                <button type="submit" class="btn btn-primary">更新</button>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

@endsection

