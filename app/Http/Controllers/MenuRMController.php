<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\MenuRM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuRMController extends Controller
{
    //Menampilkan Halaman Menu
    public function index()
    {
        return view('dashboard.menu.index', [
            'title' => 'List Menu',
            'header' => 'Daftar Menu',
            'menu' => MenuRM::where('adminrm_id', auth()->user()->id)->get(),
            'kategori' => Kategori::where('adminrm_id', auth()->user()->id)->get()
        ]);
    }
    //Menampilkan Halaman Tambah Menu
    public function create()
    {
        return view('dashboard.menu.create', [
            'title' => 'Tambah Menu',
            'header' => 'Tambah Menu',
            'kategori' => Kategori::where('adminrm_id', auth()->user()->id)->get()
        ]);
    }
    //Proses Input Menu ke database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'adminrm_id' => '',
            'kategori_id' => 'required',
            'menu' => 'required|max:255',
            'desmenu' => 'required|max:255',
            'harga' => 'required|max:255',
            'img' => 'image|file|max:1024',
            'status' => 'required'
        ]);
        if ($request->file('img')) {
            $validatedData['img'] = $request->file('img')->store('menu-img');
        }
        $validatedData['adminrm_id'] = auth()->user()->id;
        MenuRM::create($validatedData);
        return redirect('/menu');
    }

    public function show($id)
    {
        //
    }

    //Menampilkan Halaman Edit Menu
    public function edit(MenuRM $menu)
    {
        return view('dashboard.menu.edit', [
            'title' => 'Edit Menu',
            'header' => 'Edit Menu',
            'kategori' => Kategori::where('adminrm_id', auth()->user()->id)->get(),
            'menu' => $menu
        ]);
    }
    //Melakukan proses Update data Menu
    public function update(Request $request, MenuRM $menu)
    {
        $rules = [
            'adminrm_id' => '',
            'kategori_id' => 'required',
            'menu' => 'required|max:255',
            'desmenu' => 'required|max:255',
            'harga' => 'required|max:255',
            'img' => 'image|file|max:1024',
            'status' => 'required'
        ];
        $validatedData = $request->validate($rules);
        //Mendelete file img di folder storage
        if ($request->file('img')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['img'] = $request->file('img')->store('menu-img');
        }
        MenuRM::where('id', $menu->id)->update($validatedData);
        return redirect('/menu')->with('success', 'Menu Has ben Update!!');
    }

    //Melakukan proses Delete data Menu
    public function destroy(MenuRM $menu)
    {
        //Mendelete file img di folder storage
        if ($menu->img) {
            Storage::delete($menu->img);
        }
        MenuRM::destroy($menu->id);
        return redirect('/menu')->with('success', 'Delete Meja Success');
    }
}
