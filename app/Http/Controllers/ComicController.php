<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shelf;
use App\Comic;
use Illuminate\Support\Facades\DB;


class ComicController extends Controller
{
    public function index(int $id)
    {
        // すべてのフォルダを取得する
        $shelves = Shelf::all();

        // 選ばれたフォルダを取得する
        $current_shelf = Shelf::find($id);

        // 選ばれたフォルダに紐づくタスクを取得する
        $comics = $current_shelf->comics()->get();
        $data = [
            'shelves' => $shelves,
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
}
