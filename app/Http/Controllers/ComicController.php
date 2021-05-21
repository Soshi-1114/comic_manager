<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shelf;
use App\Comic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;


class ComicController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            // ココに書く
            $this->user_id = \Auth::user()->id;
            $this->shelves = DB::table('shelves')
                ->where('user_id', $this->user_id)
                ->get();

            return $next($request);
        });
    }

    public function index(int $id)
    {
        $current_shelf = Shelf::find($id);
        $comics = $current_shelf->comics()->get();
        $data = [
            'shelves' => $this->shelves,
            'current_shelf_id' => $current_shelf->id,
            'comics' => $comics,
        ];
        return view('comics.showComics', $data);
    }

    public function add(int $id)
    {
        $data = [
            'current_shelf_id' => $id,
        ];
        return view('comics.add', $data);
    }

    public function create(Request $request)
    {
        $request->validate([
            'shelf_id' => 'numeric',
            'title' => 'required',
            'release_date' => 'date',
            'purchase_status' => 'boolean',
        ]);

        $data = [
            'shelf_id' => $request->shelf_id,
            'title' => $request->title,
            'release_date' => $request->release_date,
            'purchase_status' => $request->purchase_status,
        ];
        DB::table('comics')->insert($data);
        return redirect()->route('comics', ['id' => $request->shelf_id]);
    }

    public function del(int $id, int $comic_id)
    {
        $selected_comic = DB::table('comics')
            ->where('shelf_id', $id)
            ->where('id', $comic_id)
            ->first();

        $data = [
            'comic' => $selected_comic,
            'current_shelf_id' => $id,
        ];
        return view('comics.delete', $data);
    }

    public function remove(Request $request)
    {
        DB::table('comics')
            ->where('id', $request->id)->delete();
        return redirect()->route('comics', ['id' => $request->shelf_id]);
    }

    public function search(Request $request, int $id)
    {
        $items = null;
        if (!empty($request->keyword)) {
            $title = urlencode($request->keyword);
            $url = 'https://www.googleapis.com/books/v1/volumes?q=' . $title . '&country=JP&tbm=bks';
            $client = new Client();
            $response = $client->request("GET", $url);
            $body = $response->getBody();
            $bodyArray = json_decode($body, true);
            $items = $bodyArray['items'];
        }

        $data = [
            'current_shelf_id' => $id,
            'items' => $items,
            'keyword' => $request->keyword,
        ];
        dump($items);
        return view('comics.search', $data);
    }

    public function readCode(Request $request, int $id)
    {
        $items = null;
        if (!empty($request->isbn_code)) {
            $isbn = urlencode($request->isbn_code);
            $url = 'https://www.googleapis.com/books/v1/volumes?q=isbn:' . $isbn;
            $client = new Client();
            $response = $client->request("GET", $url);
            $body = $response->getBody();
            $bodyArray = json_decode($body, true);
            $items = $bodyArray['items'][0]['volumeInfo'];
        }

        $data = [
            'current_shelf_id' => $id,
            'items' => $items,
            'isbn_code' => $request->isbn_code,
        ];
        dump($items);
        return view('comics.readCode', $data);
    }
}
