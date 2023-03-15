<!doctype html>
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
    <style>
        /* For Webkit-based browsers (Chrome, Safari and Opera) */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        /* For IE, Edge and Firefox */
        .scrollbar-hide {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    </style>
    <title>Rawuh {{ $title }}</title>
</head>
<body onbeforeunload="destroy()" class="bg-gray-800 bg-repeat bg-contain bg-center" style="background-image: url({{ asset('img/bg.png'); }})">

    <div class="w-24 mx-auto py-5 shadow-md">
        @include('dashboard.layouts.headerSP')
    </div>
    @yield('containerPS')

    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
    <script src="/resources/js/jquery-3.6.0.min.js"></script>
{{-- 
    <script>
        function destroy() {
            <?php session()->flush(); ?>
        }
    </script> --}}
</body>
</html>




