@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-sm-10">
            <nav class="card">
                <div class="card-header text-center">comic一覧</div>
                <div class="card-body">
                    <form action="/shelf/{{ $current_shelf_id }}/comics/search" method="get" class="text-right">
                        @csrf
                        <input type="text" name="keyword" class="form-control" placeholder="Enter keyword">
                        <input type="submit" class="btn btn-primary" value="検索">
                    </form>
                    @if ($items == null)
                    <p>書籍名を入力してください。</p>
                    @else
                    <p>「{{ $keyword }}」の検索結果</p>
                    <hr>
                    @foreach ($items as $item)
                        <form action="/shelf/{{ $current_shelf_id }}/comics/add" method="post">
                            @csrf
                            <input type="hidden" name="shelf_id" class="form-control" value="{{ $current_shelf_id }}">
                            <h2>{{ $item['volumeInfo']['title']}}</h2>
                            <input type="hidden" name="title" class="form-control" value="{{ $item['volumeInfo']['title'] }}">
                            @if (array_key_exists('imageLinks', $item['volumeInfo']))
                                <img src="{{ $item['volumeInfo']['imageLinks']['thumbnail'] }}"><br>
                            @else
                                <img src="..." class="rounded" alt="...">
                            @endif
                            @if (array_key_exists('description', $item['volumeInfo']))
                                著者：{{ $item['volumeInfo']['authors'][0] }}<br>
                            @endif
                            @if (array_key_exists('publishedDate', $item['volumeInfo']))
                                発売年月：{{ $item['volumeInfo']['publishedDate'] }}<br>
                                <input type="hidden" name="release_date" class="form-control" value="{{ $item['volumeInfo']['publishedDate'] }}">
                            @endif
                            <div class="form-group form-check">
                                <input type="hidden" name="purchase_status" value="0">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="purchase_status" value="1">
                                <label class="form-check-label" for="exampleCheck1">購入済み</label>
                            </div>
                            <button type="submit" class="btn btn-primary">追加</button>
                            {{-- <br>
                            @foreach ($item['volumeInfo']['industryIdentifiers'] as $industryIdentifier)
                                        {{ $industryIdentifier['type'] }}&nbsp;：&nbsp;{{ $industryIdentifier['identifier'] }} <br>
                            @endforeach
                            <br>
                            @if (array_key_exists('description', $item['volumeInfo']))
                                概要：{{ $item['volumeInfo']['description'] }}<br>
                            @endif
                            <br> --}}
                            <hr>
                        </form>
                    @endforeach
                    {{-- <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav> --}}
                    @endif
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection
