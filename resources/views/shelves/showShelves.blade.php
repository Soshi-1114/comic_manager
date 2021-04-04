@extends('shelves.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-sm-6">
                <nav class="card">
                    <div class="card-header text-center">本棚</div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach($shelves as $shelf)
                                <li class="list-group-item">
                                    <a href="/shelf/{{ $shelf->id }}/comics">{{ $shelf->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer">>
                        <a href="/editShelves" class="btn btn-primary btn-block">
                            本棚を編集する
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection
