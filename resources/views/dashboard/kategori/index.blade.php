@extends('dashboard.layouts.main')
@section('containerDB')

<div class="p-4">
    <div class="flex flex-nowrap">
        <div class="ml-auto mr-10">
            <button type="button" class="inline-flex items-end px-7 py-3 m-1 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-blue-800 kategori">
                Tambah Kategori
            </button>
        </div>
    </div>
</div>

<div class="container flex flex-wrap m-5">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-10 py-3">
                        Nama Kategori
                    </th>
                    
                    <th scope="col" class="px-10 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($kategori as $kat)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $loop->iteration }}
                        </th>
                        <td class="px-10 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $kat->namakategori }}
                        </td>
                        <td class="px-10 py-4 flex flex-auto">
                            <a href="/kategori/{{ $kat->id }}/edit" class="mx-1 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Edit
                            </a>
                        
                            <form action="/kategori/{{ $kat->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-lg w-full sm:w-auto px-5 py-1.5 mx-1 text-center dark:bg-red-750 dark:hover:bg-red-800 dark:focus:ring-red-900" onclick="return confirm('Konfirmasi, kategori {{ $kat->namakategori }} Akan Di Delete?')"><span data-feather="x-circle"></span><i class="fi fi-rs-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


{{-- modal tambah menu --}}
    <!-- Main modal -->
    <div id="kategori" tabindex="-1"  class="modal fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full bg-black bg-opacity-50">
        <div class="relative w-full h-full max-w-2xl mx-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Input Kategori
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <form action="/kategori" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="pb-2">
                            <label for="namakategori" class="block mb-6 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                            <input type="text" id="namakategori" name="namakategori" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Makanan" required>
                        </div>
                    
                        <!-- Modal footer -->
                        <div class="flex items-center p-2 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600 mt-4">
                            <button type="button" class="closeModal text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-auto mt-4" data-dismiss="modal">close</button>
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-auto mt-4">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



<script>
    //open close tambah modal
    const modal = document.querySelector('.modal');

    const kategori = document.querySelector('.kategori');
    const closeModal = document.querySelector('.closeModal');


    kategori.addEventListener('click', function(){
        modal.classList.remove('hidden')
    })

    closeModal.addEventListener('click', function(){
        modal.classList.add('hidden')
    })
    //open close tambah modal
</script>

@endsection