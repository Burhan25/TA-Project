<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokters = User::where('role', UserRole::DOKTER)->paginate(10);
        return view('admin.dokter.index', compact('dokters'));
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
        $validated = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => UserRole::DOKTER,
        ]);

        $user->sendEmailVerificationNotification();

        return redirect()->back()->with('success', 'Dockter berhasil didaftarkan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        User::where('id', $request->dokter_id)->delete();

        return redirect()->back()->with('success', 'Dokter berhasil dihapus');
    }

    public function verify(Request $request)
    {
        $email = $request->input('email');

        $user = User::where('email', $email)->first();

        if ($user && ! $user->hasVerifiedEmail()) {
            $user->email_verified_at = Carbon::now();
            $user->save();

            return back()->with('resent', 'Email verification has been successfully sent.');
        }

        return back()->with('error', 'Invalid email or email is already verified.');
    }
    public function resendVerify(Request $request)
    {
        $email = $request->input('email');

        $user = User::where('email', $email)->first();

        if ($user && ! $user->hasVerifiedEmail()) {
            $user->sendEmailVerificationNotification();

            return back()->with('resent', 'Email verification has been successfully sent.');
        }

        return back()->with('error', 'Invalid email or email is already verified.');
    }
}
