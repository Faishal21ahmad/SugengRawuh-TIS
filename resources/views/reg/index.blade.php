@extends('layouts.main')
@section('container')
    
<div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-md sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700 mx-auto mt-32">
    <form class="space-y-6" action="/register" method="post">
        @csrf
        <h5 class="text-xl font-medium text-gray-900 dark:text-white text-center">Registrasi</h5>
        <div>
            <label for="namarm" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Rumah Makan</label>
            <input type="text" name="namarm" id="namarm" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="nama rumah makan anda" required value="{{ old('namarm') }}">
        </div>
        <div>
            <label for="owner" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pemilik</label>
            <input type="text" name="owner" id="owner" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="nama anda sebagai owner........" required value="{{ old('owner') }}">
        </div>
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="contoh@google.com" required value="{{ old('email') }}">
        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
        </div>
        
        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</button>
        <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
            Registered? <a href="/login" class="text-blue-700 hover:underline dark:text-blue-500">Login</a>
        </div>
    </form>
</div>

@endsection