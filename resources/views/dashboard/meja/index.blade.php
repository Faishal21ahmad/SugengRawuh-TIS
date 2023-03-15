@extends('dashboard.layouts.main')
@section('containerDB')

<div class="p-4">
    <div class="flex flex-nowrap">
        <div class="ml-auto mr-10">
            <a href="/meja/create" class="inline-flex items-end px-7 py-3 m-1 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-blue-800 ">Tambah Meja</a>
        </div>
    </div>
</div>

<div class="container flex flex-wrap">
    @foreach ($meja as $item)
    <div class="m-2 max-w-xs bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
        <h1 class="text-gray-900 dark:text-white text-center p-5 text-xl font-bold">No. {{ $item['no']; }}</h1>
        <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white text-center">{{ $item['pesan']; }}</h5>
        <div class="px-5">
            <a href="{{ $item['link']; }}" target="_blank">
                <img class="rounded-lg bg-white p-3" src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ $item['link']; }}" />
            </a>
          
        </div>
        <div class="p-5 flex justify-center">
              
            <a download="qr.png" href="https://api.qrserver.com/v1/create-qr-code/?size=500x500&data={{ $item['link']; }}.png" target="_blank" title="qr" data-tooltip-target="tooltip-default"  class="mx-1 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Download
                <img  class="rounded-lg bg-white p-3 hidden" alt="qr" src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ $item['link']; }}" />
                <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Next page, Save As Image
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </a>
            <a href="/meja/{{ $item->id }}/edit" class="mx-1 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Detail
            </a>

            <form action="/meja/{{ $item->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-lg w-full sm:w-auto px-5 py-1.5 mx-1 text-center dark:bg-red-750 dark:hover:bg-red-800 dark:focus:ring-red-900" onclick="return confirm('Konfirmasi, Meja Nomor {{ $item->no }} Akan Di Delete?')"><span data-feather="x-circle"></span><i class="fi fi-rs-trash"></i></button>
                </form>
        </div>
    </div>
    @endforeach
</div>

{{-- modal tambah Meja --}}
    <!-- Main modal -->
    <div id="TambahMeja" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full ml-20">
        <div class="relative w-full h-full max-w-2xl md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Create QR Meja
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <form action="" method="post">
                        <div class="mb-6">
                            <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Meja</label>
                            <input type="text" id="large-input" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled value="5">
                        </div>
                        <div class="pb-2">
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pesan</label>
                            <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Isikan Pesan untuk pelanggan di meja"></textarea>
                        </div>
                        
                        
                    </form>
                    
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-toggle="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-auto">Simpan</button>
                    <button data-modal-toggle="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 ml-auto">Cencel</button>
                </div>
            </div>
        </div>
    </div>




@endsection