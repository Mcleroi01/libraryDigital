<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}" type="image/x-icon">

    <title>{{ $title ?? 'BiblioTech' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.css" />
    <link rel="stylesheet"
        href="https://cdn.ckeditor.com/ckeditor5-premium-features/42.0.0/ckeditor5-premium-features.css" />

    <style>
        /* Couleur normale des liens */
        .book-card {
            position: relative;
            width: 200px;
            height: 300px;
            perspective: 1000px;
            margin: 20px;
        }

        .book-card__book {
            position: relative;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: transform 0.6s ease;
        }

        .book-card__book-front,
        .book-card__book-back,
        .book-card__book-side {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
        }

        .book-card__book-front {
            z-index: 2;
            transform: rotateY(0deg);
        }

        .book-card__book-back {
            background-color: #fff;
            transform: rotateY(180deg);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.233);
        }

        /* Effet de pages avec des lignes verticales */
        .book-card__book-side {
            position: absolute;
            width: 20px;
            height: 100%;
            right: -15px;
            transform: rotateY(90deg);
            background: repeating-linear-gradient(to right,
                    /* Changement ici pour lignes verticales */
                    #ddd,
                    #ddd 2px,
                    #ccc 2px,
                    #ccc 4px);
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .book-card:hover .book-card__book {
            transform: rotateY(-30deg) translateX(-10px);
        }

        .book-card:hover .book-card__book-back {
            box-shadow: 5px 10px 20px rgba(0, 0, 0, 0.35);
        }

        .book-card:hover .book-card__book-side {
            opacity: 1;
            background: repeating-linear-gradient(to right,
                    /* Changement ici pour lignes verticales */
                    #ccc,
                    #ccc 2px,
                    #bbb 2px,
                    #bbb 4px);
        }

        html.sr .load-hidden {
            visibility: hidden;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="body bg-[#eaeaebf3] dark:bg-[#1E293B] ">
    <div class=" bg-gray-100 dark:bg-[#1E293B] ">
        @include('layouts.sidebar')

        @if (isset($header))
            <section class="relative bg-gradient-to-br from-blue-900 to-indigo-800 text-white overflow-hidden">
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <div class="absolute inset-0 bg-cover bg-black opacity-50 bg-center"
                    style="background-image: url('https://png.pngtree.com/background/20230424/original/pngtree-large-library-filled-with-books-picture-image_2458791.jpg');">
                </div>

                <div class="container mx-auto px-4 py-24 md:py-32 relative z-10">
                    <div class="flex flex-col md:flex-row items-center justify-between">
                        <!-- Left Side: Company Info -->
                        <div class="w-full md:w-1/2 mb-12 md:mb-0 ">
                            <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight headline"
                                data-aos="zoom-out-right" id="element">
                                Innover.<br data-aos="zoom-in-down">Transformer.<br data-aos="zoom-in-down">Réussir.
                            </h1>
                            <p class="text-xl mb-8 text-gray-300 headline" data-aos="zoom-out-right">Découvrez un vaste
                                monde de livres numériques
                                à portée
                                de main.</p>
                            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                                <a href="#"
                                    class="bg-white text-blue-900 font-semibold px-8 py-3 rounded-full hover:bg-blue-100 transition duration-300 text-center">Get
                                    Started</a>
                                <a href="#"
                                    class="border-2 border-white text-white font-semibold px-8 py-3 rounded-full hover:bg-white hover:text-blue-900 transition duration-300 text-center">Learn
                                    More</a>
                            </div>
                        </div>

                        <!-- Right Side: Features -->
                        <div class="w-full md:w-1/2 md:pl-12 ">
                            <div
                                class="bg-white bg-opacity-10 backdrop-filter backdrop-blur-lg rounded-xl p-8 shadow-2xl">
                                <h2 class="text-2xl font-semibold mb-6">Plongez dans notre catalogue diversifié,
                                    regroupant des livres de tous genres.</h2>
                                <ul class="space-y-4" data-aos="zoom-out-right">
                                    <li class="flex items-center">
                                        <svg class="w-6 h-6 mr-3 text-yellow-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                        </svg>
                                        <span>Communauté de lecteurs</span>
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-6 h-6 mr-3 text-green-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                            </path>
                                        </svg>
                                        <span>Lecture en ligne</span>
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-6 h-6 mr-3 text-purple-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01">
                                            </path>
                                        </svg>
                                        <span>Téléchargement</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


            </section>
        @endif

        <main>
            {{ $slot }}
        </main>
        @include('layouts.footer')
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        window.onscroll = function() {
            const header = document.getElementById("header");
            const navLinks = document.getElementById("nav-links");

            if (window.pageYOffset > 100) {
                header.classList.add("sticky-active");
            } else {
                header.classList.remove("sticky-active");
            }
        };
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 600, // Durée de l'animation
            once: true, // L'animation se produit uniquement la première fois
        });
    </script>

    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script>
        var typed = new Typed('#element', {
            strings: ['Profitez d\'une expérience de lecture fluide directement sur notre site.', 'Innover.<br data-aos="zoom-in-down">Transformer.<br data-aos="zoom-in-down">Réussir.'],
            typeSpeed: 50,
        });
    </script>

</body>

</html>
