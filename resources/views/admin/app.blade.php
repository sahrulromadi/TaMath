<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kaiadmin</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{ asset('assets/admin/img/favicon.ico') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/admin/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{ asset('assets/admin/css/fonts.min.css') }}"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/kaiadmin.min.css') }}" />
</head>

<body>
    {{-- error validasi --}}
    @if ($errors->any())
        @include('admin.components.modal.error-validasi')
    @endif
    {{-- error valdiasi end --}}

    {{-- session success dan error --}}
    @if (session('success'))
        @include('admin.components.modal.success-session')
    @endif

    @if (session('error'))
        @include('admin.components.modal.error-session')
    @endif
    {{-- sesion end --}}

    <div class="wrapper">
        @include('admin.components.partials.sidebar')
        <div class="main-panel">
            @include('admin.components.partials.header')

            @yield('content')

            @include('admin.components.partials.footer')
        </div>
    </div>

    @include('admin.components.partials.script')

    {{-- untuk script agar jquery ke load --}}
    @stack('custom-script')
</body>

</html>
