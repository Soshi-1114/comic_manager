@extends('shelves.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-sm-10">
                <nav class="card">
                    <div class="card-header text-center">本棚一覧</div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach($shelves as $shelf)
                                <li class="list-group-item">
                                    {{ $shelf->title }}
                                    <form action="/editShelves/delete/{{$shelf->id}}" method="get" class="text-right">
                                        @csrf
                                        <input type="submit" class="btn btn-danger" value="削除">
                                    </form>
                                    {{-- <a href="/editShelves/delete" class="btn btn-danger text-right" value={{ $shelf->id }}>削除</a> --}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer">>
                        <a href="/editShelves/add" class="btn btn-primary btn-block">
                            本棚を追加する
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>

@endsection

