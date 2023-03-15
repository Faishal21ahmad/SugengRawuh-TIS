<div class="flex items-center ">
    <h1 class="p-6 flex-auto text-start text-2xl font-bold">{{ $header }}</h1>
    
 

    <div class="ml-auto mr-10">
        <button type="button" class="text-lg font-bold rounded text-center mx-3 md:mr-0 flex items-center" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">Hai, {{ auth()->user()->owner }}<i class="fi fi-sr-angle-small-down flex items-center mx-0.5"></i></button>
    </div>
</div>


<!-- Dropdown menu -->
<div class="z-50 hidden  my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
    <div class="px-4 py-3">
        <span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->namarm }}</span>
        <span class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
    </div>
    <ul class="py-1" aria-labelledby="user-menu-button">
    <li>
        <a href="/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Home Page</a>
    </li>
    <li>
        <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
    </li>
    <li>
        <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
    </li>
    <li>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="w-full">
                <span class="block px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</span>
            </button>
        </form>
        
    </li>
    </ul>
</div>