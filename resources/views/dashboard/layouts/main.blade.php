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
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    @vite('resources/css/app.css')
    <title>Rawuh {{ $title }}</title>
</head>
<body>

    <div class="flex">
        @include('dashboard.layouts.sidebar')

        <div class="container mx-auto">
            <div class="container">
                @include('dashboard.layouts.header')
            </div>
            @yield('containerDB')
        </div>
    </div>

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




