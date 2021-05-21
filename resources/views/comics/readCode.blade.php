@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-sm-10">
            <nav class="card">
                <div class="card-header text-center">バーコード読み取り</div>
                <div class="card-body">
                    {{-- <video id="camera" width="300" height="200"></video>
                    <canvas id="picture" width="300" height="200"></canvas> --}}
                    {{-- <audio id="se" preload="auto">
                    <source src="camera-shutter1.mp3" type="audio/mp3">
                    </audio> --}}
                    {{-- <script>
                        window.onload = () => {
                            const video  = document.querySelector("#camera");
                            const canvas = document.querySelector("#picture");
                            const se     = document.querySelector('#se');

                            /** カメラ設定 */
                            const constraints = {
                            audio: false,
                            video: {
                                width: 300,
                                height: 100,
                                facingMode: "user"   // フロントカメラを利用する
                                // facingMode: { exact: "environment" }  // リアカメラを利用する場合
                            }
                            };

                            /**
                             * カメラを<video>と同期
                             */
                            navigator.mediaDevices.getUserMedia(constraints)
                            .then( (stream) => {
                            video.srcObject = stream;
                            video.onloadedmetadata = (e) => {
                                video.play();
                            };
                            })
                            .catch( (err) => {
                            console.log(err.name + ": " + err.message);
                            });
                        };
                    </script> --}}
                    @if ($items == null)
                        ＊バーコードを映すか、<br>ISBNコードを記入してください。
                        <form action="/shelf/{{ $current_shelf_id }}/comics/readCode" method="get">
                            @csrf
                            <input type="text" name="isbn_code" id="isbn_code" class="form-control" placeholder="Enter ISBN Code">
                            <input type="submit" class="btn btn-primary" value="検索">
                        </form>
                    @else
                        <p>ISBNコードの検索結果</p>
                        <hr>
                        <form action="/shelf/{{ $current_shelf_id }}/comics/add" method="post">
                            @csrf
                            <input type="hidden" name="shelf_id" class="form-control" value="{{ $current_shelf_id }}">
                            <h2>{{ $items['title']}}</h2>
                            <input type="hidden" name="title" class="form-control" value="{{ $items['title'] }}">
                            @if (array_key_exists('imageLinks', $items))
                                <img src="{{ $items['imageLinks']['thumbnail'] }}"><br>
                            @else
                                <img src="..." class="rounded" alt="...">
                            @endif
                            @if (array_key_exists('description', $items))
                                著者：{{ $items['authors'][0] }}<br>
                            @endif
                            @if (array_key_exists('publishedDate', $items))
                                発売年月：{{ $items['publishedDate'] }}<br>
                                <input type="hidden" name="release_date" class="form-control" value="{{ $items['publishedDate'] }}">
                            @endif
                            <div class="form-group form-check">
                                <input type="hidden" name="purchase_status" value="0">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="purchase_status" value="1">
                                <label class="form-check-label" for="exampleCheck1">購入済み</label>
                            </div>
                            <button type="submit" class="btn btn-primary">追加</button>
                            <hr>
                        </form>
                    @endif
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection
