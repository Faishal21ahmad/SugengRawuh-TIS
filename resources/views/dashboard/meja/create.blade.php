@extends('dashboard.layouts.main')
@section('containerDB')
<div class="py-10 px-5 relative max-w-2xl mx-auto shadow-md bg-gray-800 border-gray-700 rounded-lg">

    <form action="/meja" method="POST">
        @csrf
        <div class="mb-6">
            <label for="no" class="block mb-2 text-sm font-medium text-white">Nomor Urut Meja</label>
        <input type="text" id="no" name="no" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" value="{{ $meja->no+1 }}" required>
        </div>
    
        <div class="mb-6">
            <label for="pesan" class="block mb-2 text-sm font-medium text-white">Pesan</label>
            <textarea id="pesan" name="pesan" rows="4" class="block p-2.5 w-full text-sm   rounded-lg border  focus:ring-blue-500 focus:border-blue-500 bg-gray-700 border-gray-600 placeholder-gray-400 text-white " placeholder="Scan Untuk Memesan . . . . ." value="Scan Untuk Memesan"  required></textarea>
        </div> 
    
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buat Meja</button>
        <a href="/meja" class="text-black bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-600">Kembali</a>
    </form>
    <div class="mt-5">
        @if(session()->has('found'))
        <div class="flex p-4 mb-4 text-sm text-red-700 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
            <span class="item-center" role="alert">{{ session('found') }} </span>
        </div>
        @endif
    </div>
    
      
</div>



@endsection