@extends('dashboard.layouts.main')
@section('containerDB')

<div class="relative w-full h-full max-w-3xl mx-auto">
 
    <div class="relative  rounded-lg shadow bg-gray-800">
      
        <div class="flex items-start justify-between p-4 border-b rounded-t border-gray-600">
            <h3 class="text-xl font-semibold text-white">
                Input Menu
            </h3>
        </div>
  
        <div class="p-6 space-y-6">
            <form action="/menu" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="pb-2">
                    <label for="menu" class="block mb-2 text-sm font-medium text-white">Nama Menu</label>
                    <input type="text" id="menu" name="menu" class="block w-full p-2  border  rounded-lg sm:text-xs   bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Nama Menu . . . . " required>
                </div>
                <div class="pb-2">
                    <label for="desmenu" class="block mb-2 text-sm font-medium text-white">Deskripsi Menu</label>
                    <textarea id="desmenu" name="desmenu" rows="4" class="block p-2.5 w-full text-sm  rounded-lg border    bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Diracik dengan Hati . . . . ."></textarea>
                </div>
                <div class="pb-2">
                    <label for="harga" class="block mb-2 text-sm font-medium text-white">Harga Menu</label>
                    <input type="text" id="harga" name="harga" class="block w-full p-2  border  rounded-lg sm:text-xs   bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Rp. . . . . .">
                </div>
                <div class="pb-2">
                    <label for="kategori_id" class="block mb-2 text-sm font-medium text-white">Kategori</label>
                    <select id="kategori_id" name="kategori_id" class="border  text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
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
                        <h3 class="my-5 text-sm font-medium text-white">Upload Image</h3>
                        <div class="flex items-center justify-center w-full">
                            
                            <label for="img" class="flex flex-col items-center justify-center h-48 w-64 border-2 border-dashed rounded-lg cursor-pointer  hover:bg-bray-800 bg-gray-700 border-gray-600 hover:border-gray-500 hover:bg-gray-600">
                                <img class="img-preview z-10 overflow-hidden object-cover h-48 w-64">
                                <div class="z-0 absolute">
                                    <p class="mb-2 text-sm text-gray-300"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-300">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                </div>
                               
                                <input id="img" name="img" type="file" class="hidden" onchange="previewImage()"/>
                            </label>
                            
                        </div> 
                    </div>
                    <div class="mr-auto mb-auto">
                        <h3 class="my-5 text-sm font-medium text-white">Status</h3>
                        <ul class="grid w-full gap-6 md:grid-cols-2">
                            <li>
                                <input type="radio" id="tersedia" name="status" value="tersedia" class="hidden peer" required>
                                <label for="tersedia" class="inline-flex items-center justify-between w-full p-3 border rounded-lg cursor-pointer hover:text-gray-300 border-gray-700  peer-checked:border-blue-600 peer-checked:text-blue-600  text-gray-400 bg-gray-800 hover:bg-gray-700">                           
                                    <div class="block">
                                        <P class="w-full text-sm font-semibold">Tersedia</P>
                                    </div>
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="taktersedia" name="status" value="taktersedia" class="hidden peer">
                                <label for="taktersedia" class="inline-flex items-center justify-between w-full p-3 border rounded-lg cursor-pointer hover:text-gray-300 border-gray-700  peer-checked:border-blue-600 peer-checked:text-blue-600  text-gray-400 bg-gray-800 hover:bg-gray-700">
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
            <div class="flex items-center p-6 space-x-2 border-trounded-b border-gray-600">
                <a href="/menu" class="ml-auto text-black bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-600">Kembali</a>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
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