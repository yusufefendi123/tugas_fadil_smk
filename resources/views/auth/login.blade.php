<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - NU Desa Paningkaban</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                            dark: '#0a3618',
                        }
                    },
                    keyframes: {
                        fadeInDown: {
                            '0%': { opacity: '0', transform: 'translateY(-20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        }
                    },
                    animation: {
                        'fade-in-down': 'fadeInDown 0.8s ease-out forwards',
                        'fade-in-up': 'fadeInUp 0.8s ease-out forwards',
                    }
                }
            }
        }
    </script>
    <style>
        /* Dot matrix world-map style background pattern */
        .bg-pattern {
            background-image: radial-gradient(#16a34a 1.2px, transparent 1.2px);
            background-size: 28px 28px;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-nu-900 via-nu-800 to-nu-dark min-h-screen text-slate-100 flex flex-col justify-between selection:bg-emerald-500 selection:text-white overflow-x-hidden">

    <header class="w-full bg-nu-dark/80 backdrop-blur-md border-b border-white/10 px-6 py-4 shadow-lg animate-fade-in-down">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
            
            <!-- Brand Logo Header View -->
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-emerald-600 to-green-400 flex items-center justify-center text-white font-extrabold shadow-md border border-white/20">
                    <i class="fa-solid fa-mosque text-xl"></i>
                </div>
                <div>
                    <h1 class="text-base font-bold tracking-tight text-white">NU Desa Paningkaban</h1>
                    <p class="text-[11px] text-emerald-300">Portal Administrasi Ranting</p>
                </div>
            </div>

            <!-- Top Quick Login Form Bar -->
            <form action="{{ route('login.post') }}" method="POST" class="flex flex-wrap items-center gap-3">
                @csrf
                
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                        <i class="fa-regular fa-envelope text-xs"></i>
                    </span>
                    <input 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        placeholder="Email Admin" 
                        required 
                        class="bg-white/10 border border-white/20 text-white placeholder-slate-300 text-xs rounded-lg pl-9 pr-3 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:bg-white/20 w-48 sm:w-56 transition-all"
                    >
                </div>

                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                        <i class="fa-solid fa-lock text-xs"></i>
                    </span>
                    <input 
                        type="password" 
                        id="top-password"
                        name="password" 
                        placeholder="Password" 
                        required 
                        class="bg-white/10 border border-white/20 text-white placeholder-slate-300 text-xs rounded-lg pl-9 pr-8 py-2 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:bg-white/20 w-44 sm:w-48 transition-all"
                    >
                    <button type="button" onclick="togglePassword('top-password', 'top-eye-icon')" class="absolute inset-y-0 right-0 pr-2.5 flex items-center text-slate-400 hover:text-white transition-colors focus:outline-none">
                        <i id="top-eye-icon" class="fa-regular fa-eye text-xs"></i>
                    </button>
                </div>

                <button 
                    type="submit" 
                    class="bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white font-bold text-xs px-5 py-2 rounded-lg shadow-md hover:shadow-emerald-500/20 transition-all flex items-center space-x-1.5"
                >
                    <span>Sign In</span>
                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </button>
            </form>

        </div>
    </header>

    <main class="flex-1 flex items-center justify-center p-6 relative bg-pattern">
        <!-- Glow accents -->
        <div class="absolute top-1/2 left-1/3 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-5xl w-full grid grid-cols-1 lg:grid-cols-12 gap-12 items-center z-10 py-12">
            
            <!-- Left Info Area -->
            <div class="lg:col-span-8 space-y-6 animate-fade-in-up">
                <div class="inline-flex items-center space-x-2 px-3 py-1 bg-emerald-500/10 border border-emerald-500/30 rounded-full text-emerald-300 text-xs font-semibold tracking-wider uppercase">
                    <i class="fa-solid fa-shield-halved text-xs"></i>
                    <span>Sistem Terintegrasi Resmi</span>
                </div>
                
                <h2 class="text-4xl sm:text-6xl font-extrabold tracking-tight leading-none text-white">
                    Kelola Layanan & <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-green-300">Administrasi Desa</span>
                </h2>

                <p class="text-slate-300 text-base sm:text-lg leading-relaxed max-w-2xl">
                    Pusat koordinasi informasi, data warga, dan layanan keorganisasian Pengurus Ranting Nahdlatul Ulama Desa Paningkaban secara cepat, transparan, dan aman.
                </p>
            </div>

            <!-- Right Box: Detailed Login Card Panel -->
            <div class="lg:col-span-4 animate-fade-in-up" style="animation-delay: 0.2s;">
                <div class="bg-nu-dark/90 border border-white/10 rounded-2xl p-6 shadow-2xl backdrop-blur-xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/10 rounded-full blur-2xl pointer-events-none"></div>

                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-emerald-500/20 border border-emerald-500/30 flex items-center justify-center text-emerald-400 font-bold">
                            <i class="fa-solid fa-lock-open text-sm"></i>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-white">Autentikasi Admin</h3>
                            <p class="text-[11px] text-slate-400">Masukkan akses terdaftar</p>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="mb-4 p-3 bg-red-500/10 border border-red-500/30 text-red-300 rounded-xl text-xs">
                            <div class="font-bold flex items-center space-x-1.5 mb-1">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <span>Gagal Masuk</span>
                            </div>
                            <ul class="list-disc list-inside space-y-0.5 opacity-90">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-300 mb-1.5">Email Admin</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                    <i class="fa-regular fa-envelope text-xs"></i>
                                </span>
                                <input 
                                    type="email" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    placeholder="nama@email.com" 
                                    required 
                                    class="w-full bg-white/5 border border-white/15 rounded-xl pl-10 pr-3 py-2.5 text-xs text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:bg-white/10 transition-all"
                                >
                            </div>
                        </div>

                        <div>
                            <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-300 mb-1.5">Password</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                    <i class="fa-solid fa-lock text-xs"></i>
                                </span>
                                <input 
                                    type="password" 
                                    id="card-password"
                                    name="password" 
                                    placeholder="••••••••" 
                                    required 
                                    class="w-full bg-white/5 border border-white/15 rounded-xl pl-10 pr-9 py-2.5 text-xs text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:bg-white/10 transition-all"
                                >
                                <button type="button" onclick="togglePassword('card-password', 'card-eye-icon')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-white transition-colors focus:outline-none">
                                    <i id="card-eye-icon" class="fa-regular fa-eye text-xs"></i>
                                </button>
                            </div>
                        </div>

                        <button 
                            type="submit" 
                            class="w-full py-3 bg-gradient-to-r from-emerald-600 to-green-500 hover:from-emerald-700 hover:to-green-600 text-white font-bold text-xs rounded-xl shadow-lg shadow-emerald-600/30 transition-all flex items-center justify-center space-x-2 mt-2"
                        >
                            <span>Masuk Dashboard</span>
                            <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </button>
                    </form>

                    <div class="mt-4 pt-3 border-t border-white/10 text-center">
                        <p class="text-[10px] text-slate-400">Pengurus Ranting NU Desa Paningkaban</p>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <footer class="w-full bg-nu-dark/90 border-t border-white/10 py-4 px-6 text-center text-xs text-slate-400">
        <p>&copy; {{ date('Y') }} Nahdlatul Ulama Desa Paningkaban. All rights reserved.</p>
    </footer>

    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>

</body>
</html>