
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'NU Desa Paningkaban')</title>

    <meta name="description"
          content="@yield('meta_description', 'Website informasi NU Desa Paningkaban, Banyumas, Jawa Tengah.')">

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        ::selection {
            background: #a7f3d0;
            color: #064e3b;
        }

        a, button {
            -webkit-tap-highlight-color: transparent;
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }
        }
    </style>

    {{-- CSS tambahan dari setiap halaman --}}
    @stack('styles')
</head>

<body class="min-h-screen bg-slate-50 text-slate-800 antialiased">

    {{-- Navbar --}}
    @include('layouts.public.navbar')

    {{-- Konten halaman --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.public.footer')

    {{-- JavaScript tambahan dari setiap halaman --}}
    @stack('scripts')

</body>
</html>
