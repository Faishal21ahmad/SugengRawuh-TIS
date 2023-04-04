@extends('dashboard.layouts.main')
@section('containerDB')



<div class="container p-4 flex flex-auto">
    @foreach ($pesanan as $item)
    @if ($item->statuspesanan == 'selesai')
    <div class="relative w-full max-w-sm m-2 bg-white border rounded-lg shadow-md px-8 pt-8 pb-44 dark:bg-gray-800 dark:border-gray-700">
        <h5 class="text-xl my-1 font-bold leading-none text-gray-900 dark:text-white">Nama Pemesan : {{ $item->namapemesan }}</h5>
        <h5 class="text-xl my-1 font-bold leading-none text-gray-900 dark:text-white">Meja Nomor : {{ $item->meja->no }}</h5>
    
        <div class="relative overflow-x-auto mt-3">
            <table class="w-full mt-5 mb-5 text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">
                            Menu
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Jumlah
                        </th>
                        <th scope="col" class="px-4 py-3">
                            harga
                        </th>
                    </tr>
                </thead>
                
                @foreach ($detailPesanan as $i)
                    @if ($i->codepesan == $item->codepesan) 
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $i->menu->menu }}
                                </th>
                                <td class="px-4 py-4">
                                    {{ $i->jumlah }}
                                </td>
                                <td class="px-4 py-4">
                                    {{ $i->subharga }}
                                </td>
                            </tr>
                        </tbody>
                    @endif
                @endforeach
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-4 py-4">
                           
                        </td>
                        <td class="px-4 py-4">
                            Total Harga
                        </td>
                        <td class="px-4 py-4">
                            {{ $item->totalharga }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <h5 class="text-sm my-1 font-bold leading-none text-gray-900 dark:text-white">Tanggal : {{ $item->created_at }}</h5>
        </div>
        
        <div>
            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Pembayaran  : {{ $item->pembayaran->namapembayaran }}</h5>
            
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="items-center mb-4 hidden">
                <input id="statuspesanan" type="radio" value="diproses" name="statuspesanan" checked>
                <label for="statuspesanan">Default radio</label>
            </div>
            <button class="inline-flex absolute inset-x-0 bottom-0 m-5 py-3 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 "><p class="mx-auto flex items-center">Selesai</p></button>
        </form>
    </div>
    @endif
    @endforeach
    
</div>

@endsection