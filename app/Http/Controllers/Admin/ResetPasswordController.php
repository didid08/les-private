<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function __invoke($userID)
    {
        $user = User::where('id', $userID);

        if ($user->exists()) {
            $user->update([
                'password' => Hash::make($user->first()->email)
            ]);
            return redirect()->back()->with('success', 'Berhasil Mengatur Ulang Password');
        }
        return redirect()->back()->with('error', 'Gagal Mengatur Ulang Password#User Tidak Ditemukan');
    }
}
