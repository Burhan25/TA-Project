<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.paramedik.kecamatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Kecamatan::query()->create($request->all());
        return redirect()->route('admin.paramedik.list')->with('success', 'Kecamatan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kecamatan = Kecamatan::findOrFail($id);

        return view('admin.paramedik.kecamatan.edit', compact('kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kecamatan = Kecamatan::find($id);
        $kecamatan->update($request->all());

        return redirect()->route('admin.paramedik.list')->with('success', 'Kecamatan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kecamatan = Kecamatan::find($id);
        $kecamatan->delete();

        return redirect()->route('admin.paramedik.list')->with('success', 'Kecamatan deleted successfully.');

    }
}
