@extends('dashboard.layouts.main')
@section('containerDB')

{{-- @dd($meja); --}}

<div class="py-10 px-10 relative max-w-5xl mx-auto shadow-md bg-gray-800 border-gray-700 rounded-lg">

    <form action="/meja/{{ $meja->id }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-6">
            <label for="no" class="block mb-2 text-sm font-medium text-white">Nomor Urut Meja</label>
            <input type="text" id="no" name="no" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" value="{{ $meja->no }}" required>
        </div>

        <div class="mb-6">
            <label for="pesan" class="block mb-2 text-sm font-medium text-white">Pesan</label>
            <input type="text" id="pesan" name="pesan" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" value="{{ $meja->pesan }}" required>
        </div> 
        <div class="mb-6">
            <label for="link" class="block mb-2 text-sm font-medium text-white">Link</label>
            <input type="text" id="link" name="link" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" value="{{ $meja->link }}" required disabled>
        </div>
        <div class="mb-6 flex flex-auto">
            <div class="mb-6">
                <label for="qr" class="block mb-2 text-sm font-medium text-white">QR</label>
                {{-- <img src="{{ asset('img/' . $meja->qr );}}" class="max-w-md rounded-lg" id="qr" name="qr"> --}}
                <img class="rounded-lg bg-white p-3 w-60"  src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ $meja->link; }}" />
            </div>
            <div class="p-7">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan Edit</button>
                <a href="/meja" class="text-black bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-600">Kembali</a>
                
            </div>
        </div>
    </form>

</div>




@endsection
