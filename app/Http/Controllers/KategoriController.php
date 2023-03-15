<?php

namespace App\Http\Controllers;


use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
   
    public function index()
    {
        return view('dashboard.kategori.index', [
            'title' => 'Daftar Kategori',
            'header' => 'Daftar Kategori',
            'kategori' => Kategori::where('adminrm_id', auth()->user()->id)->get()
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namakategori' => 'required|max:255'
        ]);

        $validatedData['adminrm_id'] = auth()->user()->id;
        Kategori::create($validatedData);

        return redirect('/kategori');
    }

    public function show(Kategori $kategori)
    {
        //
    }

    public function edit(Kategori $kategori)
    {
        return view('dashboard.kategori.edit', [
            'title' => 'Edit Kategori',
            'header' => 'Edit Kategori',
            'kategori' => $kategori
        ]);
    }

    public function update(Request $request, Kategori $kategori)
    {
        $rules = [
            'namakategori' => 'required'
        ];

        $validatedData['adminrm_id'] = auth()->user()->id;
        $validatedData = $request->validate($rules);
         //dd($validatedData);

        Kategori::where('id', $kategori->id)->update($validatedData);

        return redirect('/kategori')->with('success', 'Post Has ben Update!!');
    }

    
    public function destroy(Kategori $kategori)
    {
        Kategori::destroy($kategori->id);

        return redirect('/kategori')->with('success', 'Delete kategori Success');
    }
}
