<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TaMath</title>

    @vite('resources/css/app.css')
</head>

<body>
    {{-- session success dan error --}}
    @if (session('success'))
        @include('components.modal.modal-success')
    @endif

    @if (session('error'))
        @include('components.modal.modal-error')
    @endif
    {{-- end session modal  --}}

    @include('layouts.header')

    <main class="min-h-screen min-w-full">
        @yield('content')
    </main>

    @include('layouts.footer')
</body>

</html>
