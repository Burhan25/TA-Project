<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\DokterParamedik;
use Illuminate\Http\Request;

class ShowParamedikController extends Controller
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
        return view('frontend.paramedik', compact('kecamatan', 'paramedik'));
    }
}
