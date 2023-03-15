<?php

namespace App\Http\Controllers;

use App\Models\Adminrm;
use Illuminate\Http\Request;
use App\Models\MejaRM;
use App\Models\MenuRM;
use App\Models\Pesanan;
use App\Models\Kategori;
use App\Models\Pembayaran;
use App\Models\DetailPesanan;
use Illuminate\Support\Str;

class PesananController extends Controller
{

    public function index()
    {
        return view('dashboard.pesanan.index', [
            'title' => 'Pesan',
            'header' => 'Pesanan Masuk',
            'pesanan' => Pesanan::where('adminrm_id', auth()->user()->id)->get(),
            'detailPesanan' => DetailPesanan::all()
        ]);
    }
    public function proses()
    {
        return view('dashboard.pesanan.proses', [
            'title' => 'Pesan',
            'header' => 'Pesanan proses',
            'pesanan' => Pesanan::where('adminrm_id', auth()->user()->id)->get(),
            'detailPesanan' => DetailPesanan::all()
        ]);
    }
    public function selesai()
    {
        return view('dashboard.pesanan.selesai', [
            'title' => 'Pesan',
            'header' => 'Pesanan selesai',
            'pesanan' => Pesanan::where('adminrm_id', auth()->user()->id)->get(),
            'detailPesanan' => DetailPesanan::all()
        ]);
    }

    public function create($id, $rm_id)
    {
        session_start();
        $menu = MenuRM::where('adminrm_id', $rm_id)->get();
        $kategori = Kategori::where('adminrm_id', $rm_id)->get();
        $pembayaran = Pembayaran::where('adminrm_id', $rm_id)->get();
        $cart = session()->get('cart');
        $count = '';

        if (session('cart')) {
            $count = count(session('cart'));
        }

        return view('dashboard.pesanan.create', [
            'title' => 'Pesan',
            'kategori' => $kategori,
            'menu' => $menu,
            'meja' => $id,
            'pembayaran' => $pembayaran,
            'cart' => $cart,
            'count' => $count,
            'rm' => $rm_id
        ]);
    }


    public function update(Request $request, Pesanan $pesanan)
    {
        $rules = [
            'statuspesanan' => 'required'
        ];
        $validatedData = $request->validate($rules);
        Pesanan::where('id', $pesanan->id)->update($validatedData);
        return redirect('/pesanan')->with('success', 'Menu Has ben Update!!');
    }

    public function destroy(Pesanan $pesanan)
    {
        //
    }
    public function show(Pesanan $pesanan)
    {
        //
    }

    public function edit(Pesanan $pesanan)
    {
    }
    public function editstatus(Pesanan $pesanan)
    {
        //
    }
}
