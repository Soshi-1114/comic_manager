<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shelf;
use Illuminate\Support\Facades\DB;

class ShelfController extends Controller
{
    public function index()
    {
        $shelves = Shelf::all();
        $data = [
            'shelves' => $shelves,
        ];
        return view('shelves.showShelves', $data);
    }

    public function edit(Request $request)
    {
        $shelves = Shelf::all();
        $selected_shelf = DB::table('shelves')
            ->where('id', $request->id)->first();
        $data = [
            'shelves' => $shelves,
            'form' => $selected_shelf,
        ];
        return view('shelves.editShelves', $data);
    }

    public function update(Request $request)
    {
        $data = [
            'title' => $request->title,
        ];
        DB::table('shelves')
            ->where('id', $request->id)
            ->update($data);
        return redirect('/');
    }

    public function add()
    {
        return view('shelves.add');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $data = [
            'title' => $request->title,
        ];
        DB::table('shelves')->insert($data);
        return redirect('/shelf/editShelves');
    }

    public function del(int $id)
    {
        $selected_shelf = DB::table('shelves')
            ->where('id', $id)->first();
        return view('shelves.delete', ['shelf' => $selected_shelf]);
    }

    public function remove(Request $request)
    {
        DB::table('shelves')
            ->where('id', $request->id)->delete();
        return redirect('/shelf/editShelves');
    }
}
