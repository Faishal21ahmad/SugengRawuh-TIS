@extends('dashboard.layouts.pesan')
@section('containerPS')
    <div class="w-screen h-auto pb-16 bg-white drop-shadow-2xl rounded-t-lg mx-auto p-4">
        <h1 class="mx-2 font-semibold">Kategori</h1>
       
        <div class="justify-items-start overflow-x-auto flex flex-nowrap object-cover scrollbar-hide">
            <a href="" class=" items-center px-4 py-2 m-1 text-xs font-medium text-center text-white bg-blue-700 rounded-full hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-blue-800">Semua</a>
            @foreach ($kategori as $kat)
            <a href="" class=" items-center px-4 py-2 m-1 text-xs font-medium text-center text-white bg-blue-700 rounded-full hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-blue-800">{{ $kat->namakategori }}</a>
            @endforeach
        </div>

        <h1 class="mx-2 mt-2 font-semibold">Menu</h1>
        <div class="grid grid-cols-2">
            @foreach ($menu as $item)
            <div class="max-w-sx bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 m-1">

                <a href="#">
                    <img class="rounded-t-lg object-cover overflow-x-auto h-32 w-full" src="{{ asset('storage/' . $item['img']); }}" alt="" />
                </a>
                <div class="p-3">
                    <h5 class="px-1 mb-1 text-lsm font-semibold tracking-tight text-gray-900 dark:text-white">{{ $item['menu']; }} 
                        <a href="" class="float-right items-center viewMenuvi"><i class="fi fi-br-menu-dots-vertical"></i></a>
                    </h5>
                    <p class="px-1 mb-5 text-gray-700 dark:text-gray-400">Rp.{{ $item['harga']; }}</p>
                    <div class="flex flex-auto">
                        @if ($item['status'] === 'tersedia')
                        <a href="/addcart/{{ $item['id']; }}" class="inline-flex w-full items-baseline py-2 text-xs font-normal text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 "> 
                            <p class="mx-auto flex items-center">Beli</p>
                        </a>
                        @else
                        <a href="" class="inline-flex w-full items-baseline py-2 text-xs font-normal text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 "> 
                            <p class="mx-auto flex items-center">Tidak Tersedia</p>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- menampilkan cart floting --}}
    @if (session('cart'))
    
    <?php $total=0; ?>
    @foreach(session('cart') as $id => $item)
    <?php
    $sub =  $item['harga'] * $item['jumlah'];
    $total += $sub;
    ?>
    @endforeach

    <div class="fixed bottom-0 w-full">
        <div class="mx-2 rounded-t-xl bg-white border-t border-gray-200 dark:bg-slate-800">
            <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-800" data-drawer-toggle="drawer-swipe">
                <span class="absolute w-8 h-1 -translate-x-1/2 bg-gray-300 rounded-lg top-3 left-1/2 dark:bg-gray-600"></span>
                <h5 id="drawer-swipe-label" class="inline-flex items-center text-base text-gray-500 dark:text-gray-400">{{ $count }} Menu</h5>
                <h5 id="drawer-swipe-label" class="float-right inline-flex  items-center text-base text-gray-500 dark:text-gray-400">Rp. {{ $total }}
                </h5>
            </div>
        </div>
    </div>

    <!-- drawer init and toggle -->
    <div class="text-center">
        <button class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 hidden" type="button" data-drawer-target="drawer-swipe" data-drawer-show="drawer-swipe" data-drawer-placement="bottom" data-drawer-edge="true" data-drawer-edge-offset="bottom-[60px]" aria-controls="drawer-swipe">Show swipeable drawer</button>
    </div>

    <div id="drawer-swipe" class="mx-2 fixed z-40  overflow-y-auto  bg-white border-t border-gray-200 rounded-t-lg dark:border-gray-700 dark:bg-gray-800 transition-transform translate-y-full bottom-0" tabindex="-1" aria-labelledby="drawer-swipe-label">


        <div class="p-4 cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-800" data-drawer-toggle="drawer-swipe">
            <span class="absolute w-8 h-1 -translate-x-1/2 bg-gray-300 rounded-lg top-3 left-1/2 dark:bg-gray-600"></span>
            <h5 id="drawer-swipe-label" class="inline-flex items-center text-base text-gray-500 dark:text-gray-400">{{ $count }} Menu</h5>
            <h5 id="drawer-swipe-label" class="float-right inline-flex  items-center text-base text-gray-500 dark:text-gray-400">Rp. {{ $total }}</h5>
        </div>
    <form action="/pesan" method="post">
        @csrf
        {{-- Input nama --}}
        <div class="px-4">
            <label for="namapemesan" class="block mb-2 mx-2 text-xs font-medium text-gray-900 dark:text-white">Nama</label>
            <input type="text" id="namapemesan" name="namapemesan" class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        {{-- List menu --}}
            <div class="mx-4 my-2 inset-y-0 overflow-x-auto h-48"  aria-labelledby="dropdownSearchButton" id="listmenu">
                @foreach(session('cart') as $id => $item)
                <?php $sub =  $item['harga'] * $item['jumlah'];?> 
                <div class="p-1 my-1 rounded-lg  bg-gray-50 dark:bg-gray-700 flex flex-auto">
                    <img class="rounded-lg h-16 w-24" src="{{ asset('storage/' . $item['img']); }}" alt="" >
                    <div class="text-gray-500 dark:text-white my-auto items-center w-auto">
                        <p class="text-xs px-2">{{ $item['name']; }}</p>
                        <p class="text-xs px-2">{{ $sub }}</p>
                    </div>
                    <div class="text-gray-500 dark:text-white flex my-auto ml-auto pr-5">
                        <a href="/editminqty/{{ $id }}" class="">
                            <i class="fi fi-sr-cross-circle text-2xl"></i>
                        </a>
                        <p class="text-lg mx-5">{{ $item['jumlah']; }}</p>
                        <a href="/editplusqty/{{ $id }}">
                            <i class="fi fi-sr-add text-2xl"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>


        <div class="mx-4 mb-2">
            <h3 class="p-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Pembayaran</h3>
            <ul class="justify-items-start overflow-x-auto flex flex-nowrap object-cover">
                @foreach($pembayaran as $list)
                <li class="mx-1">
                    <input type="radio" id="bayar{{ $loop->iteration }}" name="jenispembayaran_id" value="{{ $list->id }}" class="hidden peer">
                    <label for="bayar{{ $loop->iteration }}" class="inline-flex items-center justify-between px-3 py-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                        <div class="block">
                            <P class="w-full text-sm font-semibold">{{ $list->namapembayaran }}</P>
                        </div>
                    </label>
                </li>
                @endforeach
        </div>
            <input type="text" id="adminrm_id" name="adminrm_id" value="{{ $rm }}" class="hidden">
            <input type="text" id="meja_id" name="meja_id" value="{{ $meja }}" class="hidden">
            <input type="text" id="totalharga" name="totalharga" value="{{ $total }}" class="hidden">
            <input type="text" id="statuspemesanan" name="statuspemesanan" value="diterima" class="hidden">

        <div class="my-3 mx-5 mb-4">
            <button type="submit" class="py-3 inline-flex w-full items-baseline  text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><p class="mx-auto flex items-center">Pesan</p></button>
        </div>
    </form>
    </div>
    @else
    @endif

@endsection
