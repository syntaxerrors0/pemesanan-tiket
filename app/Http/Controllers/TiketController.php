<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tikets = Tiket::all()->iterator_to_array();
        return array_reverse($tikets);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tiket = new Tiket([
            'name' => $request->input('name'),
            'detail' => $request->input('detail')
        ]);
        $tiket->save();
        return response()->json('Product created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tiket $tiket)
    {
        $tiket = Tiket::find($id);
        return response()->json($tiket);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tiket $tiket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tiket $tiket)
    {
        $tiket = Tiket::find($id);
        $tiket->update($request->all());
        return response()->json('Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tiket $tiket)
    {
        $tiket = Tiket::find($id);
        $tiket->delete();
        return response()->json('Product deleted!');
    }
}
