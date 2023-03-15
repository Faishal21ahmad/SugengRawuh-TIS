@extends('dashboard.layouts.main')
@section('containerDB')

<div class="max-w-2xl mx-auto bg-gray-800 rounded-lg">
    <div class="flex items-start justify-between border-b rounded-t border-gray-600 p-4">
        <h3 class="text-xl font-semibold text-white">
            Edit Kategori
        </h3>
    </div>

    <div class="p-5">
        <form action="/kategori/{{ $kategori->id }}" method="post">
            @method('put')
            @csrf
            <label for="namakategori" class="block mb-2 text-sm font-medium text-white">Kategori</label>
            <input type="text" id="namakategori" name="namakategori" class="blockborder text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" value="{{ $kategori->namakategori }}">
            
                <div class="flex items-center pt-4 space-x-2 border-t border-gray-200 rounded-b mt-5">
                    <a href="/kategori" class="ml-auto text-black bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-600">Kembali</a>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                </div>
        </form>
        
    </div>
</div>

@endsection