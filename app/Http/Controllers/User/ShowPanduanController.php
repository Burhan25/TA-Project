<?php

// ShowPanduanController.php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Panduan;

class ShowPanduanController extends Controller
{
    public function showUserPanduans()
    {
        $panduans = Panduan::all();
        return view('frontend.panduan', compact('panduans'));
    }
}


