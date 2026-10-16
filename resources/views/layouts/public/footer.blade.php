
<footer class="footer-main overflow-hidden bg-slate-950 text-slate-300">

    {{-- GARIS HIJAU --}}
    <div class="footer-line h-1 w-full bg-gradient-to-r
                from-emerald-900 via-emerald-400 to-emerald-900"></div>

    <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-3">

            {{-- IDENTITAS WEBSITE --}}
            <div class="footer-reveal">

                <a href="{{ route('home') }}"
                   class="footer-brand mb-5 inline-flex items-center gap-3">

                    <div class="flex h-12 w-12 items-center justify-center
                                rounded-2xl bg-emerald-700 text-white shadow-lg
                                transition duration-300 hover:rotate-[-8deg]
                                hover:scale-110 hover:bg-emerald-600">
                        <i class="fa-solid fa-mosque text-xl"></i>
                    </div>

                    <div>
                        <h2 class="text-xl font-extrabold text-white">
                            NU Paningkaban
                        </h2>
                        <p class="text-xs text-emerald-400">
                            Desa Paningkaban
                        </p>
                    </div>
                </a>

                <p class="max-w-sm text-sm leading-7 text-slate-400">
                    Website informasi Nahdlatul Ulama Desa Paningkaban
                    untuk mengenalkan organisasi, menyampaikan informasi,
                    serta mendokumentasikan kegiatan dan kebersamaan jamaah.
                </p>

                <div class="mt-6 flex items-center gap-3">
                    <span class="h-1 w-10 rounded-full bg-emerald-500"></span>
                    <span class="text-xs font-semibold uppercase tracking-widest
                                 text-slate-500">
                        Informasi dan Kebersamaan
                    </span>
                </div>

            </div>

            {{-- NAVIGASI --}}
            <div class="footer-reveal">

                <h3 class="footer-heading mb-5 text-lg font-bold text-white">
                    Navigasi Website
                </h3>

                <div class="grid grid-cols-1 gap-3 text-sm">

                    <a href="{{ route('home') }}" class="footer-link">
                        <i class="fa-solid fa-house"></i>
                        <span>Home</span>
                    </a>

                    <a href="{{ route('tentang_kami') }}" class="footer-link">
                        <i class="fa-solid fa-circle-info"></i>
                        <span>Tentang Kami</span>
                    </a>

                    <a href="{{ route('berita') }}" class="footer-link">
                        <i class="fa-solid fa-newspaper"></i>
                        <span>Berita</span>
                    </a>

                    <a href="{{ route('kegiatan') }}" class="footer-link">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>Kegiatan</span>
                    </a>

                    <a href="{{ route('pengumuman') }}" class="footer-link">
                        <i class="fa-solid fa-bullhorn"></i>
                        <span>Pengumuman</span>
                    </a>

                    <a href="{{ route('pengurus') }}" class="footer-link">
                        <i class="fa-solid fa-people-group"></i>
                        <span>Pengurus</span>
                    </a>

                    <a href="{{ route('galeri') }}" class="footer-link">
                        <i class="fa-solid fa-images"></i>
                        <span>Galeri</span>
                    </a>

                </div>
            </div>

            {{-- INFORMASI LOKASI --}}
            <div class="footer-reveal">

                <h3 class="footer-heading mb-5 text-lg font-bold text-white">
                    Informasi Lokasi
                </h3>

                <div class="mb-5 flex items-start gap-3">
                    <div class="flex h-10 w-10 shrink-0 items-center
                                justify-center rounded-xl bg-emerald-900/60
                                text-emerald-400">
                        <i class="fa-solid fa-location-dot text-lg"></i>
                    </div>

                    <div>
                        <p class="font-semibold text-white">
                            Desa Paningkaban
                        </p>
                        <p class="mt-1 text-sm leading-6 text-slate-400">
                            Kabupaten Banyumas, Jawa Tengah, Indonesia.
                        </p>
                    </div>
                </div>

                {{-- PETA GOOGLE MAPS --}}
                <div class="footer-map overflow-hidden rounded-2xl
                            border border-slate-700 bg-slate-900">

                    <div class="flex items-center gap-2 border-b
                                border-slate-700 px-4 py-3">
                        <i class="fa-solid fa-map-location-dot
                                  text-emerald-400"></i>

                        <span class="text-sm font-semibold text-white">
                            Peta Desa Paningkaban
                        </span>
                    </div>

                    <div class="relative h-56 w-full bg-slate-900">

                        <iframe
                            src="https://maps.google.com/maps?q=Desa%20Paningkaban%2C%20Banyumas%2C%20Jawa%20Tengah%2C%20Indonesia&output=embed"
                            title="Peta Desa Paningkaban, Banyumas"
                            class="h-full w-full border-0"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            allowfullscreen>
                        </iframe>

                    </div>

                    <a href="https://www.google.com/maps/search/?api=1&query=Desa%20Paningkaban%2C%20Banyumas%2C%20Jawa%20Tengah%2C%20Indonesia"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="flex items-center justify-between gap-3
                              px-4 py-3 text-sm text-emerald-400
                              transition hover:bg-slate-800 hover:text-emerald-300">

                        <span>
                            Buka di Google Maps
                        </span>

                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>

                </div>

                <p class="mt-3 text-xs leading-5 text-slate-500">
                    Peta menunjukkan hasil pencarian lokasi desa.
                    Titik sekretariat dapat ditentukan lebih lanjut.
                </p>

            </div>

        </div>

    </div>

    {{-- COPYRIGHT --}}
    <div class="border-t border-slate-800 bg-black/20">

        <div class="footer-reveal mx-auto flex max-w-7xl flex-col
                    items-center justify-between gap-3 px-4 py-6
                    text-center sm:px-6 md:flex-row md:text-left
                    lg:px-8">

            <p class="text-sm text-slate-500">
                &copy; {{ date('Y') }} NU Desa Paningkaban.
                Semua hak dilindungi.
            </p>

            <a href="{{ route('home') }}"
               class="inline-flex items-center gap-2 text-sm
                      font-semibold text-slate-400 transition
                      hover:text-emerald-400">
                Kembali ke atas
                <i class="fa-solid fa-arrow-up transition-transform
                          duration-300 hover:-translate-y-1"></i>
            </a>

        </div>

    </div>

