<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UbahPasswordController extends Controller
{
    public function __invoke(Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $validator = Validator::make($request->all(), [
                'password_baru' => 'required|min:3|max:30',
                'password_baru_ulang' => 'required|min:3|max:30|same:password_baru'
            ], [
                'required' => ':attribute tidak boleh kosong',
                'min' => ':attribute tidak boleh kurang dari 3 karakter',
                'max' => ':attribute tidak boleh lebih dari 30 karakter',
                'password_baru_ulang.same' => ':attribute tidak sesuai'
            ], [
                'password_baru' => 'Password Baru',
                'password_baru_ulang' => 'Password Baru yang Diulang'
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'password_lama' => 'required',
                'password_baru' => 'required|min:3|max:30',
                'password_baru_ulang' => 'required|min:3|max:30|same:password_baru'
            ], [
                'required' => ':attribute tidak boleh kosong',
                'min' => ':attribute tidak boleh kurang dari 3 karakter',
                'max' => ':attribute tidak boleh lebih dari 30 karakter',
                'password_baru_ulang.same' => ':attribute tidak sesuai'
            ], [
                'password_lama' => 'Password Lama',
                'password_baru' => 'Password Baru',
                'password_baru_ulang' => 'Password Baru yang Diulang'
            ]);
        }

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        if (Auth::user()->role != 'admin') {
            if (!Hash::check($validated['password_lama'], Auth::user()->password)) {
                return redirect()->back()->with('error', 'Gagal Mengubah Password#Password Lama yang Anda Masukkan Salah');
            }
        }

        User::where('id', Auth::id())->update([
            'password' => Hash::make($validated['password_baru'])
        ]);

        return redirect()->back()->with('success', 'Berhasil Mengubah Password');
    }
}
