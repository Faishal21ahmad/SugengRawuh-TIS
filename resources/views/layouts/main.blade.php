<!doctype html>
{{-- ganti tag html yang ata ketika menggunakan linux --}}
{{-- <html class="dark"> --}}
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-straight/css/uicons-bold-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    @vite('resources/css/app.css')
    <title>Rawuh {{ $title }}</title>
</head>
<body class="bg-white">
    @include('componen.navbar')

    <div class="container  mx-auto">
        @yield('container')
    </div>

    <script src="/path/to/flowbite/dist/flowbite.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
    <script>
        const darkToggle = document.querySelector('#dark-toggle');
        const html = document.querySelector('html');

        darkToggle.addEventListener('click', function(){
            if (darkToggle.checked){
                html.classList.add('dark');
            }else{
                html.classList.remove('dark');
            }
        });
    </script>
</body>
</html>


