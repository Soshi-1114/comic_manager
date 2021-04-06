<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ShelfController extends Controller
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

    public function index()
    {
        $data = [
            'shelves' => $this->shelves,
        ];
        return view('shelves.showShelves', $data);
    }

    public function editor(Request $request)
    {
        $selected_shelf = DB::table('shelves')
            ->where('user_id', $this->user_id)
            ->where('id', $request->id)->first();
        $data = [
            'shelves' => $this->shelves,
            'form' => $selected_shelf,
        ];
        return view('shelves.editor', $data);
    }

    public function edit(int $id)
    {
        $selected_shelf = DB::table('shelves')
            ->where('user_id', $this->user_id)
            ->where('id', $id)->first();
        return view('shelves.edit', ['shelf' => $selected_shelf]);
    }

    public function update(Request $request)
    {
        $data = [
            'title' => $request->title,
        ];
        DB::table('shelves')
            ->where('user_id', $this->user_id)
            ->where('id', $request->id)
            ->update($data);
        return redirect('/shelf');
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
            'user_id' => $this->user_id,
        ];
        DB::table('shelves')
            ->insert($data);
        return redirect('/shelf/editShelves');
    }

    public function del(int $id)
    {
        $selected_shelf = DB::table('shelves')
            ->where('id', $id)
            ->first();
        return view('shelves.delete', ['shelf' => $selected_shelf]);
    }

    public function remove(Request $request)
    {
        DB::table('shelves')
            ->where('id', $request->shelf_id)
            ->delete();
        return redirect('/shelf/editShelves');
    }
}
