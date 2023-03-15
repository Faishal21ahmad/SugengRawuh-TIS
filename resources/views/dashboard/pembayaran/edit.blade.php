@extends('dashboard.layouts.main')
@section('containerDB')

<div class="max-w-2xl mx-auto bg-gray-800 rounded-lg">
    <div class="flex items-start justify-between border-b rounded-t border-gray-600 p-4">
        <h3 class="text-xl font-semibold  text-white">
            Edit pembayaran
        </h3>
    </div>
    <div class="p-5">
        <form action="/pembayaran/{{ $pembayaran->id }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            <div class="pb-2">
                <label for="namapembayaran" class="block mb-2 text-sm font-medium text-white">Nama Pembayaran</label>
                <input type="text" id="namapembayaran" name="namapembayaran" class="block w-full p-2 border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-700 border-gray-600 placeholder-gray-400 text-white" value="{{ $pembayaran->namapembayaran }}">
            </div>
            
            <div class="pd-2 flex items-center">
                <div class="mr-auto">
                    <h3 class="my-5 text-sm font-medium text-white ">Upload Image</h3>
                    <div class="flex items-center justify-center w-full">
                        <label for="qrpembayaran" class="flex flex-col items-center justify-center h-48 w-48  border-2 border-dashed rounded-lg cursor-pointer  hover:bg-bray-800 bg-gray-700 border-gray-600 hover:border-gray-500 hover:bg-gray-600 ">
                            <input type="hidden" name="oldImage" value="{{ $pembayaran->qrpembayaran }}">
                            @if ($pembayaran->qrpembayaran)
                                <img src="{{ asset('storage/'.$pembayaran->qrpembayaran) }}" class="img-preview z-10 h-48 bg-white p-2 rounded-lg">
                            @else
                                
                            @endif
                            <input id="qrpembayaran" name="qrpembayaran" type="file" class="hidden" onchange="previewImage()"/>
                        </label>
                    </div> 
                </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <a href="/pembayaran" class="closeModal text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-auto">close</a>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-auto">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    /* //image */
    function previewImage(){
        const image = document.querySelector('#qrpembayaran');
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