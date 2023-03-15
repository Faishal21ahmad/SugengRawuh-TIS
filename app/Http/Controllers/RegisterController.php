<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adminrm;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('reg.index', [
            'title' => 'register'
        ]);
    }
    public function store(Request $request)
    {
        //validation data  
        $validateData = $request->validate([
            'namarm' => 'required|max:255',
            'owner' => 'required|min:3|max:255',
            'email' => 'required|max:255|email:dns|unique:adminrms',
            'email_verified_at' => '',
            'password' => 'required|min:5|max:255',
            'remember_token' => ''
        ]);

        // enkripsi password
        // $validateData['password'] = bcrypt($validateData['password']);

        // enkripsi password menggunakan hash
        $validateData['password'] = Hash::make($validateData['password']);
        $validateData['email_verified_at'] = now();
        $validateData['remember_token'] = Str::random(50);



        // input data adminRM ke database
        Adminrm::create($validateData);

        return redirect('/login')->with('success', 'Register Berhasil harap login');
    }
}
