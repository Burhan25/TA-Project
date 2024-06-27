<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DokterParamedik;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ParamedikController extends Controller
{
    public function index(Request $request)
    {
        $kecamatan = Kecamatan::all();
        $selectedKecamatanId = $request->get('domisili');

        if ($selectedKecamatanId) {
            $paramedik = DokterParamedik::where('domisili', $selectedKecamatanId)->with('domisiliId')->get();
        } else {
            $paramedik = DokterParamedik::with('domisiliId')->get();
        }

        return view('admin.paramedik.index', compact('kecamatan', 'paramedik'));
    }



    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('admin.paramedik.create', compact('kecamatan'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('images'), $fileName);
            $data['foto'] = $fileName;
        }

        DokterParamedik::query()->create($data);

        return redirect()->route('admin.paramedik.list')->with('success', 'Dokter paramedik created successfully.');
    }

    public function edit(string $id)
    {
        $paramedik = DokterParamedik::findOrFail($id);
        $kecamatan = Kecamatan::all();
        return view('admin.paramedik.edit', compact('kecamatan', 'paramedik'));
    }

    public function update(Request $request, string $id)
    {
        $paramedik = DokterParamedik::find($id);
        $data = $request->all();

        if ($request->hasFile('foto')) {
            // Delete old image if it exists
            if ($paramedik->foto && Storage::exists('images/' . $paramedik->foto)) {
                Storage::delete('images/' . $paramedik->foto);
            }

            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('images'), $fileName);
            $data['foto'] = $fileName;
        }

        $paramedik->update($data);

        return redirect()->route('admin.paramedik.list')->with('success', 'Dokter paramedik updated successfully.');
    }

    public function destroy(string $id)
    {
        $paramedik = DokterParamedik::find($id);

        if ($paramedik->foto && Storage::exists('images/' . $paramedik->foto)) {
            Storage::delete('images/' . $paramedik->foto);
        }

        $paramedik->delete();

        return redirect()->route('admin.paramedik.list')->with('success', 'Dokter paramedik deleted successfully.');
    }
}
