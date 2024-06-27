<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', 'user')->paginate(10);

        return view('admin.user.index', compact('users'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Chat::where('created_by', $request->id)->delete();
        User::where('id', $request->id)->delete();

        return redirect()->back()->with('success', 'Data user berhasil dihapus');
    }
}
