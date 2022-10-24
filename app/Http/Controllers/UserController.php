<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function changepass()
    {
        return view('admin.change_password');
    }

    public function change_password(Request $request)
    {

        $validatedData = $request->validate([
            'old_password' => 'required|min:5',
            'password' => 'required|min:5',
            'password_confirmation' => 'required|same:password',
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return redirect()->back()->with('status', 'Password lama salah / tidak sesuai!');
        }

        User::find(auth()->user()->id)->update(['password' => $request->password]);

        return redirect()->route('change_pass')->with('success', 'Password anda berhasil diubah!');
    }
}
