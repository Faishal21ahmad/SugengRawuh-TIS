<div class="bg-gray-800">
    <aside aria-label="Sidebar">
        <img src="{{ asset('img/SR.png'); }}" class="mx-auto my-20 h-20">
        <div class="px-8 pb-96">
            <ul class="pt-4 space-y-2 border-t border-gray-700">
                {{-- Toggle MODE --}}
                {{-- Hilangkan comment ketika menggunakan linux agar mode bekerja --}}
                {{-- <li class="py-1 flex items-center justify-center">
                    <span class="mr-3 text-sm font-medium text-white">Light</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" value="" id="dark-toggle" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                    </label>
                    <span class="ml-3 text-sm font-medium text-white">Dark</span>
                </li> --}}
  
                <li class="py-1">
                    <a href="/dashboard" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700">
                        <i class="text-xl fi fi-ss-chart-pie-alt flex items-center text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>

                <li>
                    <button type="button" class="flex items-center w-full p-2 text-base font-normal transition duration-75 rounded-lg group  text-white hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <i class="fi fi-sr-notebook text-xl flex items-center text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Pesanan</span>
                        <i class="fi fi-sr-sort-down w-6 h-6 pt-1"></i>
                    </button>
                    <ul id="dropdown-example" class="menupesan  py-2 space-y-2 {{ Request::is('dashboard','menu','meja','kategori','pembayaran') ? 'hidden' : ''}}">
                        <li>
                            <a href="/pesanan" class="menuopen flex items-center w-full p-2 text-base font-normal  transition duration-75 rounded-lg pl-8 group text-white hover:bg-gray-700"><i class="fi fi-sr-add-document text-xl flex items-center text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white mr-2"></i>Pesanan Masuk</a>
                        </li>
                        <li>
                            <a href="/pesanan/proses" class="menuopen flex items-center w-full p-2 text-base font-normal transition duration-75 rounded-lg pl-8 group text-white hover:bg-gray-700"><i class="fi fi-sr-file-chart-pie text-xl flex items-center text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white mr-2"></i>Pesanan Proses</a>
                        </li>
                        <li>
                            <a href="/pesanan/selesai" class="menuopen flex items-center w-full p-2 text-base font-normal  transition duration-75 rounded-lg pl-8 group text-white hover:bg-gray-700"><i class="fi fi-sr-assept-document text-xl  flex items-center text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white mr-2"></i>Pesanan Selesai</a>
                        </li>
                    </ul>
                </li>


                <li class="py-1">
                    <a href="/menu" class="flex items-center rounded-lg p-2 text-base font-normal text-white hover:bg-gray-700">
                        <i class="fi fi-br-grid text-xl flex items-center text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Menu</span>
                    </a>
                </li>
                <li class="py-1">
                    <a href="/meja" class="flex items-center p-2 rounded-lg text-base font-normal text-white hover:bg-gray-700">
                        <i class="fi fi-sr-restaurant text-xl flex items-center text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Meja</span>
                    </a>
                </li>
                <li class="py-1">
                    <a href="/kategori" class="flex items-center p-2 rounded-lg text-base font-normal text-white hover:bg-gray-700">
                        <i class="fi fi-sr-layout-fluid text-xl flex items-center text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Kategori</span>
                    </a>
                </li>
                <li class="py-1">
                    <a href="/pembayaran" class="flex items-center p-2 rounded-lg text-base font-normal text-white hover:bg-gray-700">
                        <i class="fi fi-sr-wallet text-xl flex items-center text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Metode Pembayaran</span>
                    </a>
                </li>
            </ul>
            <ul class="pt-4 mt-4 space-y-2 border-t border-gray-700">
                
                <li class="py-1">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="w-full">
                            <div class="flex p-2 rounded-lg text-base font-normal text-white hover:bg-gray-700">
                                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
                                <span class="ml-3 whitespace-nowrap">Logout</span>
                            </div>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </aside>
</div>


<script>
    //open close tambah modal
    const menupesan = document.querySelector('.menupesan');
    //button action
    const menuopen = document.querySelector('.menuopen');
    const close = document.querySelector('.close');

    close.addEventListener('click', function(){
        menupesan.classList.add('hidden')
    })

    menuopen.addEventListener('click', function(){
        menupesan.classList.remove('hidden')
    })
    //open close tambah modal
</script>
