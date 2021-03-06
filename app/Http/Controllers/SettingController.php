<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
class SettingController extends Controller
{
    public function index()
    {
    	return view('main.setting');
    }

    public function save(Request $request)
    {
    	$validation = $request->validate([
            'name' => ['required', 'max:100'],
            'username' => ['required','unique:users'],
        ]);
    	$user = User::find(auth()->user()->id);
    	$user->name = $request->name;
    	$user->username = $request->username;
    	$user->save();

    	return redirect()->route('setting')->with('success', 'Data berhasil diubah');

    }

    public function changePassword(Request $request)
    {
    	$validation = $request->validate([
            'password' => ['required','string','min:6','confirmed'],
        ]);
    	$user = User::find(auth()->user()->id);
        $user->password = Hash::make($request->password);
        $user->save();
    	return redirect()->route('setting')->with('success', 'Password berhasil diubah');

    }
}
