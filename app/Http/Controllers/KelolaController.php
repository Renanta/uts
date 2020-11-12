<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class KelolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = json_decode(Storage::get('data.json', true));
        return view('kelola/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelola/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Storage::get("data.json");
        $decode = json_decode($data, true);
        $new = (object)[
            'title' => $request->title,
            'author' => $request->author,
            'content' => $request->content,
            'datetime' => date('Y-m-d H:i:s'),
            'image' => md5($request->title) . '.' . $request->file('image')->getClientOriginalExtension(),
        ];
        $request->file('image')->move('storage/img/', $new->image);

        array_push($decode, $new);
        Storage::put('data.json', json_encode($decode, JSON_PRETTY_PRINT));

        return redirect("/kelola");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = json_decode(Storage::get('data.json'));

        if (!isset($data[$id])) {
            abort(404);
        }
        return view('kelola/detail', [
            'id' => $id,
            'artikel' => $data[$id]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = json_decode(Storage::get('data.json'));

        if (!isset($data[$id])) {
            abort(404);
        }

        return view('kelola/edit', [
            'id' => $id,
            'artikel' => $data[$id]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = json_decode(Storage::get('data.json'), true);

        if (!isset($data[$id])) {
            abort(404);
        }

        $data[$id] = array_replace($data[$id], $request->except(['_method', '_token']));
        Storage::put('data.json', json_encode($data));

        return redirect('/kelola');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = json_decode(Storage::get('data.json'), true);

        if (!isset($data[$id])) {
            abort(404);
        }

        array_splice($data, $id, 1);

        Storage::put('data.json', json_encode($data));

        return redirect('/kelola');
    }
}
