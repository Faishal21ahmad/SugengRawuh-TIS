<?php

namespace App\Http\Controllers;


use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    public function index()
    {
        return view('dashboard.pembayaran.index', [
            'title' => 'Daftar Metode Pembayaran',
            'header' => 'Daftar Metode Pembayaran',
            'pembayaran' => Pembayaran::where('adminrm_id', auth()->user()->id)->get()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namapembayaran' => 'required|max:255',
            'qrpembayaran' => 'image|file|max:1024',
        ]);

        if ($request->file('qrpembayaran')) {
            $validatedData['qrpembayaran'] = $request->file('qrpembayaran')->store('pay-img');
        }
        $validatedData['adminrm_id'] = auth()->user()->id;

        Pembayaran::create($validatedData);

        return redirect('/pembayaran');
    }

    public function edit(Pembayaran $pembayaran)
    {
        return view('dashboard.pembayaran.edit', [
            'title' => 'Edit Metode Pembayaran',
            'header' => 'Edit Metode Pembayaran',
            'pembayaran' => $pembayaran
        ]);
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $rules = [
            'namapembayaran' => 'required|max:255',
            'qrpembayaran' => 'image|file|max:1024',
        ];

        $validatedData['adminrm_id'] = auth()->user()->id;
        $validatedData = $request->validate($rules);

        if ($request->file('qrpembayaran')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['qrpembayaran'] = $request->file('qrpembayaran')->store('pay-img');
        }

        Pembayaran::where('id', $pembayaran->id)->update($validatedData);

        return redirect('/pembayaran')->with('success', 'pembayaran Has ben Update!!');
    }
    public function destroy(Pembayaran $pembayaran)
    {
        if ($pembayaran->qrpembayaran) {
            Storage::delete($pembayaran->qrpembayaran);
        }

        Pembayaran::destroy($pembayaran->id);

        return redirect('/pembayaran')->with('success', 'Delete pembayaran Success');
    }
}
