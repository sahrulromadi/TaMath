<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TaMath</title>

    @vite('resources/css/app.css')

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Coiny&family=DynaPuff:wght@400..700&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <!-- Font Awesome 6 Free -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Dengan Integrity (Lebih Aman) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body class="h-screen w-screen m-0 p-0 overflow-hidden">
    {{-- session success dan error --}}
    @if (session('success'))
        @include('user.components.modal.success')
    @endif

    @if (session('error'))
        @include('user.components.modal.error')
    @endif
    {{-- end session modal  --}}

    @auth
        @include('user.components.partials.header')
    @endauth

    <main>
        @yield('content')
    </main>

    {{-- @include('user.components.partials.footer') --}}
</body>

</html>