</footer>

<style>
    /* GARIS ATAS FOOTER */
    .footer-line {
        background-size: 200% 100%;
        animation: footerGlow 5s linear infinite;
    }

    @keyframes footerGlow {
        from {
            background-position: 100% 0;
        }
        to {
            background-position: -100% 0;
        }
    }

    /* ANIMASI KEMUNCULAN */
    .footer-reveal {
        opacity: 0;
        transform: translateY(24px);
        transition: opacity .7s ease, transform .7s ease;
    }

    .footer-reveal.footer-visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* JEDA ANIMASI TIAP KOLOM */
    .footer-reveal:nth-child(2) {
        transition-delay: .12s;
    }

    .footer-reveal:nth-child(3) {
        transition-delay: .24s;
    }

    /* JUDUL */
    .footer-heading {
        position: relative;
        padding-bottom: 12px;
    }

    .footer-heading::after {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 38px;
        height: 3px;
        border-radius: 99px;
        background: #10b981;
        content: "";
        transition: width .3s ease;
    }

    .footer-heading:hover::after {
        width: 70px;
    }

    /* TAUTAN NAVIGASI */
    .footer-link {
        display: inline-flex;
        width: fit-content;
        align-items: center;
        gap: 12px;
        color: #94a3b8;
        transition: color .25s ease, transform .25s ease;
    }

    .footer-link i {
        width: 18px;
        color: #34d399;
        text-align: center;
        transition: transform .25s ease;
    }

    .footer-link:hover {
        color: #6ee7b7;
        transform: translateX(5px);
    }

    .footer-link:hover i {
        transform: scale(1.15);
    }

    /* PETA */
    .footer-map {
        transition: border-color .3s ease, box-shadow .3s ease;
    }

    .footer-map:hover {
        border-color: #059669;
        box-shadow: 0 10px 28px rgba(16, 185, 129, .08);
    }

    /* AKSESIBILITAS */
    @media (prefers-reduced-motion: reduce) {
        .footer-line {
            animation: none;
        }

        .footer-reveal {
            opacity: 1;
            transform: none;
            transition: none;
        }

        .footer-link,
        .footer-link i,
        .footer-heading::after,
        .footer-map {
            transition: none;
        }
    }
</style>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const footerItems = document.querySelectorAll('.footer-reveal');

        if (!('IntersectionObserver' in window)) {
            footerItems.forEach(function (item) {
                item.classList.add('footer-visible');
            });
            return;
        }

        const footerObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('footer-visible');
                    footerObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1
        });

        footerItems.forEach(function (item) {
            footerObserver.observe(item);
        });
    });
</script>
@endpush
