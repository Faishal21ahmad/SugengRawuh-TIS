@extends('dashboard.layouts.main')
@section('containerDB')


<div class="p-4">
    <div class="flex flex-nowrap">
        <div class="justify-items-start">
            <a href="" class="inline-flex items-center px-9 py-3 m-1 text-sm font-medium text-center text-white bg-blue-700 rounded-full hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-blue-800">Semua</a>
            @foreach ($kategori as $kat)
            <a href="" class="inline-flex items-center px-9 py-3 m-1 text-sm font-medium text-center text-white bg-blue-700 rounded-full hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-blue-800">{{ $kat->namakategori }}</a>
            @endforeach
        </div>
        <div class="ml-auto mr-10">
            <a href="menu/create" class="inline-flex items-end px-7 py-3 m-1 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-blue-800">Tambah Menu</a>
    </div>
</div>



<div class="container flex flex-wrap">
    @foreach ($menu as $item)
    <div class="m-2 max-w-xs bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700" >
        @if ($item['img'])
            <img class="rounded-t-lg object-cover h-64 w-96" src="{{ asset('storage/' . $item['img']); }}" alt="" />
        @else
            <img class="rounded-t-lg object-cover h-64 w-96" src="{{ asset('img/404.png'); }}" alt="" >
        @endif
        <div class="p-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $item['menu']; }} 
                <a href="/menu/{{ $item['id']; }}/edit" class="float-right items-center viewMenuvi"><i class="fi fi-br-menu-dots-vertical"></i></a></h5>
            <p class="mb-4 font-normal text-gray-700 dark:text-gray-400">Rp.{{ $item['harga']; }}</p>
        </div>
        <div class="p-5 flex flex-auto">
            @if ($item['status'] === 'tersedia')
            <a href="" class="inline-flex w-full items-baseline py-3 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 "> 
                <p class="mx-auto flex items-center">Tersedia</p>
            </a>
            @else
            <a href="" class="inline-flex w-full items-baseline py-3 text-sm font-medium text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 "> 
                <p class="mx-auto flex items-center">Tidak Tersedia</p>
            </a>
            @endif
            <form action="/menu/{{ $item['id']; }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-lg w-full sm:w-auto px-5 py-2 ml-2  text-center dark:bg-red-750 dark:hover:bg-red-800 dark:focus:ring-red-900" onclick="return confirm('Konfirmasi, Menu  {{ $item['menu'] }} Akan Di Delete?')"><span data-feather="x-circle"></span><i class="fi fi-rs-trash"></i></button>
            </form>
        </div>
    </div>
    @endforeach
</div>



{{-- modal detail menu --}}
    <div id="DetailMenu" tabindex="-1"  class="vimodal fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full bg-black bg-opacity-50">
        <div class="relative w-full h-full max-w-2xl mx-auto">p
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Detail Menu</h3>
                    <button type="button"  class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                        <span class="sr-only" data-dismiss="modal">Close moda</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <form action="/menu" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="pb-2">
                            <label for="menu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Menu</label>
                            <input type="text" id="menu" name="menu" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Menu . . . . " required>
                        </div>
                        <div class="pb-2">
                            <label for="desmenu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Menu</label>
                            <textarea id="desmenu" name="desmenu" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Diracik dengan Hati . . . . ."></textarea>
                        </div>
                        <div class="pb-2">
                            <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Menu</label>
                            <input type="text" id="harga" name="harga" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rp. . . . . .">
                        </div>
                        <div class="pb-2">
                            <label for="kategori_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                            <select id="kategori_id" name="kategori_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($kategori as $kat)
                                    @if(old('kategori_id') == $kat->id)
                                        <option value="{{ $kat->id }}" selected>{{ $kat->namakategori }}</option>
                                    @else
                                        <option value="{{ $kat->id }}">{{ $kat->namakategori }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="pd-2 flex items-center">
                            <div class="mr-auto">
                                <h3 class="my-5 text-sm font-medium text-gray-900 dark:text-white">Upload Image</h3>
                                <div class="flex items-center justify-center w-full">
                                    <label for="img" class="flex flex-col items-center justify-center h-48 w-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <img class="img-preview z-10 overflow-hidden object-cover h-48 w-64">
                                        <div class="z-0 absolute">
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                        </div>
                                        <input id="img" name="img" type="file" class="hidden" onchange="previewImage()"/>
                                    </label>
                                </div> 
                            </div>
                            <div class="mr-auto mb-auto">
                                <h3 class="my-5 text-sm font-medium text-gray-900 dark:text-white">Status</h3>
                                <ul class="grid w-full gap-6 md:grid-cols-2">
                                    <li>
                                        <input type="radio" id="tersedia" name="status" value="tersedia" class="hidden peer" required>
                                        <label for="tersedia" class="inline-flex items-center justify-between w-full p-3 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                                            <div class="block">
                                                <P class="w-full text-sm font-semibold">Tersedia</P>
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <input type="radio" id="taktersedia" name="status" value="taktersedia" class="hidden peer">
                                        <label for="taktersedia" class="inline-flex items-center justify-between w-full p-3 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            <div class="block">
                                                <P class="w-full text-sm font-semibold">Belum Tersedia</P>
                                            </div>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="button" class="closeModalvi text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-auto" >close</button>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-auto">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

        //open close tambah modal
        const modal = document.querySelector('.modal');

        const TambahMenu = document.querySelector('.tambahMenu');
        const closeModal = document.querySelector('.closeModal');
        
        TambahMenu.addEventListener('click', function(){
            modal.classList.remove('hidden')
        })

        closeModal.addEventListener('click', function(){
            modal.classList.add('hidden')
        })
        //open close tambah modal

        //open close tambah modal
        const vimodal = document.querySelector('.vimodal');

        const ViewMenu = document.querySelector('.viewMenuvi');
        const closeModalvi = document.querySelector('.closeModalvi');
        
        ViewMenu.addEventListener('click', function(){
            vimodal.classList.remove('hidden')
        })

        closeModalvi.addEventListener('click', function(){
            vimodal.classList.add('hidden')
        })
        //open close tambah modal

        //image
        function previewImage(){
            const image = document.querySelector('#img');
            const imgPreview = document.querySelector('.img-preview');
            
            imgPreview.style.display = 'block';
            
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
    
            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }

    </script>


@endsection