<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard Admin') - NU Desa Paningkaban</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Bootstrap 5 and Icons (kept for compatibility with other partials if needed) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        nu: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                            dark: '#0a3618',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f4f7f5;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #26352b;
        }

        .admin-wrapper {
            min-height: 100vh;
            display: flex;
        }

        .main-area {
            margin-left: 260px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            flex: 1;
            transition: all 0.3s ease;
        }

        .page-content {
            flex: 1;
            padding: 32px;
        }

        @media (max-width: 992px) {
            .main-area {
                margin-left: 0;
            }

            .page-content {
                padding: 20px;
            }
        }
    </style>

    @stack('styles')
</head>
<body class="bg-slate-50 text-slate-800 antialiased selection:bg-emerald-500 selection:text-white">

    <div class="admin-wrapper">
        @include('layouts.sidebar')

        <div class="main-area">
            @include('layouts.navbar')

            <main class="page-content">
                @yield('content')
            </main>

            @include('layouts.footer')
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>